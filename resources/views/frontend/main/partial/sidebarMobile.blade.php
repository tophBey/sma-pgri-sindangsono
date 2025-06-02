<!-- mobile menu -->
<div id="menu" class="fixed hidden lg:hidden min-w-full min-h-16 z-10 bg-[#989595bd] right-0 top-20">
    <div class="flex flex-col lg:flex-row justify-center items-center gap-4 lg:gap-6">
      <a href="{{ route('front.index') }}" class="{{ request()->is('/') ? 'text-[#0c720f] font-bold' : 'font-semibold text-white' }} tex-center font-roboto text-[16px]">Beranda</a>
      <a href="{{ route('front.activity') }}" class="{{ request()->is('kegiatan') ? 'text-[#0c720f] font-bold' : 'font-semibold text-white' }} font-roboto text-[16px]">Kegiatan</a>
      <a href="{{ route('ppdb.register') }}" class="{{ request()->is('ppdb') ? 'text-[#0c720f] font-bold' : 'font-semibold text-white' }} font-roboto text-[16px]">PPDB</a>
      <a href="{{ route('front.teacher') }}" class="{{ request()->is('daftar-pengajar') ? 'text-[#0c720f] font-bold' : 'font-semibold text-white' }} font-roboto text-[16px]">SDA</a>
      <a href="{{ route('front.contact') }}" class="{{ request()->is('hubungi-kami') ? 'text-[#0c720f] font-bold' : 'font-semibold text-white' }} font-roboto text-[16px]">Hubungi Kami</a>
    </div>

     <div class="relative mx-auto flex justify-center items-center mt-4 lg:mt-0">
      <button id="dropdownButtonMobile" class="text-black bg-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 flex items-center">
        Informasi
        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
      <div id="dropdownMenuMobile" class="hidden z-30 absolute  bottom-[-165px] mt-2  w-48 bg-black rounded-lg shadow-md">
        <a href="{{ route('front.news') }}" class="block px-4 py-2 text-white hover:text-black hover:bg-gray-100">Berita</a>
        <a href="{{ route('front.announcement') }}" class="block px-4 py-2 text-white hover:text-black hover:bg-gray-100">Pengumuman</a>
        <a href="{{ route('front.prestasion') }}" class="block px-4 py-2 text-white hover:text-black hover:bg-gray-100">Prestasi</a>
        <a href="{{ route('front.extrakulikuler') }}" class="block px-4 py-2 text-white hover:text-black hover:bg-gray-100">Ekstrakulikuler</a>
      </div>
    </div>
    @auth
    <div class="relative mx-auto mt-4 flex justify-center items-center mb-2 ">
      <button id="dropdownButtonAuth" class="text-black bg-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 flex items-center">
        <p><i class="fa-solid fa-circle-user"></i> {{ auth()->user()->name }}</p>
        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
      <div id="dropdownMenuAuth" class="absolute  bottom-[-45px] mt-2 hidden w-64 bg-black rounded-lg shadow-md">
        <a href="{{ route('dashboard.index') }}" class="block px-4 py-2 text-white hover:text-black hover:bg-gray-100">Dashboard</a>
      </div>
    </div>
  @else
  <div class="ml-auto w-full mt-4 mb-2 flex justify-center lg:block">
    <a href="{{ route('login') }}" class="text-[16px] text-xl text-white px-2 py-2 mx-auto bg-[#0c720f] rounded-xl font-semibold">Sign In</a>
  </div>
  @endauth
</div>