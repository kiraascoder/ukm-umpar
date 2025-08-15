@component('mail::message')
    # Reset Password

    Halo {{ $name }},

    Kami menerima permintaan untuk mengatur ulang password akun Anda di **{{ $app }}**.

    @component('mail::button', ['url' => $url])
        Atur Ulang Password
    @endcomponent

    Link di atas berlaku selama {{ $expires }} menit.
    Jika Anda tidak meminta reset password, abaikan email ini.

    Terima kasih,<br>
    {{ $app }}
@endcomponent
