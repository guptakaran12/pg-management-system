<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $isAdmin ? 'Password changed by ' . $user->first_name : 'Your PG account password has been updated' }}
    </title>
</head>

<body
    style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f2f2f2;">
    <div
        style="max-width: 650px; margin: 30px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">

        <!-- Header -->
        <div style="background-color: #003366; padding: 20px; text-align: center;">
            <img src="https://i.postimg.cc/CLs0W7CK/logo2.png" alt="PG Logo"
                style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
            <h1 style="color: white; margin-top: 10px;">
                {{ $isAdmin ? __('User Password Change Alert') : __('Password Updated Successfully!') }}
            </h1>
        </div>

        <!-- Content -->
        <div style="padding: 30px;">
            @if ($isAdmin)
                <h2 style="color: #2c3e50;">🔐 {{ __('A User Has Updated Their PG Account Password') }}</h2>
                <p style="font-size: 15px;">
                    {{ __('The following user has successfully updated their password in the PG system:') }}
                </p>

                <ul style="line-height: 1.6;">
                    <li><strong>{{ __('Name:') }}</strong> {{ $user->first_name }} {{ $user->last_name }}</li>
                    <li><strong>{{ __('Email:') }}</strong> {{ $user->email }}</li>
                    @if (isset($user->phone))
                        <li><strong>{{ __('Phone:') }}</strong> {{ $user->phone }}</li>
                    @endif
                    <li><strong>{{ __('Updated At:') }}</strong> {{ now('Asia/Kolkata')->format('d M Y, h:i A') }}
                    </li>
                </ul>

                <p style="margin-top: 25px; text-align: center;">
                    <a href="{{ $loginRedirect }}"
                        style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                        {{ __('Login to Admin Panel') }}
                    </a>
                </p>
            @else
                <h2 style="color: #2c3e50;">👋 {{ __('Hello') }} {{ $user->first_name }},</h2>
                <p style="font-size: 16px;">
                    {{ __('Your PG account password has been updated successfully.') }}
                </p>

                <p
                    style="background: #d4edda; padding: 15px; border-left: 4px solid #28a745; font-size: 14px; border-radius: 4px;">
                    ✅ {{ __('Change Time:') }} <strong>{{ now('Asia/Kolkata')->format('d M Y, h:i A') }}</strong>
                </p>

                <p style="margin-top: 20px;">
                    {{ __('You can now access your PG account with your new password.') }}
                    {{ __('If you did not make this change, please contact PG support immediately.') }}
                </p>

                <h4 style="margin-top: 25px;">✨ {{ __('Quick Actions You Can Do Now:') }}</h4>
                <ul style="line-height: 1.8;">
                    <li>📋 {{ __('Request Room Bookings') }}</li>
                    <li>🧾 {{ __('View Bills or Invoices') }}</li>
                    <li>🔔 {{ __('Receive Real-time Notifications') }}</li>
                    <li>📦 {{ __('Track Your Items or Services') }}</li>
                </ul>

                <p style="margin-top: 25px; text-align: center;">
                    <a href="{{ $loginRedirect }}"
                        style="background-color: #003366; color: white; padding: 12px 25px; font-size: 16px; text-decoration: none; border-radius: 5px;">
                        {{ __('Go to My PG Dashboard') }}
                    </a>
                </p>

                <p style="margin-top: 30px; font-size: 14px; color: #555;">
                    {{ __('Need help? Reply to this email to contact PG support.') }}
                </p>

                <p style="font-size: 14px; color: #555; margin-top: 20px;">
                    {{ __('Thanks,') }}<br>
                    <strong>{{ __('Team PG Management') }}</strong>
                </p>
            @endif
        </div>

        <!-- Footer -->
        <div style="background-color: #f7f7f7; padding: 20px; text-align: center; font-size: 13px; color: #999;">
            © {{ date('Y') }} {{ __('PG Management System') }}. {{ __('All rights reserved.') }}
        </div>
    </div>
</body>

</html>
