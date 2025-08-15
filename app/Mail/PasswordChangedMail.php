<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $userName) {}

    public function build()
    {
        return $this->subject('Password Anda Berhasil Diubah')
            ->markdown('emails.passwords.changed', [
                'name' => $this->userName,
                'app'  => config('app.name'),
            ]);
    }
}
