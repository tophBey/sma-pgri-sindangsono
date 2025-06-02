<footer class="w-screen max-w-[1600px] lg:h-[415px] md:h-[370px] sm:w-full py-6  bg-[#0c720f]">
    <div class="lg:w-[1140px] md:w-[90%] sm:w-full lg:mt-20 md:mt-8  lg:min-h-[200px] md:min-h-[200px] flex gap-3 justify-between mx-auto border-b-2 border-[#ffffff]">
        <div class="lg:w-40 lg:h-40 md:w-40 md:h-40">
            <img class="lg:w-40 lg:h-40 md:w-40 md:h-40 sm:w-20 sm:h-20" src="{{ asset('asset/logo.png') }}" alt="">
        </div>

        <div class="lg:w-64 md:w-64">
            <h3 class="font-bold lg:text-3xl md:text-[22px] sm:text-md text-white">Tentang Sekolah</h3>
            <div class="pl-3 mt-4">
               <ul>
                <li class="mb-1 text-white md:text-md lg:text-lg sm:text-xs font-light"><a href="{{ route('front.contact') }}">Kontak</a></li>
                <li class="mb-1 text-white md:text-md lg:text-lg sm:text-xs font-light"><a href="{{ route('front.news') }}">Berita</a></li>
                <li class="mb-1 text-white md:text-md lg:text-lg sm:text-xs font-light"><a href="{{ route('front.prestasion') }}">Prestasi</a></li>
                <li class="mb-1 text-white md:text-md lg:text-lg sm:text-xs font-light"><a href="{{ route('front.extrakulikuler') }}">Ekstrakulikuler</a></li>
               </ul>
            </div>
        </div>
        <div class="lg:w-64 md:w-64">
            <h3 class="font-bold lg:text-3xl md:text-[22px] sm:text-md text-white">Info Lainnya</h3>
            <div class="pl-3 mt-4">
               <ul>
                <li class="mb-1 text-white md:text-md lg:text-lg sm:text-xs font-light"><a href="{{ route('front.activity') }}">Kegiatan</a></li>
                <li class="mb-1 text-white md:text-md lg:text-lg sm:text-xs font-light"><a href="{{ route('front.teacher') }}">Daftar Pengajar</a></li>
                <li class="mb-1 text-white md:text-md lg:text-lg sm:text-xs font-light"><a href="{{ route('ppdb.register') }}">PPDB</a></li>
               </ul>
            </div>
        </div>
        <div class="lg:w-64 md:w-64 sm:w-36">
            <h3 class="font-bold lg:text-3xl md:text-[22px] sm:text-md text-white">Hubungi Kami</h3>
            <div class="pl-3 flex gap-4 mt-4">
              <p class="text-white lg:text-lg md:text-md sm:text-xs">JL Cayur, RT 05 RW 01, Sindang Sono, Kec. Sindang Jaya, Kabupaten Tangerang, Banten 15414</p>
            </div>
        </div>
    </div>

    <p class="text-center mt-5 font-semibold text-white">© <span>2025, </span> SMA PGRI Sindangsono</p>
</footer>