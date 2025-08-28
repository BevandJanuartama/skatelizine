<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>
<body>
 <img src="/img/background.png" alt="Background Image" class="w-full h-screen object-cover absolute ">
    
 <!-- Beranda Button -->
    <button>
        <a href="/siswa/beranda" class="absolute top-2 right-5 text-xl text-white  hover:underline">Beranda</a>
    </button>

    <!-- Header Section -->
    <div class="flex flex-col items-center justify-center h-2/5 relative">
        <h1 class="text-white text-8xl md:text-8xl font-bold text-center space-x-9 ">
            S K A T E L <span class="text-red-500">I Z I N</span> E
        </h1>
    </div>

    <!-- About Section -->
    <section class="flex flex-col md:flex-row items-center justify-center max-w-6xl mx-auto mt-8 px-6 space-y-6 md:space-y-0 md:space-x-12 relative">
        <div class="w-48 h-48 md:w-1/4 md:h-1/4 rounded-full overflow-hidden">
            <img src="/img/pak.png" alt="Profile Picture" class="w-full h-full object-cover">
        </div>

        <!-- Description -->
        <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg max-w-xl">
            <h2 class="text-red-600 text-3xl font-mono mb-4 text-center">Tentang Kami</h2>
            <h3 class="text-red-600 text-4xl font-bold mb-4 text-center space-x-4 font-serif" style="letter-spacing: 0.2em;">Skatel   Izin   System</h3>
            <p class="text-red-700 text-lg leading-relaxed text-justify">
                Skatelizine (Skatel Izin System), adalah website perizinan yang wajib dilakukan oleh siswa/i sebelum keluar dari wilayah sekolah saat jam pelajaran berlangsung. Website ini juga berisi fitur yang mengajukan dispensasi saat ada kegiatan yang mengharuskan siswa/i untuk tidak mengikuti pelajaran.
            </p>
        </div>
    </section>

        <!-- Contact Section -->
        <section class="max-w-7xl mx-auto mt-8 p-3 bg-white rounded-lg shadow-lg top-7 relative">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Address -->
                <div class="flex flex-col items-center space-y-2">
                    <a href="https://maps.app.goo.gl/FLU47eXBEnvNZgbEA" target="_blank" class="flex flex-col items-center">
                        <img src="/img/place.png" alt="Location Icon" class="w-11 h-13">
                        <p class="text-gray-700 text-sm font-semibold text-center">
                            JL. Pangeran Suriansyah, NO. 3, 70711, Banjarbaru, Kalimantan Selatan.
                        </p>
                    </a>
                </div>

                <!-- Phone Numbers -->
                <div class="flex flex-col items-center space-y-2">
                    <a href="https://wa.me/628115005857" target="_blank">
                        <img src="/img/Call.png" alt="Phone Icon" class="w-10 h-12">
                    </a>
                    <p class="text-gray-700 text-sm font-semibold text-center">
                        <a href="https://wa.me/628115005857"  target="_blank">+62 811-500-5857</a>
                        <br>
                        <a href="https://wa.me/6285101650160"  target="_blank">+62 851-0165-0160</a>
                    </p>
                </div>

                <!-- Email -->
                <div class="flex flex-col items-center space-y-2">
                    <a href="mailto:smktelbjb@ypt.or.id" class="flex flex-col items-center">
                        <img src="/img/Post.png" alt="Email Icon" class="w-12 h-15">
                        <p class="text-gray-700 text-lg font-semibold text-center">
                            smktelbjb@ypt.or.id
                        </p>
                    </a>
                </div>

                <!-- Instagram -->
                <div class="flex flex-col items-center space-y-2">
                    <a href="https://www.instagram.com/smktelkombanjarbaru?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="flex flex-col items-center">
                        <img src="/img/instagram.png" alt="Instagram Icon" class="w-10 h-14">
                        <p class="text-gray-700 text-lg font-semibold text-center">
                            @smktelkombanjarbaru
                        </p>
                    </a>
                </div>
        </section>

 @include('sweetalert::alert')
</body>
</html>