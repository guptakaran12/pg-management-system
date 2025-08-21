<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user,$isAdmin,$resetLink;

    public function __construct($user,$isAdmin = false,$resetLink)
    {
        $this->user = $user;
        $this->isAdmin = $isAdmin;
        $this->resetLink = $resetLink;
    }

  
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->isAdmin
                ? 'A new user account has been created: ' . $this->user['full_name']
                : 'Welcome ' . $this->user['full_name'] . '! Your account has been created successfully',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'emails.user-create',
             with: [
                 'user' => $this->user,
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
