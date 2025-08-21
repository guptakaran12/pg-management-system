@php
    $fullName = $user['full_name'] ?? ($user['username'] ?? __('there'));
    $brand = __('PG Management System');
@endphp
<!DOCTYPE html>
<html lang="en" style="margin:0;padding:0;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $brand }} — {{ __('Password Reset Notification') }}</title>
</head>

<body
    style="margin:0;padding:0;background:#0d1117;font-family:system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#0d1117;padding:30px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0"
                    style="max-width:600px;width:100%;background:#161b22;border-radius:20px;overflow:hidden;box-shadow:0 6px 25px rgba(0,0,0,.5);">

                    <!-- Header -->
                    <tr>
                        <td align="center"
                            style="background:linear-gradient(135deg,#6c5ce7,#2d7eff);padding:35px 20px;">
                            <div style="font-size:24px;font-weight:800;color:#fff;letter-spacing:.6px;">
                                {{ $brand }}
                            </div>
                            <div style="margin-top:8px;color:#dbe7ff;font-size:14px;opacity:.9;">
                                {{ $isAdmin ? __('🔔 Password Reset Requested (User Alert)') : __('🔒 Password Reset Request') }}
                            </div>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:32px;">
                            @if ($isAdmin)
                                <!-- Admin Email -->
                                <h2 style="color:#fff;margin:0 0 12px;font-size:20px;">
                                    {{ __('Hello Admin 👋') }}
                                </h2>
                                <p style="color:#a9b8d9;margin:0 0 22px;font-size:14px;line-height:1.6;">
                                    {{ __('A password reset request has been made by user ":name".', ['name' => $fullName]) }}
                                </p>
                                <p style="color:#a9b8d9;font-size:14px;line-height:1.6;">
                                    {{ __('Requested Email: :email', ['email' => $user['email'] ?? __('N/A')]) }} <br>
                                    {{ __('Request Time: :time', ['time' => now()->format('d M Y, h:i A')]) }}
                                </p>

                                <!-- Dashboard Button -->
                                <div style="text-align:center;margin-top:28px;">
                                    <a href="{{ url('/dashboard') }}"
                                        style="display:inline-block;padding:14px 28px;background:linear-gradient(135deg,#6c5ce7,#2d7eff);color:#fff;text-decoration:none;border-radius:12px;font-weight:700;font-size:14px;">
                                        {{ __('📊 View in Dashboard') }}
                                    </a>
                                </div>
                            @else
                                <!-- User Email -->
                                <h2 style="color:#fff;margin:0 0 12px;font-size:20px;">
                                    {{ __('Hello, :name 👋', ['name' => $fullName]) }}
                                </h2>
                                <p style="color:#a9b8d9;margin:0 0 22px;font-size:14px;line-height:1.6;">
                                    {{ __('We received a request to reset the password for your account (:email).', ['email' => $user['email'] ?? __('your email')]) }}
                                    {{ __('Click the button below to set a new password.') }}
                                </p>

                                <!-- Reset Button -->
                                <div style="text-align:center;margin-top:28px;">
                                    <a href="{{ $resetLink }}"
                                        style="display:inline-block;padding:14px 28px;background:linear-gradient(135deg,#2d7eff,#6c5ce7);color:#fff;text-decoration:none;border-radius:12px;font-weight:700;font-size:14px;">
                                        {{ __('🔑 Reset Your Password') }}
                                    </a>
                                </div>

                                <!-- Info -->
                                <p style="margin-top:24px;color:#8fa7d9;font-size:12px;line-height:1.6;">
                                    {{ __('If you didn’t request this, you can safely ignore this email. Your account will remain secure.') }}
                                </p>
                            @endif
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center"
                            style="background:#161b22;padding:22px;color:#7e92be;font-size:12px;line-height:1.6;border-top:1px solid rgba(255,255,255,.08);">
                            © {{ date('Y') }} {{ $brand }} — {{ __('All rights reserved.') }}<br>
                            {{ __('If you didn’t expect this email, please ignore it safely.') }}
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>
