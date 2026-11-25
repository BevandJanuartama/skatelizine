<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Profile</title>
  <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <!-- Tambahkan z-index rendah pada gambar latar belakang -->
  <img src="/img/back2.jpg" class="w-full h-screen object-cover absolute z-0">

  <div class="flex items-center justify-center min-h-screen relative">
    <div class="text-right mt-4"></div>
    
    <!-- Tambahkan z-index tinggi pada tombol -->
    <a href="/siswa/beranda" class="absolute text-xl text-white hover:underline top-2 left-5 z-10">Beranda</a>

    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
      @csrf
      <button type="submit" class="absolute text-xl text-white hover:underline top-2 right-3 z-10">Log Out</button>
    </form>

    <div class="w-full p-8 relative max-h-screen overflow-y-auto">
      <div class="flex justify-center text-center w-full mb-4">
        <img src="/img/cover.png" alt="Header Image" class="rounded-md w-2/3">
      </div>

      <div class="flex justify-center">
        <form action="{{ route('siswa.update.profile') }}" method="POST" class="grid w-1/2 grid-cols-2 gap-4 max-h-[80vh] overflow-y-auto">
          @csrf
          @method('PUT')

          <!-- Nama -->
          <div class="col-span-2 sm:col-span-1">
            <label class="block text-sm font-medium text-white" for="name">Nama</label>
            <input id="name" type="text" name="nama" value="{{ $profile->nama ?? '' }}" class=" block w-full p-3 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" readonly>
          </div>

          <!-- Jenis Kelamin -->
          <div class="col-span-2 sm:col-span-1">
            <label class="block text-sm font-medium text-white" for="gender">Jenis Kelamin</label>
            <input id="gender" type="text" name="jk" value="{{ $profile->jk ?? '' }}" class=" block w-full p-3 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" readonly>
          </div>

          <!-- Kelas -->
          <div class="col-span-2 sm:col-span-1">
            <label class="block text-sm font-medium text-white" for="class">Kelas</label>
            <input id="class" type="text" name="kelas" value="{{ $profile->kelas ?? '' }}" class="block w-full p-3 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" readonly>
          </div>

          <!-- Alamat -->
          <div class="col-span-2 sm:col-span-1">
            <label class="block text-sm font-medium text-white" for="alamat">Alamat</label>
            <input id="alamat" type="text" name="alamat" value="{{ $profile->alamat ?? '' }}" class="block w-full p-3 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" required>
          </div>

          <!-- Jurusan -->
          <div class="col-span-2 sm:col-span-1">
            <label class="block text-sm font-medium text-white" for="major">Jurusan</label>
            <input id="major" type="text" name="jurusan" value="{{ $profile->jurusan ?? '' }}" class="block w-full p-3 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" readonly>
          </div>

          <!-- NIS -->
          <div class="col-span-2 sm:col-span-1">
            <label class="block text-sm font-medium text-white" for="nis">NIS</label>
            <input id="nis" type="text" name="nis" value="{{ $profile->no_induk ?? '' }}" class="block w-full p-3 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" readonly>
          </div>

          <!-- Password Baru -->
          <div class="col-span-2 sm:col-span-1">
            <label class="block text-sm font-medium text-white" for="password">Password Baru</label>
            <input id="password" type="password" name="password" class="block w-full p-3 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
          </div>

          <!-- Konfirmasi Password Baru -->
          <div class="col-span-2 sm:col-span-1">
            <label class="block text-sm font-medium text-white" for="confirm-password">Konfirmasi Password Baru</label>
            <input id="confirm-password" type="password" name="password_confirmation" class="block w-full p-3 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
          </div>

          <div class="col-span-2 flex justify-center">
    <button type="submit" class="w-1/4 py-2 rounded-lg bg-red-600 hover:bg-red-1000 text-white font-semibold text-lg">
        UPDATE
    </button>
</div>

        </form>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')
</body>

</html>
