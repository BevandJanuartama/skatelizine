<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagram Data - SKATEL</title>
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
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        .animate-slide-up {
            animation: slideUp 1s ease-out forwards;
        }
        
        .animate-scale-in {
            animation: scaleIn 0.6s ease-out forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-10px) rotate(1deg); }
            66% { transform: translateY(-5px) rotate(-1deg); }
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
            0%, 100% { opacity: 0.5; transform: scale(1) rotate(0deg); }
            50% { opacity: 1; transform: scale(1.1) rotate(180deg); }
        }
        
        .chart-container {
            position: relative;
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 24px;
            padding: 2rem;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }
        
        .chart-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #f5576c);
            border-radius: 24px 24px 0 0;
        }
        
        .back-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s;
        }
        
        .back-button:hover::before {
            left: 100%;
        }
        
        .back-button:hover {
            transform: translateX(-5px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }
        
        .data-insight {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        
        .chart-legend {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1.5rem;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .legend-item:hover {
            background: rgba(255, 255, 255, 1);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .legend-color {
            width: 16px;
            height: 16px;
            border-radius: 4px;
        }
        
        .interactive-hint {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            animation: glow 2s ease-in-out infinite alternate;
        }
        
        @keyframes glow {
            from { box-shadow: 0 0 20px rgba(132, 250, 176, 0.3); }
            to { box-shadow: 0 0 30px rgba(143, 211, 244, 0.5); }
        }
    </style>
</head>
<body class="min-h-screen gradient-bg">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-24 h-24 bg-white/5 rounded-full floating-element"></div>
        <div class="absolute top-1/3 right-16 w-32 h-32 bg-white/3 rounded-full floating-element" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-32 left-1/4 w-20 h-20 bg-white/8 rounded-full floating-element" style="animation-delay: -4s;"></div>
        <div class="absolute bottom-1/4 right-8 w-28 h-28 bg-white/4 rounded-full floating-element" style="animation-delay: -1s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-16 h-16 bg-white/6 rounded-full floating-element" style="animation-delay: -3s;"></div>
    </div>

    <div class="relative z-10 min-h-screen">
        <div class="container mx-auto px-6 py-8">
            <!-- Header Section -->
            <div class="mb-8 animate-fade-in">
                <!-- Back Button -->
                <div class="mb-6">
                    <a href="{{ url('/guru/data') }}" class="back-button inline-flex items-center px-6 py-3 rounded-full text-white font-medium text-lg shadow-lg">
                        <i class="fas fa-arrow-left mr-3"></i>
                        Kembali ke Dashboard
                    </a>
                </div>

                <!-- Title Section -->
                <div class="text-center mb-8">
                    <h1 class="text-5xl font-black text-white mb-4 tracking-tight">
                        <i class="fas fa-chart-bar mr-4 text-4xl"></i>
                        Analisis Data
                    </h1>
                    <p class="text-xl text-white/80 font-medium">Visualisasi Permohonan Izin & Dispensasi per Tingkat</p>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 animate-slide-up">
                <div class="stats-card rounded-2xl p-6 text-white card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-white/80 text-sm font-medium mb-1">Total Izin</p>
                            <p class="text-3xl font-bold" id="totalIzin">{{ array_sum($izinData ?? [0,0,0]) }}</p>
                            <p class="text-white/60 text-xs mt-1">Semua tingkat</p>
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
                            <p class="text-3xl font-bold" id="totalDispen">{{ array_sum($dispenData ?? [0,0,0]) }}</p>
                            <p class="text-white/60 text-xs mt-1">Semua tingkat</p>
                        </div>
                        <div class="text-4xl text-white/60">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
                
                <div class="data-insight rounded-2xl p-6 text-white card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-white/80 text-sm font-medium mb-1">Total Permohonan</p>
                            <p class="text-3xl font-bold" id="totalAll">{{ array_sum($izinData ?? [0,0,0]) + array_sum($dispenData ?? [0,0,0]) }}</p>
                            <p class="text-white/60 text-xs mt-1">Gabungan semua</p>
                        </div>
                        <div class="text-4xl text-white/60">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Interactive Hint -->
            <div class="interactive-hint rounded-2xl p-4 mb-6 text-center animate-scale-in">
                <div class="flex items-center justify-center text-gray-800">
                    <i class="fas fa-hand-pointer mr-3 text-2xl"></i>
                    <span class="font-semibold text-lg">Klik pada batang diagram untuk melihat detail per kelas!</span>
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
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">
                        Distribusi Permohonan per Tingkat Kelas
                    </h2>
                    <p class="text-gray-600">Perbandingan jumlah izin dan dispensasi siswa</p>
                </div>
                
                <div class="relative">
                    <canvas id="mainChart" class="w-full"></canvas>
                </div>
                
                <!-- Chart Info -->
                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                    <div class="bg-blue-50 rounded-xl p-4">
                        <h3 class="font-semibold text-blue-800 mb-2">Kelas X</h3>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Izin: <strong id="izinX">{{ $izinData[0] ?? 0 }}</strong></span>
                            <span class="text-gray-600">Dispen: <strong id="dispenX">{{ $dispenData[0] ?? 0 }}</strong></span>
                        </div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-4">
                        <h3 class="font-semibold text-green-800 mb-2">Kelas XI</h3>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Izin: <strong id="izinXI">{{ $izinData[1] ?? 0 }}</strong></span>
                            <span class="text-gray-600">Dispen: <strong id="dispenXI">{{ $dispenData[1] ?? 0 }}</strong></span>
                        </div>
                    </div>
                    <div class="bg-purple-50 rounded-xl p-4">
                        <h3 class="font-semibold text-purple-800 mb-2">Kelas XII</h3>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Izin: <strong id="izinXII">{{ $izinData[2] ?? 0 }}</strong></span>
                            <span class="text-gray-600">Dispen: <strong id="dispenXII">{{ $dispenData[2] ?? 0 }}</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data dari Laravel (tetap dinamis)
        const mainLabels = ["Kelas X", "Kelas XI", "Kelas XII"];
        const mainDataIzin = @json($izinData);
        const mainDataDispen = @json($dispenData);

        // Chart configuration
        const ctx = document.getElementById('mainChart').getContext('2d');
        
        // Gradient backgrounds for bars
        const gradientIzin = ctx.createLinearGradient(0, 0, 0, 400);
        gradientIzin.addColorStop(0, 'rgba(54, 162, 235, 0.8)');
        gradientIzin.addColorStop(1, 'rgba(75, 192, 192, 0.8)');
        
        const gradientDispen = ctx.createLinearGradient(0, 0, 0, 400);
        gradientDispen.addColorStop(0, 'rgba(255, 99, 132, 0.8)');
        gradientDispen.addColorStop(1, 'rgba(255, 159, 64, 0.8)');

        const mainChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: mainLabels,
                datasets: [
                    {
                        label: 'Permohonan Izin',
                        data: mainDataIzin,
                        backgroundColor: gradientIzin,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        borderRadius: 8,
                        borderSkipped: false,
                        hoverBackgroundColor: 'rgba(54, 162, 235, 0.9)',
                        hoverBorderColor: 'rgba(54, 162, 235, 1)',
                        hoverBorderWidth: 3
                    },
                    {
                        label: 'Permohonan Dispensasi',
                        data: mainDataDispen,
                        backgroundColor: gradientDispen,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        borderRadius: 8,
                        borderSkipped: false,
                        hoverBackgroundColor: 'rgba(255, 99, 132, 0.9)',
                        hoverBorderColor: 'rgba(255, 99, 132, 1)',
                        hoverBorderWidth: 3
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        top: 20,
                        bottom: 20,
                        left: 20,
                        right: 20
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)',
                            lineWidth: 1
                        },
                        ticks: {
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            color: '#374151'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 14,
                                weight: '600'
                            },
                            color: '#1f2937'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // We use custom legend
                    },
                    tooltip: {
                        backgroundColor: 'rgba(17, 24, 39, 0.95)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: 'rgba(255, 255, 255, 0.2)',
                        borderWidth: 1,
                        cornerRadius: 12,
                        displayColors: true,
                        titleFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 13
                        },
                        callbacks: {
                            title: function(context) {
                                return context[0].label;
                            },
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y + ' permohonan';
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
                        const kelas = ['X', 'XI', 'XII'][index];
                        
                        // Add loading effect
                        const button = document.createElement('div');
                        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memuat detail...';
                        button.className = 'fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white px-6 py-3 rounded-lg shadow-lg z-50';
                        document.body.appendChild(button);
                        
                        setTimeout(() => {
                            window.location.href = `/guru/diagram/${kelas}`;
                        }, 500);
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart'
                }
            }
        });

        // Set chart height
        ctx.canvas.style.height = '400px';

        // Add smooth animations on load
        document.addEventListener('DOMContentLoaded', function() {
            // Animate stats cards with stagger effect
            const cards = document.querySelectorAll('.stats-card, .data-insight');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'all 0.8s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });

            // Add hover effect to chart bars
            ctx.canvas.addEventListener('mousemove', function(e) {
                const points = mainChart.getElementsAtEventForMode(e, 'nearest', { intersect: true }, true);
                if (points.length) {
                    ctx.canvas.style.cursor = 'pointer';
                } else {
                    ctx.canvas.style.cursor = 'default';
                }
            });
        });
    </script>
</body>
</html>