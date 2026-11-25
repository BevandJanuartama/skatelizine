<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Zetta&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Background dengan Overlay -->
        <img src="/img/back2.jpg" alt="Background Image" class="w-full h-screen object-cover absolute ">
    <!--header -->
    <h1 class=" text-white text-7xl font-bold text-center font-serif -top-0 flex-grow  group-hover:w-full pb-10 relative ">D I S P E N S A S I</h1>
    <button><a href="/siswa/beranda" class="absolute text-[28px]  text-white hover:underline top-0 left-2 ">Beranda</a></button>
    <div class=" h-1 bg-white absolute pt-1 py-1 top-20 w-full">
        
    </div>
    
    <!-- Container -->
    <div class="flex items-center justify-center h-full  z-10 relative  ">
        <div class="bg-white bg-opacity-80 rounded-lg  w-full max-w-5xl p-10 sm:p-12  ">
        
        <!-- Header -->
        <header class="flex items-center justify-between mb-8">
            
        </header>

        <!-- Content -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <!-- Logo Section -->
            <div class="flex items-center justify-center mr-5">
                <!-- Gambar Logo, ganti URL placeholder dengan URL atau path gambar Anda -->
                <!-- Form Section -->
                <form action="{{ route('siswa.store.dispen') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <input type="text" name="nama" placeholder="Nama Lengkap" value="{{ $siswa->nama ?? '' }}" class="font-bold w-full p-3 rounded-md text-black border-2 bg-opacity-15 border-gray-400 focus:outline-none focus:ring-2 focus:ring-red-400" readonly>
                    <input type="text" name="kelas" placeholder="Kelas" value="{{ $siswa->kelas ?? '' }}" class="font-bold w-full p-3 rounded-md text-black border-2 bg-opacity-15 border-gray-400 focus:outline-none focus:ring-2 focus:ring-red-400" readonly>
                    <input type="text" name="jurusan" placeholder="Jurusan" value="{{ $siswa->jurusan ?? '' }}" class="font-bold w-full p-3 rounded-md text-black border-2 bg-opacity-15 border-gray-400 focus:outline-none focus:ring-2 focus:ring-red-400" readonly>
                    <textarea type="text" name="alasan" placeholder="Masukkan Alasan"  class="font-bold w-full p-3 rounded-md text-black border-2 bg-opacity-15 border-gray-400 focus:outline-none focus:ring-2 focus:ring-red-400"></textarea>
              
                <div class="absolute left-1/2 -top-4 h-full border-l-2 border-white-300"></div>
            </div>


                <div class="space-y-4">
                    <div class="invisible">@csrf</div>


                <input type="text" name="nis" placeholder="Nis" value="{{ $siswa->no_induk ?? '' }}" class="font-bold w-full p-3 rounded-md text-black border-2 bg-opacity-15 border-gray-400 focus:outline-none focus:ring-2 focus:ring-red-400" readonly>
                <input type="text" name="wali_kelas" placeholder="Wali Kelas" value="{{ $siswa->wali_kelas ?? '' }}"class="font-bold w-full p-3 rounded-md text-black border-2 bg-opacity-15 border-gray-400 focus:outline-none focus:ring-2 focus:ring-red-400" readonly>
               
                <!-- Upload & Submit Section -->
        <div class="flex flex-col space-x-4">
                    
         <!-- Upload & Submit Section -->
            <div class="flex flex-col space-y-4">
            <!-- Tombol Upload Evidence -->
            <div class="flex items-center justify-between">
                <button type="button" class="flex items-center justify-center w-1/4 bg-white p-2 shadow-md hover:shadow-lg" onclick="document.getElementById('fileInput').click()">
                    <div class="grid place-items-center" id="fileButtonContent">
                        <img src="/img/eviden2.jpg" alt="Input Evidence" class="w-17 h-11 mb-2" id="filePreviewImage">
                        <span class="text-black text-xs" id="fileText">Input Evidence</span>
                    </div>
                </button>

                <input type="file" name="foto" id="fileInput" class="hidden" required onchange="updateFilePreview()">
                                
                <!-- Tombol Submit -->
                <div>
                    <button type="submit" class="w-32 bg-red-600 text-white rounded-md p-2 hover:bg-red-800 transition-colors">Submit</button>
                </div>
            </div>
            </div>
        </form>
        </div>

    </div>

    <script>
                    function updateFilePreview() {
                        const fileInput = document.getElementById('fileInput');
                        const fileButtonContent = document.getElementById('fileButtonContent');
                        const filePreviewImage = document.getElementById('filePreviewImage');
                        const fileText = document.getElementById('fileText');

                        // Get the selected file
                        const file = fileInput.files[0];
                        if (file) {
                            // Create a URL for the selected file
                            const objectURL = URL.createObjectURL(file);
                            
                            // Replace the image in the button with the selected image
                            filePreviewImage.src = objectURL;
                            filePreviewImage.classList.remove('hidden');
                            fileText.classList.add('hidden'); // Hide the "Input Evidence" text
                        }
                    }
                </script>
@include('sweetalert::alert')
</body>
</html>
