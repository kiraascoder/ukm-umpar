@component('mail::message')
    # Password Berhasil Diubah

    Halo {{ $name }},

    Password akun Anda di **{{ $app }}** telah berhasil diubah.
    Jika ini bukan Anda, segera amankan akun Anda dan hubungi admin.

    Terima kasih,<br>
    {{ $app }}
@endcomponent
