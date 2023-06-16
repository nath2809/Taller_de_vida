<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct($token,$user){
        $this->token = $token;
        $this->user = $user;
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope{
        return new Envelope(
            subject: 'Recuperacion de Contraseña',
        );
    }

    /**
     * Get the message content definition.
     */
    
    public function content(): Content{
        return (new Content())->with([
            'token' => $this->token,
            'user' => $this->user,
        ])->view('auth.resetPassword.EmailBody');
    }

    /**
     * Get the attachments for the message.
     *
     */

    public function attachments(): array{
        return [];
    }
}
