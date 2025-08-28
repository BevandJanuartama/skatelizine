<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konfirmasi Guru - SKATEL</title>
  <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
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
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .card-hover {
      transition: all 0.3s ease;
    }
    
    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .animate-fade-in {
      animation: fadeIn 0.6s ease-out forwards;
    }
    
    .animate-slide-up {
      animation: slideUp 0.8s ease-out forwards;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .status-badge {
      position: relative;
      overflow: hidden;
    }
    
    .status-badge::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: left 0.6s;
    }
    
    .status-badge:hover::before {
      left: 100%;
    }
    
    .btn-action {
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
    }
    
    .btn-action::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.6s;
    }
    
    .btn-action:hover::before {
      left: 100%;
    }
    
    .floating-element {
      animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
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
      animation: pulse 4s ease-in-out infinite;
    }
    
    @keyframes pulse {
      0%, 100% { opacity: 0.5; transform: scale(1); }
      50% { opacity: 1; transform: scale(1.1); }
    }
    
    .table-row {
      transition: all 0.3s ease;
    }
    
    .table-row:hover {
      background: linear-gradient(90deg, rgba(103, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
      transform: scale(1.01);
    }
    
    .modern-scrollbar::-webkit-scrollbar {
      width: 8px;
    }
    
    .modern-scrollbar::-webkit-scrollbar-track {
      background: rgba(0,0,0,0.1);
      border-radius: 10px;
    }
    
    .modern-scrollbar::-webkit-scrollbar-thumb {
      background: linear-gradient(135deg, #667eea, #764ba2);
      border-radius: 10px;
    }
    
    .modern-scrollbar::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(135deg, #5a67d8, #6b46c1);
    }
  </style>
</head>
<body class="min-h-screen gradient-bg">
  <!-- Animated Background Elements -->
  <div class="fixed inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-10 left-10 w-20 h-20 bg-white/10 rounded-full floating-element"></div>
    <div class="absolute top-1/4 right-20 w-16 h-16 bg-white/5 rounded-full floating-element" style="animation-delay: -2s;"></div>
    <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-white/8 rounded-full floating-element" style="animation-delay: -4s;"></div>
    <div class="absolute bottom-1/3 right-10 w-24 h-24 bg-white/6 rounded-full floating-element" style="animation-delay: -1s;"></div>
  </div>

  <div class="relative z-10">
    <!-- Header Section -->
    <header class="glass-effect animate-fade-in">
      <div class="container mx-auto px-6 py-8">
        <div class="flex items-center justify-between">
          <!-- Logo & Title -->
          <div class="text-center flex-1">
            <h1 class="text-5xl lg:text-6xl font-black text-white tracking-tight">
              <span class="text-white drop-shadow-lg">SKATEL</span>
              <span class="text-red-400 drop-shadow-lg">IZIN</span>
              <span class="text-white drop-shadow-lg">E</span>
            </h1>
            <p class="text-white/80 mt-2 text-lg">Dashboard Konfirmasi Guru</p>
          </div>
          
          <!-- Action Buttons -->
          <div class="flex items-center space-x-4">
            <!-- Diagram Button -->
            <form action="{{ route('guru.diagram') }}" method="GET" style="display:inline;">
              <button type="submit" class="glass-effect p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
                <i class="fas fa-chart-bar text-white text-xl group-hover:scale-110 transition-transform"></i>
              </button>
            </form>
            
            <!-- Export Button -->
            <form action="{{ route('guru.export') }}" method="GET" style="display:inline;">
              <button type="submit" class="glass-effect p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
                <i class="fas fa-download text-white text-xl group-hover:scale-110 transition-transform"></i>
              </button>
            </form>
            
            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
              @csrf
              <button type="submit" class="glass-effect p-3 rounded-xl hover:bg-red-500/30 transition-all duration-300 group">
                <i class="fas fa-sign-out-alt text-white text-xl group-hover:scale-110 transition-transform"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </header>

    <!-- Stats Cards -->
    <div class="container mx-auto px-6 py-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8 animate-slide-up">
        <div class="stats-card rounded-2xl p-6 text-white card-hover">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-white/80 text-sm font-medium">Total Izin</p>
              <p class="text-3xl font-bold">{{ count($izin ?? []) }}</p>
            </div>
            <i class="fas fa-calendar-times text-3xl text-white/60"></i>
          </div>
        </div>
        
        <div class="stats-card rounded-2xl p-6 text-white card-hover">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-white/80 text-sm font-medium">Total Dispensasi</p>
              <p class="text-3xl font-bold">{{ count($dispen ?? []) }}</p>
            </div>
            <i class="fas fa-clock text-3xl text-white/60"></i>
          </div>
        </div>
        
        <div class="stats-card rounded-2xl p-6 text-white card-hover">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-white/80 text-sm font-medium">Menunggu</p>
              <p class="text-3xl font-bold">{{ collect($izin ?? [])->where('validasi', 'Menunggu')->count() + collect($dispen ?? [])->where('validasi', 'Menunggu')->count() }}</p>
            </div>
            <i class="fas fa-hourglass-half text-3xl text-white/60"></i>
          </div>
        </div>
        
        <div class="stats-card rounded-2xl p-6 text-white card-hover">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-white/80 text-sm font-medium">Disetujui</p>
              <p class="text-3xl font-bold">{{ collect($izin ?? [])->where('validasi', 'Diterima')->count() + collect($dispen ?? [])->where('validasi', 'Diterima')->count() }}</p>
            </div>
            <i class="fas fa-check-circle text-3xl text-white/60"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 pb-12 space-y-8">
      
      <!-- Tabel Izin -->
      <div class="glass-effect rounded-3xl overflow-hidden card-hover animate-slide-up">
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-xl font-bold text-center py-4">
          <i class="fas fa-calendar-times mr-3"></i>
          Tabel Permohonan Izin
        </div>
        <div class="modern-scrollbar overflow-y-auto max-h-[70vh] bg-white/95 backdrop-blur-sm">
          <table class="w-full">
            <thead class="sticky top-0 bg-gradient-to-r from-gray-700 to-gray-600 text-white">
              <tr>
                <th class="px-6 py-4 text-center font-semibold">No</th>
                <th class="px-6 py-4 text-center font-semibold">NIS</th>
                <th class="px-6 py-4 text-center font-semibold">Nama</th>
                <th class="px-6 py-4 text-center font-semibold">Kelas</th>
                <th class="px-6 py-4 text-center font-semibold">Jurusan</th>
                <th class="px-6 py-4 text-center font-semibold">Wali Kelas</th>
                <th class="px-6 py-4 text-center font-semibold">Alasan</th>
                <th class="px-6 py-4 text-center font-semibold">Bukti</th>
                <th class="px-6 py-4 text-center font-semibold">Tanggal</th>
                <th class="px-6 py-4 text-center font-semibold">Status</th>
                <th class="px-6 py-4 text-center font-semibold">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-gray-800">
              @foreach ($izin as $z)
                <tr class="table-row border-b border-gray-200/50">
                  <td class="px-6 py-4 text-center font-medium">{{ $loop->iteration }}</td>
                  <td class="px-6 py-4 text-center">{{ $z->nis }}</td>
                  <td class="px-6 py-4 text-center font-medium text-gray-900">{{ $z->nama }}</td>
                  <td class="px-6 py-4 text-center">{{ $z->kelas }}</td>
                  <td class="px-6 py-4 text-center">{{ $z->jurusan }}</td>
                  <td class="px-6 py-4 text-center">{{ $z->wali_kelas }}</td>
                  <td class="px-6 py-4 text-center max-w-xs">
                    <div class="truncate" title="{{ $z->alasan }}">{{ $z->alasan }}</div>
                  </td>
                  <td class="px-6 py-4 text-center">
                    <a href="{{ asset('storage/' . $z->foto) }}" target="_blank" class="block">
                      <img src="{{ asset('storage/' . $z->foto) }}" class="w-16 h-16 object-cover rounded-lg mx-auto shadow-md hover:shadow-lg transition-shadow cursor-pointer">
                    </a>
                  </td>
                  <td class="px-6 py-4 text-center">
                    <div class="font-medium">{{ \Carbon\Carbon::parse($z->created_at)->format('d/m/Y') }}</div>
                    <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($z->created_at)->format('H:i') }}</div>
                  </td>
                  <td class="px-6 py-4 text-center">
                    @php
                      $statusConfig = match($z->validasi) {
                        'Diterima' => ['class' => 'bg-green-100 text-green-800 border-green-300', 'icon' => 'fa-check-circle'],
                        'Ditolak' => ['class' => 'bg-red-100 text-red-800 border-red-300', 'icon' => 'fa-times-circle'],
                        default => ['class' => 'bg-orange-100 text-orange-800 border-orange-300', 'icon' => 'fa-clock'],
                      };
                    @endphp
                    <span class="status-badge inline-flex items-center px-3 py-1 rounded-full text-sm font-medium border {{ $statusConfig['class'] }}">
                      <i class="fas {{ $statusConfig['icon'] }} mr-2"></i>
                      {{ $z->validasi }}
                    </span>
                  </td>
                  <td class="px-6 py-4 text-center">
                    <div class="flex justify-center items-center space-x-2">
                      <form action="{{ route('guru.izin.validasi', $z->id) }}" method="POST" class="inline-block">
                        @csrf
                        <input type="hidden" name="validasi" value="Diterima">
                        <button type="submit" class="btn-action bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 shadow-md hover:shadow-lg">
                          <i class="fas fa-check mr-1"></i>
                          Terima
                        </button>
                      </form>
                      <form action="{{ route('guru.izin.validasi', $z->id) }}" method="POST" class="inline-block">
                        @csrf
                        <input type="hidden" name="validasi" value="Ditolak">
                        <button type="submit" class="btn-action bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 shadow-md hover:shadow-lg">
                          <i class="fas fa-times mr-1"></i>
                          Tolak
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!-- Tabel Dispensasi -->
      <div class="glass-effect rounded-3xl overflow-hidden card-hover animate-slide-up">
        <div class="bg-gradient-to-r from-purple-600 to-pink-600 text-white text-xl font-bold text-center py-4">
          <i class="fas fa-clock mr-3"></i>
          Tabel Permohonan Dispensasi
        </div>
        <div class="modern-scrollbar overflow-y-auto max-h-[70vh] bg-white/95 backdrop-blur-sm">
          <table class="w-full">
            <thead class="sticky top-0 bg-gradient-to-r from-gray-700 to-gray-600 text-white">
              <tr>
                <th class="px-6 py-4 text-center font-semibold">No</th>
                <th class="px-6 py-4 text-center font-semibold">NIS</th>
                <th class="px-6 py-4 text-center font-semibold">Nama</th>
                <th class="px-6 py-4 text-center font-semibold">Kelas</th>
                <th class="px-6 py-4 text-center font-semibold">Jurusan</th>
                <th class="px-6 py-4 text-center font-semibold">Wali Kelas</th>
                <th class="px-6 py-4 text-center font-semibold">Alasan</th>
                <th class="px-6 py-4 text-center font-semibold">Bukti</th>
                <th class="px-6 py-4 text-center font-semibold">Tanggal</th>
                <th class="px-6 py-4 text-center font-semibold">Status</th>
                <th class="px-6 py-4 text-center font-semibold">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-gray-800">
              @foreach ($dispen as $d)
                <tr class="table-row border-b border-gray-200/50">
                  <td class="px-6 py-4 text-center font-medium">{{ $loop->iteration }}</td>
                  <td class="px-6 py-4 text-center">{{ $d->nis }}</td>
                  <td class="px-6 py-4 text-center font-medium text-gray-900">{{ $d->nama }}</td>
                  <td class="px-6 py-4 text-center">{{ $d->kelas }}</td>
                  <td class="px-6 py-4 text-center">{{ $d->jurusan }}</td>
                  <td class="px-6 py-4 text-center">{{ $d->wali_kelas }}</td>
                  <td class="px-6 py-4 text-center max-w-xs">
                    <div class="truncate" title="{{ $d->alasan }}">{{ $d->alasan }}</div>
                  </td>
                  <td class="px-6 py-4 text-center">
                    <a href="{{ asset('storage/' . $d->foto) }}" target="_blank" class="block">
                      <img src="{{ asset('storage/' . $d->foto) }}" class="w-16 h-16 object-cover rounded-lg mx-auto shadow-md hover:shadow-lg transition-shadow cursor-pointer">
                    </a>
                  </td>
                  <td class="px-6 py-4 text-center">
                    <div class="font-medium">{{ \Carbon\Carbon::parse($d->created_at)->format('d/m/Y') }}</div>
                    <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($d->created_at)->format('H:i') }}</div>
                  </td>
                  <td class="px-6 py-4 text-center">
                    @php
                      $statusConfig = match($d->validasi) {
                        'Diterima' => ['class' => 'bg-green-100 text-green-800 border-green-300', 'icon' => 'fa-check-circle'],
                        'Ditolak' => ['class' => 'bg-red-100 text-red-800 border-red-300', 'icon' => 'fa-times-circle'],
                        default => ['class' => 'bg-orange-100 text-orange-800 border-orange-300', 'icon' => 'fa-clock'],
                      };
                    @endphp
                    <span class="status-badge inline-flex items-center px-3 py-1 rounded-full text-sm font-medium border {{ $statusConfig['class'] }}">
                      <i class="fas {{ $statusConfig['icon'] }} mr-2"></i>
                      {{ $d->validasi }}
                    </span>
                  </td>
                  <td class="px-6 py-4 text-center">
                    <div class="flex justify-center items-center space-x-2">
                      <form action="{{ route('guru.dispen.validasi', $d->id) }}" method="POST" class="inline-block">
                        @csrf
                        <input type="hidden" name="validasi" value="Diterima">
                        <button type="submit" class="btn-action bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 shadow-md hover:shadow-lg">
                          <i class="fas fa-check mr-1"></i>
                          Terima
                        </button>
                      </form>
                      <form action="{{ route('guru.dispen.validasi', $d->id) }}" method="POST" class="inline-block">
                        @csrf
                        <input type="hidden" name="validasi" value="Ditolak">
                        <button type="submit" class="btn-action bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 shadow-md hover:shadow-lg">
                          <i class="fas fa-times mr-1"></i>
                          Tolak
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Add smooth scrolling and interactive effects
    document.addEventListener('DOMContentLoaded', function() {
      // Animate elements on scroll
      const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      };
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
          }
        });
      }, observerOptions);
      
      // Observe all animated elements
      document.querySelectorAll('.animate-slide-up').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(40px)';
        el.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        observer.observe(el);
      });
      
      // Add click ripple effect to buttons
      document.querySelectorAll('button').forEach(button => {
        button.addEventListener('click', function(e) {
          const ripple = document.createElement('span');
          const rect = this.getBoundingClientRect();
          const size = Math.max(rect.width, rect.height);
          const x = e.clientX - rect.left - size / 2;
          const y = e.clientY - rect.top - size / 2;
          
          ripple.style.width = ripple.style.height = size + 'px';
          ripple.style.left = x + 'px';
          ripple.style.top = y + 'px';
          ripple.classList.add('ripple');
          
          this.appendChild(ripple);
          
          setTimeout(() => {
            ripple.remove();
          }, 600);
        });
      });
    });
  </script>
  
  <style>
    .ripple {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.3);
      pointer-events: none;
      animation: ripple-animation 0.6s ease-out;
    }
    
    @keyframes ripple-animation {
      to {
        transform: scale(2);
        opacity: 0;
      }
    }
  </style>
</body>
</html>