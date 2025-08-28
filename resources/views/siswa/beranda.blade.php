<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>
<body>
    <!-- Background dengan Overlay -->
    <div class="relative">
        <img src="/img/beranda.png" alt="Background Image" class="w-full h-screen object-cover">

        <!-- Header -->
        <header class="absolute top-0 left-3 w-full flex justify-between items-center p-3 text-white">
            <div class="flex space-x-4 text-sm">
                <a href="/siswa/home" class="hover:underline">Home</a> &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/siswa/riwayat" class="hover:underline">Riwayat</a>
            </div>

            <button class="relative w-12 right-3" onclick="window.location.href='/siswa/profile'">
                <img src="/img/user.png" alt="User Icon">
            </button>
        </header>

        <!-- Judul -->
        <div class="absolute top-12 w-full text-center text-white px-4">
            <h1 class="text-8xl font-extrabold tracking-widest font-sans pt-3">S K A T E L I Z I N E</h1>
        </div>

        <!-- Ikon Dispensi dan Izin -->
        <div class="absolute bottom-20 left-1/2 transform -translate-x-1/2 flex space-x-8">

            <!-- Kartu Dispensasi -->
            <a href="/siswa/dispen" class="flex items-center p-2 rounded">
                <img src="/img/dispensi.png" alt="Dispensasi" class="w-123 h-93">
            </a>

            <!-- Ikon Izin -->
            <a href="/siswa/izin" class="flex items-center p-2 rounded">
                <img src="/img/izin.png" alt="Izin" class="w-123 h-93">
            </a>
            
        </div>
    </div>
</body>
</html>
