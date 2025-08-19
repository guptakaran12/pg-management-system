<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Jobs\SendWelcomeEmailJob;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginPage()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $requestData = $request->only(['username_or_email','password']);
        $validator = Validator::make($requestData, [
            'username_or_email'      => ['required'],
            'password'               => ['required','min:8','regex:/^(?=.*[A-Z]).+$/'],
        ], [
            'username_or_email.required'      => 'Username or Email is required.',
            'password.required'               => 'Password is required.',
            'password.min'                    => 'Password must be at least 8 characters.',
            'password.regex'                  => 'Password must contain at least one uppercase letter.',
        ]); 

        $input = $requestData['username_or_email'] ?? '';

        if (filter_var($input, FILTER_VALIDATE_EMAIL) === false && str_contains($input, '@')) {
            $validator->after(function ($validator) {
                $validator->errors()->add('username_or_email', 'Please enter a valid email address.');
            });
        }

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        try{
            $remember = $request->remember ?? null;
            $credentials = filter_var($input, FILTER_VALIDATE_EMAIL)
            ? ['email' => $input, 'password' => $requestData['password']]
            : ['username' => $input, 'password' => $requestData['password']];
            
            if(!Auth::attempt($credentials,$remember)){
                return response()->json(['status' => false,'msg' => 'Invalid login credentials.','wrong_credentials' => false],200);
            }

            $user = Auth::user();
            $token = $user->createToken('UserLoginToken')->plainTextToken;
            
            if($user->login_mail == '0' && strtolower($user->role) !== 'admin'){
                SendWelcomeEmailJob::dispatch($user);
                $user->login_mail = 1;
                $user->save();
            }

            // Flash session message
            session()->flash('toastMessage', [
                'message' => 'Welcome back! You have logged in successfully.',
                'type' => 'success',
                'position' => 'top-center',
            ]);

            return response()->json(['status' => true,'redirect_url' => route('dashboard.index')], 200);

        }catch (Exception $e) {
            return response()->json(['status' => false, 'msg' => 'Login failed!', 'error' => $e->getMessage()],500);
        }

    }

    public function showPasswordRequestPage()
    {
        return view('auth.request_password');
    }

    public function verifyResetEmail(Request $request)
    {
        $requestData = $request->only(['email']);
        $validator = Validator::make($requestData, [
          'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.required' => 'Email field is required.',
            'email.email'    => 'Please enter a valid email address.',
            'email.exists'   => 'This email is not registered in our system.',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        $email = $request->email ?? "";

        DB::beginTransaction();

        try{
            // Delete old token
            PasswordResetToken::where('email', $email)->delete();

            //Save Token
            $token = Hash::make(Str::random(60));
            PasswordResetToken::updateOrCreate(
                ['email' => $email], 
                [
                    'token' => $token,
                ]
            );

            $user = User::where('email', $email)->first();
            $resetLink = url("/password/reset?token={$token}&email={$email}");

            if(strtolower($user->role) !== 'admin'){
                 SendWelcomeEmailJob::dispatch($user,'forget',$resetLink);
            }

            DB::commit();

            // Flash session message
            session()->flash('toastMessage', [
                'message' => 'Mail sent! Please check your email to reset your password.',
                'type' => 'success',
                'position' => 'top-center',
            ]);

            return response()->json(['status' => true,  'redirect_url' => $resetLink],200);
        }catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'msg' => 'Something Went failed!', 'error' => $e->getMessage()],500);
        }
    }

    public function showPasswordChangePage(Request $request)
    {
        $token = $request->token ?? "";
        $email = $request->email ?? "";
        $resetData = PasswordResetToken::where('email', $email)
        ->orderBy('created_at', 'desc')
        ->first();

        if(!$resetData){
            // Flash session message
            session()->flash('toastMessage', [
                'message' => 'Invalid reset link.',
                'type' => 'error',
                'position' => 'top-center',
            ]);
            return redirect()->route('password.request');
        }

        $tokenCreatedAt = Carbon::parse($resetData->created_at);
         if (Carbon::now()->diffInMinutes($tokenCreatedAt) > 60) {

            // Delete expired token
            $resetData->delete();

            // Flash session message
            session()->flash('toastMessage', [
                'message' => 'Reset link has expired.',
                'type' => 'error',
                'position' => 'top-center',
            ]);
            return redirect()->route('password.request');
        }

        return view('auth.reset_password',compact('email','token'));
    }

     public function resetPasswordSave(Request $request)
    {
        $requestData = $request->only(['new_password', 'confirm_password','email']);
        $validator = Validator::make($requestData, [
            'new_password'        => ['required', 'string', 'min:8', 'different:current_password', 'regex:/^(?=.*[A-Z]).+$/'],
            'confirm_password'    => ['required', 'string', 'min:8', 'same:new_password', 'regex:/^(?=.*[A-Z]).+$/'],
        ], [
            'new_password.required'             => 'New password is required.',
            'new_password.min'                  => 'New password must be at least 8 characters.',
            'new_password.different'            => 'New password must be different from the current password.',
            'new_password.same'                 => 'New password and confirmation password must match',
            'confirm_password.required'         => 'Confirmation password is required.',
            'confirm_password.same'             => 'Confirmation password must match the new password.',
            'new_password.regex'                => 'Password must contain at least one uppercase letter.',
            'confirm_password.regex'            => 'Confirm Password must contain at least one uppercase letter.',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors(),'flag' => false], 200);
        }

        DB::beginTransaction();

        $email = $request->email ?? "";
         try{
            $user = User::where('email',$email)->first();

            if (!$user) {
                return response()->json(['status' => false, 'msg' => 'User not found.','flag' => 'user_not_found'], 200);
            }

            //Update New Password
            User::where('email',$email)->update([
                'password' => Hash::make($request->new_password)
            ]);

            if(strtolower($user->role) !== 'admin'){
                SendWelcomeEmailJob::dispatch($user,'password_update');
            }

            DB::commit();
            DB::table('password_reset_tokens')->where('email', $email)->delete();

            // Flash session message
            session()->flash('toastMessage', [
                'message' => 'Password successfully updated! Please log in with your new credentials.',
                'type' => 'success',
                'position' => 'top-center',
            ]);

            session()->forget('password_reset_verified');
            $redirectRoute = route('login');
            return response()->json(['status' => true, 'redirect_url' => $redirectRoute],200);
         }catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'msg' => 'Something Went failed!', 'error' => $e->getMessage()],500);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();   // all session remove
        $request->session()->regenerateToken();  //csrf token remove
    
        // Flash session message
        session()->flash('toastMessage', [
            'message' => 'You have been logged out successfully.',
            'type' => 'success',
            'position' => 'top-center',
        ]);

        return redirect()->route('login');
    }
}
