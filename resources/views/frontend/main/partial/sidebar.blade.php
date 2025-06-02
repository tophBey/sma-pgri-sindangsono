<nav class="fixed z-10 top-0 left-0 w-screen sm:w-full bg-white border-b-2 max-h-20 border-black flex items-center py-3 px-4">
  <div class="flex items-center gap-4">
    <img class="max-h-16" src="{{ asset('asset/logo.png') }}" alt="Logo">
    <p class="text-[18px] font-semibold">SMA PGRI Sindangsono</p>
  </div>

  <!-- Hamburger Button (Mobile) -->
  <button id="hamburgerButton" class="ml-auto block lg:hidden">
    <i class="fa-solid fa-bars text-xl"></i>
  </button>

  <!-- Menu lg-->
  <div  class="sm:hidden ml-6 lg:flex flex-col lg:flex-row lg:items-center lg:gap-6 w-full lg:w-auto mt-4 lg:mt-0">
    <!-- Links -->
    <div class="flex flex-col lg:flex-row gap-4 lg:gap-6">
      <a href="{{ route('front.index') }}" class="{{ request()->is('/') ? 'text-[#0c720f] font-bold' : 'font-normal' }} font-roboto text-[16px]">Beranda</a>
      <a href="{{ route('front.activity') }}" class="{{ request()->is('kegiatan') ? 'text-[#0c720f] font-bold' : 'font-normal' }} font-roboto text-[16px]">Kegiatan</a>
      <a href="{{ route('ppdb.register') }}" class="{{ request()->is('ppdb') ? 'text-[#0c720f] font-bold' : 'font-normal' }} font-roboto text-[16px]">PPDB</a>
      <a href="{{ route('front.teacher') }}" class="{{ request()->is('daftar-pengajar') ? 'text-[#0c720f] font-bold' : 'font-normal' }} font-roboto text-[16px]">SDA</a>
      <a href="{{ route('front.contact') }}" class="{{ request()->is('hubungi-kami') ? 'text-[#0c720f] font-bold' : 'font-normal' }} font-roboto text-[16px]">Hubungi Kami</a>
    </div>

    <div class="relative  my-auto mt-4 lg:mt-0">
      <button id="dropdownButton" class="text-black bg-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 flex items-center">
        Informasi
        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
      <div id="dropdownMenu" class="absolute right-0 mt-2 hidden w-48 bg-black rounded-lg shadow-md">
        <a href="{{ route('front.news') }}" class="block px-4 py-2 text-white hover:text-black hover:bg-gray-100">Berita</a>
        <a href="{{ route('front.announcement') }}" class="block px-4 py-2 text-white hover:text-black hover:bg-gray-100">Pengumuman</a>
        <a href="{{ route('front.prestasion') }}" class="block px-4 py-2 text-white hover:text-black hover:bg-gray-100">Prestasi</a>
        <a href="{{ route('front.extrakulikuler') }}" class="block px-4 py-2 text-white hover:text-black hover:bg-gray-100">Ekstrakulikuler</a>
      </div>
    </div>
  </div>

  <!-- Authentication -->
  @auth
  <div class="relative ml-auto hidden lg:block">
    <button id="dropdownButton2" class="text-black bg-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 flex items-center">
      <p><i class="fa-solid fa-circle-user"></i> {{ auth()->user()->name }}</p>
      <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
      </svg>
    </button>
    <div id="dropdownMenu2" class="absolute right-0 mt-2 hidden w-48 bg-black rounded-lg shadow-md">
      <a href="{{ route('dashboard.index') }}" class="block px-4 py-2 text-white hover:text-black hover:bg-gray-100">Dashboard</a>
    </div>
  </div>
  @else
  <div class="ml-auto hidden lg:block">
    <a href="{{ route('login') }}" class="text-[16px] text-xl text-white px-3 py-2 bg-[#0c720f] rounded-xl font-semibold">Sign In</a>
  </div>
  @endauth
</nav>




@include('frontend.main.partial.sidebarMobile')

