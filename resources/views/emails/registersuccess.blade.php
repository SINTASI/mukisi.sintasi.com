@component('mail::message')
# Selamat {{ $user->name }}

### Anda Berhasil Mendaftar Menjadi Anggota MUKISI

### Klik tombol dibawah ini untuk mengaktifkan akun

@component('mail::button', ['url' => $url])
Verifikasi
@endcomponent

@endcomponent
