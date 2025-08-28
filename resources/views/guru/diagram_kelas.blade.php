<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagram Kelas {{ $kelas }} - SKATEL</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(60px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.8) translateY(30px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }
        
        .floating-element {
            animation: float 8s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-15px) rotate(1deg); }
            50% { transform: translateY(-5px) rotate(-0.5deg); }
            75% { transform: translateY(-10px) rotate(0.5deg); }
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
            animation: pulse 5s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 0.3; transform: scale(1) rotate(0deg); }
            50% { opacity: 0.8; transform: scale(1.2) rotate(180deg); }
        }
        
        .chart-container {
            position: relative;
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }
        
        .chart-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #f5576c, #84fab0);
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
        
        .class-badge {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
            animation: shimmer 3s infinite;
        }
        
        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        .chart-legend {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.5rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .legend-item:hover {
            background: rgba(255, 255, 255, 1);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            border-color: rgba(102, 126, 234, 0.3);
        }
        
        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }
        
        .interactive-hint {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            animation: glow 3s ease-in-out infinite alternate;
        }
        
        @keyframes glow {
            from { 
                box-shadow: 0 0 20px rgba(132, 250, 176, 0.4); 
                transform: scale(1);
            }
            to { 
                box-shadow: 0 0 35px rgba(143, 211, 244, 0.6); 
                transform: scale(1.02);
            }
        }
        
        .class-stats {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .detail-card {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            transition: all 0.3s ease;
        }
        
        .detail-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(132, 250, 176, 0.3);
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
    </style>
</head>
<body class="min-h-screen gradient-bg">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-16 left-8 w-32 h-32 bg-white/4 rounded-full floating-element"></div>
        <div class="absolute top-1/4 right-12 w-24 h-24 bg-white/6 rounded-full floating-element" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-24 left-1/3 w-28 h-28 bg-white/5 rounded-full floating-element" style="animation-delay: -4s;"></div>
        <div class="absolute bottom-1/3 right-16 w-20 h-20 bg-white/7 rounded-full floating-element" style="animation-delay: -1s;"></div>
        <div class="absolute top-1/2 left-1/6 w-16 h-16 bg-white/8 rounded-full floating-element" style="animation-delay: -3s;"></div>
        <div class="absolute top-3/4 right-1/4 w-36 h-36 bg-white/3 rounded-full floating-element" style="animation-delay: -5s;"></div>
    </div>

    <div class="relative z-10 min-h-screen">
        <div class="container mx-auto px-6 py-8">
            <!-- Header Section -->
            <div class="mb-8 animate-fade-in">
                <!-- Back Button -->
                <div class="mb-6">
                    <a href="{{ url('/guru/diagram') }}" class="back-button inline-flex items-center px-6 py-3 rounded-full text-white font-medium text-lg shadow-lg">
                        <i class="fas fa-arrow-left mr-3"></i>
                        Kembali ke Overview
                    </a>
                </div>

                <!-- Breadcrumb -->
                <div class="breadcrumb">
                    <i class="fas fa-home"></i>
                    <span class="breadcrumb-item">Dashboard</span>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <span class="breadcrumb-item">Diagram</span>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <span class="text-white font-semibold">Kelas {{ $kelas }}</span>
                </div>

                <!-- Title Section -->
                <div class="text-center mb-8">
                    <div class="class-badge inline-flex items-center px-8 py-4 rounded-full text-white font-bold text-2xl mb-4 shadow-lg">
                        <i class="fas fa-graduation-cap mr-3"></i>
                        KELAS {{ $kelas }}
                    </div>
                    <h1 class="text-4xl font-black text-white mb-2 tracking-tight">
                        Detail Analisis per Sub-Kelas
                    </h1>
                    <p class="text-xl text-white/80 font-medium">Distribusi permohonan izin dan dispensasi</p>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8 animate-slide-up">
                <div class="stats-card rounded-2xl p-6 text-white card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-white/80 text-sm font-medium mb-1">Total Izin</p>
                            <p class="text-3xl font-bold" id="totalIzin">{{ array_sum($data['izin'] ?? []) }}</p>
                            <p class="text-white/60 text-xs mt-1">Kelas {{ $kelas }}</p>
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
                            <p class="text-3xl font-bold" id="totalDispen">{{ array_sum($data['dispen'] ?? []) }}</p>
                            <p class="text-white/60 text-xs mt-1">Kelas {{ $kelas }}</p>
                        </div>
                        <div class="text-4xl text-white/60">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
                
                <div class="class-stats rounded-2xl p-6 text-white card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-white/80 text-sm font-medium mb-1">Sub-Kelas</p>
                            <p class="text-3xl font-bold" id="totalClasses">{{ count($subKelas ?? []) }}</p>
                            <p class="text-white/60 text-xs mt-1">Jumlah kelas</p>
                        </div>
                        <div class="text-4xl text-white/60">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                
                <div class="detail-card rounded-2xl p-6 text-gray-800 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-700 text-sm font-medium mb-1">Total Permohonan</p>
                            <p class="text-3xl font-bold" id="totalAll">{{ array_sum($data['izin'] ?? []) + array_sum($data['dispen'] ?? []) }}</p>
                            <p class="text-gray-600 text-xs mt-1">Gabungan semua</p>
                        </div>
                        <div class="text-4xl text-gray-600">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Interactive Hint -->
            <div class="interactive-hint rounded-2xl p-5 mb-8 text-center animate-scale-in">
                <div class="flex items-center justify-center text-gray-800">
                    <i class="fas fa-mouse-pointer mr-3 text-2xl"></i>
                    <span class="font-semibold text-lg">Klik pada batang diagram untuk melihat detail sub-kelas!</span>
                </div>
            </div>

            <!-- Main Chart -->
            <div class="chart-container animate-scale-in card-hover">
                <!-- Custom Legend -->
                <div class="chart-legend">
                    <div class="legend-item">
                        <div class="legend-color" style="background: linear-gradient(135deg, #36a2eb, #4bc0c0);"></div>
                        <span>Permohonan Izin</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background: linear-gradient(135deg, #ff6384, #ff9f40);"></div>
                        <span>Permohonan Dispensasi</span>
                    </div>
                </div>

                <!-- Chart Title -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-3">
                        <i class="fas fa-chart-column mr-3 text-blue-600"></i>
                        Distribusi per Sub-Kelas {{ $kelas }}
                    </h2>
                    <p class="text-gray-600 text-lg">Analisis mendalam permohonan siswa</p>
                </div>
                
                <div class="relative">
                    <canvas id="kelasChart" class="w-full"></canvas>
                </div>
                
                <!-- Detailed Stats Grid -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($subKelas as $index => $subKelas_item)
                    <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl p-5 border border-blue-100 hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-bold text-lg text-gray-800">{{ $subKelas_item }}</h3>
                            <div class="w-3 h-3 rounded-full" style="background: linear-gradient(135deg, #36a2eb, #ff6384);"></div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 text-sm font-medium">
                                    <i class="fas fa-calendar-times mr-2 text-blue-500"></i>Izin:
                                </span>
                                <span class="font-bold text-blue-600">{{ $data['izin'][$index] ?? 0 }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 text-sm font-medium">
                                    <i class="fas fa-clock mr-2 text-red-500"></i>Dispen:
                                </span>
                                <span class="font-bold text-red-600">{{ $data['dispen'][$index] ?? 0 }}</span>
                            </div>
                            <div class="border-t pt-2 mt-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-700 font-medium">Total:</span>
                                    <span class="font-bold text-lg text-gray-800">{{ ($data['izin'][$index] ?? 0) + ($data['dispen'][$index] ?? 0) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data dari Laravel (tetap dinamis)
        const subKelas = @json($subKelas);
        const dataIzin = @json($data['izin']);
        const dataDispen = @json($data['dispen']);

        // Chart configuration
        const ctx = document.getElementById('kelasChart').getContext('2d');
        
        // Enhanced gradient backgrounds for bars
        const gradientIzin = ctx.createLinearGradient(0, 0, 0, 400);
        gradientIzin.addColorStop(0, 'rgba(54, 162, 235, 0.9)');
        gradientIzin.addColorStop(0.5, 'rgba(75, 192, 192, 0.8)');
        gradientIzin.addColorStop(1, 'rgba(54, 162, 235, 0.7)');
        
        const gradientDispen = ctx.createLinearGradient(0, 0, 0, 400);
        gradientDispen.addColorStop(0, 'rgba(255, 99, 132, 0.9)');
        gradientDispen.addColorStop(0.5, 'rgba(255, 159, 64, 0.8)');
        gradientDispen.addColorStop(1, 'rgba(255, 99, 132, 0.7)');

        const kelasChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: subKelas,
                datasets: [
                    {
                        label: 'Permohonan Izin',
                        data: dataIzin,
                        backgroundColor: gradientIzin,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        borderRadius: 12,
                        borderSkipped: false,
                        hoverBackgroundColor: 'rgba(54, 162, 235, 1)',
                        hoverBorderColor: 'rgba(54, 162, 235, 1)',
                        hoverBorderWidth: 3,
                        barThickness: 50
                    },
                    {
                        label: 'Permohonan Dispensasi',
                        data: dataDispen,
                        backgroundColor: gradientDispen,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        borderRadius: 12,
                        borderSkipped: false,
                        hoverBackgroundColor: 'rgba(255, 99, 132, 1)',
                        hoverBorderColor: 'rgba(255, 99, 132, 1)',
                        hoverBorderWidth: 3,
                        barThickness: 50
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        top: 30,
                        bottom: 30,
                        left: 30,
                        right: 30
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.08)',
                            lineWidth: 1
                        },
                        ticks: {
                            font: {
                                size: 13,
                                weight: '500'
                            },
                            color: '#4b5563',
                            stepSize: 1
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 15,
                                weight: '700'
                            },
                            color: '#1f2937'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Using custom legend
                    },
                    tooltip: {
                        backgroundColor: 'rgba(17, 24, 39, 0.95)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: 'rgba(255, 255, 255, 0.2)',
                        borderWidth: 1,
                        cornerRadius: 16,
                        displayColors: true,
                        titleFont: {
                            size: 16,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 14
                        },
                        callbacks: {
                            title: function(context) {
                                return 'Kelas ' + context[0].label;
                            },
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y + ' permohonan';
                            },
                            afterBody: function(context) {
                                const index = context[0].dataIndex;
                                const total = dataIzin[index] + dataDispen[index];
                                return 'Total: ' + total + ' permohonan';
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                onClick: (e, elements) => {
                    if (elements.length > 0) {
                        const index = elements[0].index;
                        const subkelas = subKelas[index];
                        
                        // Enhanced loading effect
                        const loadingOverlay = document.createElement('div');
                        loadingOverlay.innerHTML = `
                            <div class="bg-white/90 backdrop-blur-sm rounded-2xl px-8 py-6 shadow-2xl">
                                <div class="flex items-center space-x-4">
                                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                                    <span class="text-lg font-semibold text-gray-800">Memuat detail ${subkelas}...</span>
                                </div>
                            </div>
                        `;
                        loadingOverlay.className = 'fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black/20 z-50';
                        document.body.appendChild(loadingOverlay);
                        
                        setTimeout(() => {
                            window.location.href = `/guru/diagram/{{ $kelas }}/${subkelas}`;
                        }, 800);
                    }
                },
                animation: {
                    duration: 2500,
                    easing: 'easeInOutQuart'
                }
            }
        });

        // Set enhanced chart height
        ctx.canvas.style.height = '450px';

        // Enhanced animations and interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Stagger animation for stats cards
            const cards = document.querySelectorAll('.stats-card, .class-stats, .detail-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(40px) scale(0.95)';
                card.style.transition = 'all 1s cubic-bezier(0.4, 0, 0.2, 1)';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0) scale(1)';
                }, index * 150);
            });

            // Enhanced chart interactions
            ctx.canvas.addEventListener('mousemove', function(e) {
                const points = kelasChart.getElementsAtEventForMode(e, 'nearest', { intersect: true }, true);
                if (points.length) {
                    ctx.canvas.style.cursor = 'pointer';
                    ctx.canvas.style.transform = 'scale(1.01)';
                } else {
                    ctx.canvas.style.cursor = 'default';
                    ctx.canvas.style.transform = 'scale(1)';
                }
            });

            // Animate detail cards
            const detailCards = document.querySelectorAll('.bg-gradient-to-br');
            detailCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'all 0.8s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 1000 + (index * 100));
            });
        });
    </script>
</body>
</html>