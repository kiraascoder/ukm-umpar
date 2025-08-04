@component('mail::message')
    # Permintaan Reset Password

    Halo, {{ $user->nama_lengkap ?? ($user->name ?? 'User') }}.

    Kami menerima permintaan untuk mengatur ulang password akun Anda. Klik tombol di bawah ini untuk melanjutkan proses
    reset password:

    @component('mail::button', ['url' => url('reset-password?token=' . $token . '&email=' . $user->email)])
        Reset Password
    @endcomponent

    Jika Anda tidak meminta reset password, abaikan saja email ini. Password Anda tidak akan diubah tanpa tindakan dari
    Anda.

    Terima kasih,<br>
    {{ config('app.name') }}
@endcomponent
