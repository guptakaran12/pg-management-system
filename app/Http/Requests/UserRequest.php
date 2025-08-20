<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name'         => ['required', 'string', 'max:255'],
            'email'             => ['required', 'email', 'unique:users,email'],
            'dob'               => ['required', 'date', 'before:today'],
            'joining_date'      => ['required', 'date', 'before_or_equal:today', 'after_or_equal:dob'],
            'gender'            => ['required', 'in:male,female,other'],
            'current_address'   => ['required', 'string', 'max:500'],
            'permanent_address' => ['required', 'string', 'max:500'],
            'phone_number'      => ['required', 'digits_between:10,15', 'unique:users,phone_number'],
            'role'              => ['required'],
            'username'          => ['required', 'string', 'min:4', 'max:50', 'unique:users,username'],
            'password'          => ['required', 'string', 'min:8', 'max:50','regex:/^(?=.*[A-Z]).+$/'],
            'proof_type'        => ['required', 'in:aadhaar,pan,passport,dl'],
            'proof_number'      => ['required', 'string', 'max:50'],
            'profile_image'     => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            'documents'         => ['nullable', 'array', 'min:1'],
            'documents.*'       => ['file', 'mimes:jpeg,png,jpg,pdf', 'max:5120'],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required'          => 'Full name is required.',
            'full_name.string'            => 'Full name must be a valid string.',
            'full_name.max'               => 'Full name must not exceed 255 characters.',

            'email.required'              => 'Email address is required.',
            'email.email'                 => 'Please enter a valid email address.',
            'email.unique'                => 'This email is already registered.',

            'dob.required'                => 'Date of birth is required.',
            'dob.date'                    => 'Date of birth must be a valid date.',
            'dob.before'                  => 'Date of birth must be before today.',

            'joining_date.required'       => 'Joining Date is required.',
            'joining_date.date'           => 'Joining Date must be a valid date.',
            'joining_date.before_or_equal'=> 'Joining Date cannot be in the future.',
            'joining_date.after_or_equal' => 'Joining Date cannot be before Date of Birth.',

            'gender.required'             => 'Please select a gender.',
            'gender.in'                   => 'Please select a valid gender (Male, Female, or Other).',

            'current_address.required'    => 'Current address is required.',
            'current_address.string'      => 'Current address must be a valid string.',
            'current_address.max'         => 'Current address must not exceed 500 characters.',

            'permanent_address.required'  => 'Permanent address is required.',
            'permanent_address.string'    => 'Permanent address must be a valid string.',
            'permanent_address.max'       => 'Permanent address must not exceed 500 characters.',

            'phone_number.required'       => 'Phone number is required.',
            'phone_number.digits_between' => 'Phone number must be between 10 to 15 digits.',
            'phone_number.unique'         => 'This phone number is already registered.',

            'role.required'               => 'Please select a role.',

            'username.required'           => 'Username is required.',
            'username.string'             => 'Username must be a valid string.',
            'username.min'                => 'Username must be at least 4 characters.',
            'username.max'                => 'Username must not exceed 50 characters.',
            'username.unique'             => 'This username is already taken.',

            'password.required'           => 'Password is required.',
            'password.string'             => 'Password must be a valid string.',
            'password.min'                => 'Password must be at least 8 characters.',
            'password.max'                => 'Password must not exceed 50 characters.',
            'password.regex'                  => 'Password must contain at least one uppercase letter.',

            'proof_type.required'         => 'Proof type is required.',
            'proof_type.in'               => 'Please select a valid proof type (Aadhar, PAN, Passport, or Driving License).',

            'proof_number.required'       => 'Proof number is required.',
            'proof_number.string'         => 'Proof number must be a valid string.',
            'proof_number.max'            => 'Proof number must not exceed 50 characters.',

            'profile_image.image'         => 'Profile image must be an image file.',
            'profile_image.mimes'         => 'Profile image must be JPG, PNG, JPEG, or SVG.',
            'profile_image.max'           => 'Profile image size must not exceed 2MB.',

            'documents.array'             => 'Documents must be uploaded as an array of files.',
            'documents.min'               => 'At least one document is required.',
            'documents.*.file'            => 'Each document must be a valid file.',
            'documents.*.mimes'           => 'Documents must be JPG, PNG, JPEG, or PDF.',
            'documents.*.max'             => 'Each document must not exceed 5MB.',
        ];
    }
}