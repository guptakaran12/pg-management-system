<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgetUserMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user,$resetPasswordUrl,$isAdmin,$resetLink;

    public function __construct($user,$isAdmin = false,$resetLink)
    {
        $this->user = $user;
        $this->resetPasswordUrl = url('/reset/password');
        $this->isAdmin = $isAdmin;
        $this->resetLink = $resetLink;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hello ' . $this->user->name . ', Reset Your Password',
        );
    }

    public function content(): Content
    {
        return new Content(
           view: 'emails.forget-password',
            with: [
                'user' => $this->user,
                'dashboardUrl' => $this->resetPasswordUrl,
                'isAdmin' => $this->isAdmin,
                'resetLink' => $this->resetLink
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
