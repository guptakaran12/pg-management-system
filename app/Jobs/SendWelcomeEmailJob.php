<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\ForgetUserMail;
use App\Mail\UserLoginNotificationMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCreatedMail;
use App\Mail\PasswordUpdateUserMail;
use Illuminate\Queue\SerializesModels;

class SendWelcomeEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user,$type,$resetLink;

    public function __construct($user,$type = 'login', $resetLink  = null)
    {
        $this->user = $user;
        $this->type = $type;
        $this->resetLink  = $resetLink ;
    }


    public function handle(): void
    {
        if($this->type == 'forget'){
            // 1. Mail to user
            Mail::to($this->user->email)->send(new ForgetUserMail($this->user,false,$this->resetLink));

            // 2. Mail to admin
            Mail::to('pgmsnotitification@gmail.com')->send(new ForgetUserMail($this->user,true, $this->resetLink));
        }else if($this->type == 'password_update'){
            // 1. Mail to user
            Mail::to($this->user->email)->send(new PasswordUpdateUserMail($this->user,false,$this->resetLink));

            // 2. Mail to admin
            Mail::to('pgmsnotitification@gmail.com')->send(new PasswordUpdateUserMail($this->user,true,$this->resetLink));
        }else if($this->type == 'user_create'){
            // 1. Mail to user
            Mail::to($this->user['email'])->send(new UserCreatedMail($this->user,false,$this->resetLink));

            // 2. Mail to admin
            $redirect = route('users.index');
            Mail::to('pgmsnotitification@gmail.com')->send(new UserCreatedMail($this->user,true,$redirect));
        }
        else{
           // Mail to user
            Mail::to($this->user->email)->send(new UserLoginNotificationMail($this->user));

            // Mail to admin
            Mail::to('pgmsnotitification@gmail.com')->send(new UserLoginNotificationMail($this->user, true));
        }
    }
}
