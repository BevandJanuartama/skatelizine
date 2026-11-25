<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat</title>
    <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Zetta&display=swap" rel="stylesheet">
</head>

<body class="relative">

    <!-- Background dengan Overlay -->
    <img src="/img/background.png" alt="Background Image" class="w-full h-screen object-cover absolute ">
    
    <!-- header -->
    <h1 class="text-white text-7xl font-bold text-center font-lexend -top-0 flex-grow group-hover:w-full pb-10 relative">R i w a y a t</h1>
    <button>
    <a href="/siswa/beranda" class="absolute top-0 left-2 text-2xl text-white font-semibold hover:underline"><< Beranda</a>
</button>

    <div class="h-1 bg-white absolute pt-1 py-1 top-20 w-full"></div>

    <br>

    <!-- Divider -->
    <div class="h-1 bg-white w-full"></div>

    <!-- Tabel Izin dan Dispensasi -->
    <div class="relative mt-8 px-8 space-y-8">

        <!-- Tabel Izin -->
        <div class="bg-white rounded-lg shadow">
            <div class="bg-[#3988F1] text-white text-lg font-bold text-center py-3 rounded-t-lg">Izin</div>
            <div class="overflow-y-auto max-h-48">
                <table class="w-full border-collapse">
                    <thead class="sticky top-0 bg-[#5F5F5F] shadow text-white">
                        <tr>
                            <th class="px-4 py-2 text-center border" style="word-wrap: break-word; white-space: normal; max-width: 80px;">No</th>
                            <th class="px-4 py-2 text-center border" style="word-wrap: break-word; white-space: normal; max-width: 200px;">Alasan</th>
                            <th class="px-4 py-2 text-center border">Dibuat Pada</th>
                            <th class="px-4 py-2 text-center border">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izin as $z)
                            <tr class="hover:bg-gray-50 border border-gray-400">
                                <td class="px-4 py-2 text-center" style="word-wrap: break-word; white-space: normal; max-width: 80px;">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-center" style="word-wrap: break-word; white-space: normal; max-width: 200px;">{{ $z->alasan }}</td>
                                <td class="px-4 py-2 text-center ">
                                    <div>{{ \Carbon\Carbon::parse($z->created_at)->format('d-m-Y') }}</div>
                                    <div class="text-gray-500">{{ \Carbon\Carbon::parse($z->created_at)->format('H:i:s') }}</div>
                                </td>
                                <td class="px-4 py-2 text-center ">
                                    <span class="px-3 py-1 rounded 
                                        @if ($z->validasi == 'Diterima') text-green-500
                                        @elseif ($z->validasi == 'Ditolak') text-red-500
                                        @else text-orange-400
                                        @endif">
                                        {{ $z->validasi }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Dispensasi -->
        <div class="bg-white rounded-lg shadow">
            <div class="bg-[#3988F1] text-white text-lg font-bold text-center py-3 rounded-t-lg">Dispensasi</div>
            <div class="overflow-y-auto max-h-48">
                <table class="w-full border-collapse">
                    <thead class="sticky top-0 bg-[#5F5F5F] shadow text-white">
                        <tr>
                            <th class="px-4 py-2 text-center border" style="word-wrap: break-word; white-space: normal; max-width: 80px;">No</th>
                            <th class="px-4 py-2 text-center border" style="word-wrap: break-word; white-space: normal; max-width: 200px;">Alasan</th>
                            <th class="px-4 py-2 text-center border">Dibuat Pada</th>
                            <th class="px-4 py-2 text-center border">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dispen as $d)
                            <tr class="hover:bg-gray-50 border border-gray-400">
                                <td class="px-4 py-2 text-center" style="word-wrap: break-word; white-space: normal; max-width: 80px;">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-center" style="word-wrap: break-word; white-space: normal; max-width: 200px;">{{ $d->alasan }}</td>
                                <td class="px-4 py-2 text-center ">
                                    <div>{{ \Carbon\Carbon::parse($d->created_at)->format('d-m-Y') }}</div>
                                    <div class="text-gray-500">{{ \Carbon\Carbon::parse($d->created_at)->format('H:i:s') }}</div>
                                </td>
                                <td class="px-4 py-2 text-center ">
                                    <span class="px-3 py-1 rounded 
                                        @if ($d->validasi == 'Diterima') text-green-500
                                        @elseif ($d->validasi == 'Ditolak') text-red-500
                                        @else text-orange-400
                                        @endif">
                                        {{ $d->validasi }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>

</html>
