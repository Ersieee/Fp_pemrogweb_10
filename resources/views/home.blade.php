<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Pace Rental</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 </head>
<body class="blog-page">
  <!-- Navbar -->
  <nav>
    <ul>
<li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
<li><a href="{{ url('/rental') }}" class="{{ Request::is('rental') ? 'active' : '' }}"><i class="fas fa-car"></i> Rental</a></li>
<li><a href="{{ url('/pelayanan') }}" class="{{ Request::is('pelayanan') ? 'active' : '' }}"><i class="fas fa-concierge-bell"></i> Pelayanan</a></li>
<li><a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}"><i class="fas fa-users"></i> Tentang Kami</a></li>
<li><a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}"><i class="fas fa-envelope"></i> Kontak</a></li>
<li><a href="{{ url('/blog') }}" class="{{ Request::is('blog') ? 'active' : '' }}"><i class="fas fa-blog"></i> Blog</a></li>
  <li><a href="/login" title="login"><i class="fas fa-user-circle navbar-login-icon"></i></a></li>
    </ul>
  </nav>
   <main>
   <!-- Carousel -->
  <header class="relative h-screen overflow-hidden">
    <div class="flex w-[300%] animate-slide">
      <img src="https://i.pinimg.com/736x/01/90/43/019043f5c73c4fa1b175dd69ea259698.jpg" alt="Mobil 1" class="w-screen h-screen object-cover">
      <img src="https://i.pinimg.com/736x/bc/97/68/bc9768aa0f5569eb5c327cba2f689016.jpg" alt="Mobil 2" class="w-screen h-screen object-cover">
      <img src="https://i.pinimg.com/736x/09/10/7f/09107fd44f156ff83d64c44a8c5ef847.jpg" alt="Mobil 3" class="w-screen h-screen object-cover">
     </div>
    <!-- Headline -->
    <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 text-white text-center p-8">
      <h1 class="text-4xl font-bold mb-4 animate-fadein">Sewa Mobil Terpercaya & Nyaman</h1>
      <p class="text-lg mb-6">Temukan mobil pilihan Anda dengan harga terbaik</p>
      <a href="{{ url('/rental') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">Lihat Mobil</a>
    </div>
  </header>
   </main>
   <style>
    @keyframes slide {
      0% { transform: translateX(0); }
      33% { transform: translateX(-100vw); }
      66% { transform: translateX(-200vw); }
      100% { transform: translateX(0); }
    }
    .animate-slide {
      animation: slide 12s infinite;
    }
     @keyframes fadein {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .animate-fadein {
      animation: fadein 2s ease forwards;
    }

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

   </style>
</body>
</html>
