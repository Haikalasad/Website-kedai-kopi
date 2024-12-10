<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <title>Registrasi Akun</title>
</head>
<body>
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Buat Akun Baru</h2>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input id="name" name="name" type="text" required autofocus
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring focus:ring-[#97151b]">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" name="email" type="email" required
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring focus:ring-[#97151b]">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring focus:ring-[#97151b]">
            </div>
            <div class="mb-4">
                <label for="password-confirm" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input id="password-confirm" name="password_confirmation" type="password" required
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring focus:ring-[#97151b]">
            </div>
            <div class="mb-4">
                <label for="profile_picture" class="block text-sm font-medium text-gray-700">Foto Profil (Opsional)</label>
                <input id="profile_picture" name="profile_picture" type="file"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring focus:ring-[#97151b]">
            </div>
            <button type="submit"
                class="w-full px-4 py-2 text-white bg-[#b7292e] hover:bg-[#97151b]">
                Daftar
            </button>
            <div class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-[#b7292e] hover:underline">Sudah punya akun? Login</a>
            </div>
        </form>
    </div>
</div>
@include('sweetalert::alert')
</body>
</html>
