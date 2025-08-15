<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $userName,
        public string $url,
        public int $expiresMinutes
    ) {}

    public function build()
    {
        return $this->subject('Reset Password Akun Anda')
            ->markdown('emails.passwords.reset-link', [
                'name'    => $this->userName,
                'url'     => $this->url,
                'expires' => $this->expiresMinutes,
                'app'     => config('app.name'),
            ]);
    }
}
