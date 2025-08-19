<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $isAdmin ? __('Password Reset Requested by User | PGMS') : __('Reset Your Password | PGMS') }}</title>
</head>

<body
    style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f2f2f2;">
    <div
        style="max-width: 650px; margin: 30px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">

        <!-- Header -->
        <div style="background-color: #003366; padding: 20px; text-align: center;">
            <img src="https://i.postimg.cc/CLs0W7CK/logo2.png" alt="{{ __('PGMS Logo') }}"
                style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
            <h1 style="color: white; margin-top: 10px;">
                {{ $isAdmin ? __('Password Reset Notification') : __('Reset Your Password') }}
            </h1>
        </div>

        <!-- Content -->
        <div style="padding: 30px;">
            @if ($isAdmin)
                <h2 style="color: #2c3e50;">🔒 {{ __('Password Reset Request Received') }}</h2>
                <p style="font-size: 15px;">
                    {{ __('A PGMS user has requested a password reset. Below are the details:') }}
                </p>

                <ul style="line-height: 1.6;">
                    <li><strong>{{ __('Name:') }}</strong> {{ $user->first_name }} {{ $user->last_name }}</li>
                    <li><strong>{{ __('Email:') }}</strong> {{ $user->email }}</li>
                    @if (isset($user->phone))
                        <li><strong>{{ __('Phone:') }}</strong> {{ $user->phone }}</li>
                    @endif
                    <li><strong>{{ __('Requested At:') }}</strong> {{ now('Asia/Kolkata')->format('d M Y, h:i A') }}
                    </li>
                </ul>

                <p style="margin-top: 20px;">
                    <a href="{{ $resetPasswordUrl }}"
                        style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                        {{ __('View in PGMS Admin Panel') }}
                    </a>
                </p>
            @else
                <h2 style="color: #2c3e50;">🔐 {{ __('Hello') }} {{ $user->first_name }},</h2>
                <p style="font-size: 16px;">
                    {{ __('We received a request to reset your password for your PGMS account.') }}
                </p>

                <p
                    style="background: #fff4e5; padding: 15px; border-left: 4px solid #ffa500; font-size: 14px; border-radius: 4px;">
                    🕒 {{ __('Request Time:') }} <strong>{{ now('Asia/Kolkata')->format('d M Y, h:i A') }}</strong>
                </p>

                <p style="margin-top: 20px;">
                    {{ __('Click the button below to reset your password. This link will expire in 60 minutes.') }}
                </p>

                <p style="margin-top: 25px; text-align: center;">
                    <a href="{{ $resetLink }}"
                        style="background-color: #28a745; color: white; padding: 12px 25px; font-size: 16px; text-decoration: none; border-radius: 5px;">
                        {{ __('Reset Password') }}
                    </a>
                </p>

                <p style="margin-top: 30px; font-size: 14px; color: #555;">
                    {{ __('If you didn’t request this, you can safely ignore this email.') }}
                </p>

                <p style="font-size: 14px; color: #555; margin-top: 20px;">
                    {{ __('Thanks,') }}<br>
                    <strong>{{ __('Team PGMS') }}</strong>
                </p>
            @endif
        </div>

        <!-- Footer -->
        <div style="background-color: #f7f7f7; padding: 20px; text-align: center; font-size: 13px; color: #999;">
            © {{ date('Y') }} {{ __('PGMS') }}. {{ __('All rights reserved.') }}
        </div>
    </div>
</body>

</html>
