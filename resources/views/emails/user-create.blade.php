@php
    $fullName = $user['full_name'] ?? ($user['username'] ?? __('there'));
    $brand = __('PG Management System');
@endphp
<!DOCTYPE html>
<html lang="en" style="margin:0;padding:0;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $brand }} — {{ __('Account Created') }}</title>
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
                                {{ $brand }}</div>
                            <div style="margin-top:8px;color:#dbe7ff;font-size:14px;opacity:.9;">
                                @if ($isAdmin)
                                    {{ __('✨ New user created in system') }}
                                @else
                                    {{ __('🎉 Welcome to your new account') }}
                                @endif
                            </div>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:32px;">
                            @if ($isAdmin)
                                <h2 style="color:#fff;margin:0 0 12px;font-size:20px;">
                                    {{ __('New user added 🚀') }}</h2>
                                <p style="color:#a9b8d9;margin:0 0 22px;font-size:14px;line-height:1.6;">
                                    {{ __('A new user has been added to') }} <strong
                                        style="color:#fff;">{{ $brand }}</strong>.
                                    {{ __('Here are the credentials for your record:') }}
                                </p>
                            @else
                                <h2 style="color:#fff;margin:0 0 12px;font-size:20px;">
                                    {{ __('Welcome, :name 🎉', ['name' => $fullName]) }}</h2>
                                <p style="color:#a9b8d9;margin:0 0 22px;font-size:14px;line-height:1.6;">
                                    {{ __('Your account on') }} <strong
                                        style="color:#fff;">{{ $brand }}</strong> {{ __('is now active!') }}
                                    {{ __('Use the credentials below to log in securely.') }}
                                </p>
                            @endif

                            <!-- User Details Card -->
                            <div
                                style="background:#1c2128;border:1px solid rgba(255,255,255,.08);border-radius:14px;overflow:hidden;">
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td colspan="2"
                                            style="padding:14px 18px;background:#21262d;color:#8fa7d9;font-size:12px;font-weight:600;letter-spacing:.6px;text-transform:uppercase;">
                                            {{ __('Account Details') }}
                                        </td>
                                    </tr>
                                    @if (!$isAdmin)
                                        <tr>
                                            <td style="padding:12px 18px;color:#a9b8d9;width:160px;">
                                                {{ __('Full Name') }}</td>
                                            <td style="padding:12px 18px;color:#fff;">{{ $user['full_name'] ?? '—' }}
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td style="padding:12px 18px;color:#a9b8d9;">{{ __('Username') }}</td>
                                        <td style="padding:12px 18px;color:#fff;">{{ $user['username'] ?? '—' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:12px 18px;color:#a9b8d9;">{{ __('Email') }}</td>
                                        <td style="padding:12px 18px;color:#fff;">{{ $user['email'] ?? '—' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:12px 18px;color:#a9b8d9;">{{ __('Password') }}</td>
                                        <td style="padding:12px 18px;color:#fff;font-weight:600;">
                                            {{ $user['password'] ?? '—' }}</td>
                                    </tr>
                                </table>
                            </div>

                            <!-- CTA -->
                            @if (!$isAdmin && !empty($resetLink))
                                <div style="text-align:center;margin-top:28px;">
                                    <a href="{{ $resetLink }}"
                                        style="display:inline-block;padding:14px 28px;background:linear-gradient(135deg,#2d7eff,#6c5ce7);color:#fff;text-decoration:none;border-radius:12px;font-weight:700;font-size:14px;">
                                        {{ __('🔑 Log in to your Account') }}
                                    </a>
                                </div>
                            @elseif($isAdmin && !empty($resetLink))
                                <div style="text-align:center;margin-top:28px;">
                                    <a href="{{ $resetLink }}"
                                        style="display:inline-block;padding:14px 28px;background:linear-gradient(135deg,#6c5ce7,#2d7eff);color:#fff;text-decoration:none;border-radius:12px;font-weight:700;font-size:14px;">
                                        {{ __('👥 View Users List') }}
                                    </a>
                                </div>
                            @endif

                            <!-- Extra Info -->
                            @if (!$isAdmin)
                                <p style="margin-top:24px;color:#8fa7d9;font-size:12px;line-height:1.6;">
                                    {{ __('💡 Tip: For your security, please change your password after your first login from Profile Settings.') }}
                                </p>
                            @else
                                <p style="margin-top:24px;color:#8fa7d9;font-size:12px;line-height:1.6;">
                                    {{ __('ℹ️ This is an automated admin notification. No action required.') }}
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
