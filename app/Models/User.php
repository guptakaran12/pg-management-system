<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

      protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'gender',
        'dob',
        'join_date',
        'current_address',
        'permanent_address',
        'role',
        'username',
        'password',
        'id_proof_type',
        'id_proof_number',
        'id_proof_file',
        'profile_image',   
        'login_mail',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob' => 'date',
        'join_date' => 'date',
        'login_mail' => 'boolean',
        'password' => 'hashed',
    ];
}
