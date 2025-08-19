<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordUpdateUserMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user,$isAdmin,$loginRedirect;

    public function __construct($user,$isAdmin = false)
    {
        $this->user = $user;
        $this->isAdmin = $isAdmin;
        $this->loginRedirect = route('login');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hello ' . $this->user->name . ', Update Your Password',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.password-update',
            with: [
                'user' => $this->user,
                'loginRedirect' => $this->loginRedirect,
                'isAdmin' => $this->isAdmin,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
