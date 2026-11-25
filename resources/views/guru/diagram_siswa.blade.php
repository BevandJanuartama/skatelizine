<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa {{ $kelas }}{{ $subkelas }} - SKATEL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * { font-family: 'Inter', sans-serif; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        
        .animate-slide-up {
            animation: slideUp 1.2s ease-out forwards;
        }
        
        .animate-scale-in {
            animation: scaleIn 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(60px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.8) translateY(40px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }
        
        .floating-element {
            animation: float 10s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-20px) rotate(2deg); }
            50% { transform: translateY(-10px) rotate(-1deg); }
            75% { transform: translateY(-15px) rotate(1deg); }
        }
        
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }
        
        .stats-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 6s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 0.3; transform: scale(1) rotate(0deg); }
            50% { opacity: 0.8; transform: scale(1.3) rotate(180deg); }
        }
        
        .table-container {
            position: relative;
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }
        
        .table-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #f5576c, #84fab0, #8fd3f4);
            border-radius: 24px 24px 0 0;
        }
        
        .back-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .back-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.8s;
        }
        
        .back-button:hover::before {
            left: 100%;
        }
        
        .back-button:hover {
            transform: translateX(-8px) translateY(-2px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }
        
        .export-button {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .export-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.8s;
        }
        
        .export-button:hover::before {
            left: 100%;
        }
        
        .export-button:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(240, 147, 251, 0.4);
        }
        
        .class-badge {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            position: relative;
            overflow: hidden;
        }
        
        .class-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 4s infinite;
        }
        
        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        .table-row {
            transition: all 0.3s ease;
            position: relative;
        }
        
        .table-row:hover {
            background: linear-gradient(90deg, rgba(103, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            transform: translateX(5px);
        }
        
        .table-row:hover::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 0 4px 4px 0;
        }
        
        .modern-scrollbar::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }
        
        .modern-scrollbar::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.05);
            border-radius: 10px;
        }
        
        .modern-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 10px;
            border: 2px solid transparent;
            background-clip: content-box;
        }
        
        .modern-scrollbar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
            background-clip: content-box;
        }
        
        .type-badge-izin {
            background: linear-gradient(135deg, #36a2eb, #4bc0c0);
            color: white;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            font-size: 0.875rem;
            box-shadow: 0 4px 12px rgba(54, 162, 235, 0.3);
        }
        
        .type-badge-dispen {
            background: linear-gradient(135deg, #ff6384, #ff9f40);
            color: white;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            font-size: 0.875rem;
            box-shadow: 0 4px 12px rgba(255, 99, 132, 0.3);
        }
        
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        .breadcrumb-item {
            transition: color 0.3s ease;
        }
        
        .breadcrumb-item:hover {
            color: white;
        }
        
        .empty-state {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            border: 2px dashed #cbd5e1;
            border-radius: 16px;
            padding: 3rem;
            text-align: center;
            color: #64748b;
        }
        
        .data-insight {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        }
        
        .summary-card {
            background: linear-gradient(135deg, #ddd6fe 0%, #c4b5fd 100%);
        }
    </style>
</head>
<body class="min-h-screen gradient-bg">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-12 w-40 h-40 bg-white/3 rounded-full floating-element"></div>
        <div class="absolute top-1/3 right-8 w-32 h-32 bg-white/5 rounded-full floating-element" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-32 left-1/4 w-28 h-28 bg-white/4 rounded-full floating-element" style="animation-delay: -4s;"></div>
        <div class="absolute bottom-1/4 right-20 w-24 h-24 bg-white/6 rounded-full floating-element" style="animation-delay: -1s;"></div>
        <div class="absolute top-1/2 left-1/12 w-20 h-20 bg-white/7 rounded-full floating-element" style="animation-delay: -3s;"></div>
        <div class="absolute top-3/4 right-1/3 w-44 h-44 bg-white/2 rounded-full floating-element" style="animation-delay: -5s;"></div>
    </div>

    <div class="relative z-10 min-h-screen">
        <div class="container mx-auto px-6 py-8">
            <!-- Header Section -->
            <div class="mb-8 animate-fade-in">
                <!-- Export Button (Top Right) -->
                <form action="{{ route('guru.export') }}" method="GET" class="absolute top-6 right-6 z-20">
                    <button type="submit" class="export-button p-4 rounded-full text-white shadow-lg">
                        <i class="fas fa-download text-xl"></i>
                    </button>
                </form>

                <!-- Back Button -->
                <div class="mb-6">
                    <a href="{{ url('/guru/diagram/' . $kelas) }}" class="back-button inline-flex items-center px-6 py-3 rounded-full text-white font-medium text-lg shadow-lg">
                        <i class="fas fa-arrow-left mr-3"></i>
                        Kembali ke Diagram Kelas
                    </a>
                </div>

                <!-- Breadcrumb -->
                <div class="breadcrumb">
                    <i class="fas fa-home"></i>
                    <span class="breadcrumb-item">Dashboard</span>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <span class="breadcrumb-item">Diagram</span>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <span class="breadcrumb-item">Kelas {{ $kelas }}</span>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <span class="text-white font-semibold">{{ $kelas }}{{ $subkelas }}</span>
                </div>

                <!-- Title Section -->
                <div class="text-center mb-8">
                    <div class="class-badge inline-flex items-center px-8 py-4 rounded-full text-gray-800 font-bold text-2xl mb-4 shadow-lg">
                        <i class="fas fa-users mr-3"></i>
                        KELAS {{ $kelas }}{{ $subkelas }}
                    </div>
                    <h1 class="text-4xl font-black text-white mb-2 tracking-tight">
                        Detail Data Siswa
                    </h1>
                    <p class="text-xl text-white/80 font-medium">Riwayat lengkap permohonan izin dan dispensasi</p>
                </div>
            </div>

            @php
                use App\Models\Dispen;
                $dataDispen = Dispen::where('kelas', $kelas . $subkelas)->get();
                $izin = collect($dataSiswa)->map(function ($item) {
                    $item->jenis = 'Izin';
                    return $item;
                });
                $dispen = $dataDispen->map(function ($item) {
                    $item->jenis = 'Dispen';
                    return $item;
                });
                $semuaData = $izin->merge($dispen)->sortBy('created_at')->values();
            @endphp

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8 animate-slide-up">
                <div class="stats-card rounded-2xl p-6 text-white card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-white/80 text-sm font-medium mb-1">Total Izin</p>
                            <p class="text-3xl font-bold">{{ $izin->count() }}</p>
                            <p class="text-white/60 text-xs mt-1">Permohonan</p>
                        </div>
                        <div class="text-4xl text-white/60">
                            <i class="fas fa-calendar-times"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card rounded-2xl p-6 text-white card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-white/80 text-sm font-medium mb-1">Total Dispensasi</p>
                            <p class="text-3xl font-bold">{{ $dispen->count() }}</p>
                            <p class="text-white/60 text-xs mt-1">Permohonan</p>
                        </div>
                        <div class="text-4xl text-white/60">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
                
                <div class="data-insight rounded-2xl p-6 text-gray-800 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-700 text-sm font-medium mb-1">Total Siswa</p>
                            <p class="text-3xl font-bold">{{ $semuaData->pluck('nama')->unique()->count() }}</p>
                            <p class="text-gray-600 text-xs mt-1">Unik</p>
                        </div>
                        <div class="text-4xl text-gray-600">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                </div>
                
                <div class="summary-card rounded-2xl p-6 text-gray-800 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-700 text-sm font-medium mb-1">Total Permohonan</p>
                            <p class="text-3xl font-bold">{{ $semuaData->count() }}</p>
                            <p class="text-gray-600 text-xs mt-1">Gabungan</p>
                        </div>
                        <div class="text-4xl text-gray-600">
                            <i class="fas fa-list-check"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Table -->
            <div class="table-container animate-scale-in card-hover">
                <!-- Table Header -->
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-xl font-bold text-center py-6">
                    <i class="fas fa-table mr-3"></i>
                    Tabel Detail Izin & Dispensasi
                    <p class="text-sm font-normal mt-2 text-blue-100">Kelas {{ $kelas }}{{ $subkelas }} - Diurutkan berdasarkan tanggal</p>
                </div>
                
                <div class="modern-scrollbar overflow-auto max-h-[70vh] bg-white/95 backdrop-blur-sm">
                    @if($semuaData->count() > 0)
                        <table class="w-full">
                            <thead class="sticky top-0 bg-gradient-to-r from-gray-700 to-gray-600 text-white">
                                <tr>
                                    <th class="px-6 py-4 text-center font-semibold">
                                        <i class="fas fa-hashtag mr-2"></i>No
                                    </th>
                                    <th class="px-6 py-4 text-center font-semibold">
                                        <i class="fas fa-user mr-2"></i>Nama Siswa
                                    </th>
                                    <th class="px-6 py-4 text-center font-semibold">
                                        <i class="fas fa-school mr-2"></i>Kelas
                                    </th>
                                    <th class="px-6 py-4 text-center font-semibold">
                                        <i class="fas fa-tags mr-2"></i>Jenis
                                    </th>
                                    <th class="px-6 py-4 text-center font-semibold">
                                        <i class="fas fa-comment-alt mr-2"></i>Alasan
                                    </th>
                                    <th class="px-6 py-4 text-center font-semibold">
                                        <i class="fas fa-calendar mr-2"></i>Tanggal & Waktu
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-800">
                                @foreach ($semuaData as $index => $siswa)
                                    <tr class="table-row border-b border-gray-200/50">
                                        <td class="px-6 py-4 text-center font-bold text-lg text-gray-900">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="font-semibold text-gray-900 text-lg">{{ $siswa->nama }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                                {{ $siswa->kelas }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="{{ $siswa->jenis == 'Izin' ? 'type-badge-izin' : 'type-badge-dispen' }}">
                                                <i class="fas {{ $siswa->jenis == 'Izin' ? 'fa-calendar-times' : 'fa-clock' }} mr-2"></i>
                                                {{ $siswa->jenis }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center max-w-xs">
                                            <div class="bg-gray-50 p-3 rounded-lg">
                                                <p class="text-gray-700 text-sm leading-relaxed">{{ $siswa->alasan }}</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="bg-gradient-to-br from-blue-50 to-purple-50 p-3 rounded-lg">
                                                <div class="font-bold text-gray-900 text-lg">
                                                    {{ \Carbon\Carbon::parse($siswa->created_at)->format('d/m/Y') }}
                                                </div>
                                                <div class="text-sm text-gray-600 mt-1">
                                                    <i class="fas fa-clock mr-1"></i>
                                                    {{ \Carbon\Carbon::parse($siswa->created_at)->format('H:i:s') }}
                                                </div>
                                                <div class="text-xs text-gray-500 mt-1">
                                                    {{ \Carbon\Carbon::parse($siswa->created_at)->diffForHumans() }}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="empty-state">
                            <div class="text-6xl mb-4">
                                <i class="fas fa-inbox text-gray-400"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-600 mb-2">Tidak Ada Data</h3>
                            <p class="text-gray-500 text-lg">
                                Belum ada permohonan izin maupun dispensasi untuk kelas {{ $kelas }}{{ $subkelas }}.
                            </p>
                            <div class="mt-6">
                                <i class="fas fa-info-circle mr-2"></i>
                                Data akan muncul setelah siswa mengajukan permohonan.
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Stagger animation for stats cards
            const cards = document.querySelectorAll('.stats-card, .data-insight, .summary-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(50px) scale(0.9)';
                card.style.transition = 'all 1s cubic-bezier(0.4, 0, 0.2, 1)';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0) scale(1)';
                }, index * 150);
            });

            // Animate table rows with stagger
            const tableRows = document.querySelectorAll('.table-row');
            tableRows.forEach((row, index) => {
                row.style.opacity = '0';
                row.style.transform = 'translateX(-30px)';
                row.style.transition = 'all 0.8s ease';
                
                setTimeout(() => {
                    row.style.opacity = '1';
                    row.style.transform = 'translateX(0)';
                }, 1500 + (index * 100));
            });

            // Add hover sound effect simulation (visual feedback)
            document.querySelectorAll('.table-row').forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.boxShadow = '0 8px 25px rgba(103, 126, 234, 0.15)';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.boxShadow = 'none';
                });
            });

            // Enhanced button interactions
            document.querySelectorAll('.back-button, .export-button').forEach(button => {
                button.addEventListener('click', function(e) {
                    // Add loading effect
                    const originalContent = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
                    
                    setTimeout(() => {
                        this.innerHTML = originalContent;
                    }, 1000);
                });
            });
        });
    </script>
</body>
</html>