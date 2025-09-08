<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewEmailVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $new_email;
    public $user;

    public function __construct($user, $new_email, $token)
    {
        $this->user = $user;
        $this->new_email = $new_email;
        $this->token = $token;
    }

    public function build()
    {
        return $this->subject('Verifikasi Email Baru - AreaKerja')
            ->markdown('emails.verify-new-email')
            ->with([
                'user' => $this->user,
                'new_email' => $this->new_email,
                'token' => $this->token,
                'link' => route('email.verify', $this->token), // supaya tombol link benar
            ]);
    }
}
