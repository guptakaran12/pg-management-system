<?php

namespace App\Http\Controllers\Dashboard\User;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Jobs\SendWelcomeEmailJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $userList = [];
        $userList = User::select('id', 'full_name', 'profile_image', 'email', 'phone_number', 'gender', 'dob', 'join_date', 'role')
        ->where('role', '!=', 'Admin')   
        ->orderBy('id', 'desc')          
        ->get();

        return view('dashboard.user.index',compact('userList'));
    }

    public function createShowPage()
    {
        return view('dashboard.user.create');
    }

    public function saveUser(UserRequest $request)
    {   
        $data = $request->validated();
        DB::beginTransaction();

        try{
            //Document Files
            $proofFilesArray = [];
    
            if($request->hasFile('documents')){
                $files = $request->file('documents');
                $files = array_slice($files,0,4);
                foreach ($files as $file) {
                    $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/id_proofs', $filename);
                    $proofFilesArray[] = $filename;
                }
            }
    
            $data['documents'] = $proofFilesArray ? json_encode($proofFilesArray) : null;
    
            //Profile Image
            if($request->hasFile('profile_image')){
                $profileImage = $request->file('profile_image');
                $profileImageName = Str::uuid() . '.' . $profileImage->getClientOriginalExtension();
                $profileImage->storeAs('public/profile_images', $profileImageName);
                $data['profile_image'] = $profileImageName;
            }
    
            User::create([
                'full_name'         => $data['full_name'] ?? null,
                'email'             => $data['email'] ?? null,
                'phone_number'      => $data['phone_number'] ?? null,
                'gender'            => $data['gender'] ?? null,         
                'dob'               => $data['dob'] ?? null,
                'join_date'         => $data['joining_date'] ?? null,
                'current_address'   => $data['current_address'] ?? null,
                'permanent_address' => $data['permanent_address'] ?? null,
                'role'              => $data['role'] ?? null,            
                'status'            => $data['status'] ?? null,            
                'username'          => $data['username'] ?? null,
                'password'          => Hash::make($data['password']) ?? null,
                'id_proof_type'     => $data['proof_type'] ?? null,   
                'id_proof_number'   => $data['proof_number'] ?? null,
                'id_proof_file'     =>  $data['documents'] ?? null,  
                'profile_image'     =>  $data['profile_image'] ?? null,
                'login_mail'        => 0,
                'remember_token'    => null,
            ]);
    
            $user = [
                'full_name'  => $data['full_name'] ?? null,
                'username'   => $data['username'] ?? null,
                'email'      => $data['email'] ?? null,
                'password'   => $data['password'] ?? null,
            ];
    
            $redirect = route('login');
            SendWelcomeEmailJob::dispatch($user,"user_create",$redirect);
    
            DB::commit();

            // Flash session message
            session()->flash('toastMessage', [
                'message' => 'User successfully created.',
                'type' => 'success',
                'position' => 'top-center',
            ]);
    
            return response()->json(['status' => true,'redirect_url' => route('users.index')], 200);
        }catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'msg' => 'User Add failed!', 'error' => $e->getMessage()],500);
        }
    }

    
}