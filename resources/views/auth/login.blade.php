<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  
  <body>
    <div class="h-screen flex items-center justify-center bg-cover bg-center" 
         style="background-image: url('img/image2.png');">
    
    <div class="w-full max-w-5xl flex rounded-lg shadow-lg overflow-hidden">
        
    <!-- Left side with red overlay and logo -->
    <div class="hidden md:flex items-center justify-center bg-opacity-40 bg-white w-1/2 p-8">
      <img src="img/logo.png" alt="Logo" class="w-42">
    </div>

    <!-- Right side with login form -->
    <div class="w-full md:w-1/2 p-8 flex flex-col items-center space-y-6 bg-white">
      <h1 class="text-4xl font-bold text-black">SKATELIZINE</h1>
    <p class="text-lg text-gray-800">(Skatel Izin System)</p>

    <!-- Form Login -->
    <form action="{{ route('login.post') }}" method="POST" class="w-full space-y-4">
    @csrf

    <!-- NIS/NIP Input -->
    <div class="w-full flex items-center border rounded-lg px-4 py-2 shadow-md">
      <input type="text" id="no_induk" name="no_induk" placeholder="Masukan NIS/NIP" required 
          class="w-full outline-none text-gray-700 placeholder-gray-500" />
      <img class="w-6 h-6" src="/img/pg.png" alt="User Icon">
    </div>

    <!-- Password Input -->
    <div class="w-full flex items-center border rounded-lg px-4 py-2 shadow-md">
      <input type="password" id="password" name="password" placeholder="Masukan Password" required 
          class="w-full outline-none text-gray-700 placeholder-gray-500" />
      <img class="w-8 h-7" src="/img/Lock.png" alt="Lock Icon">
    </div>

    <!-- Login Button -->
    <div class="flex justify-center">
      <button type="submit" class="w-1/3 py-2 rounded-lg bg-red-600 hover:bg-red-800 text-white font-semibold text-lg">Login</button>
    </div>

      </form>
    </div>
  </div>
</div>
    @include('sweetalert::alert');
  </body>
</html>
