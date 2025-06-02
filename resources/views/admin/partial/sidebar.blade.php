<div class=" lg:w-[305px] md:fixed sm:fixed md:w-full sm:w-full sm:min-h-24 sm:max-h-24 md:min-h-24 md:max-h-24 lg:static lg:min-h-screen lg:max-h-max lg:bg-[#FFFFFF] md:bg-[#d4d2d2e0] sm:bg-[#d4d2d2e0] border  mr-3 lg:overflow-hidden md:overflow-hidden z-10">

<!-- mobile and tablet sidebar -->
    <div class="flex lg:hidden justify-between px-5">
        <div class="flex lg:hidden items-center mt-3 gap-4 px-2">
            <img class="max-h-16" src="{{ asset('asset/logo.png') }}" alt="Logo">
            <p class="text-[18px] font-semibold">SMA PGRI Sindangsono</p>
        </div>

        <button id="hamburgerButton2" class="ml-auto mt-2 block lg:hidden">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
    </div>
<!-- mobile and tablet sidebar -->
    

<!-- lg sidebar -->
    <div class="w-full md:hidden sm:hidden lg:flex justify-center items-center mt-6">
        <img class="w-16 h-16" src="{{ asset('asset/logo.png') }}" alt="">
    </div>
    <h2 class="font-roboto md:hidden sm:hidden lg:block font-bold text-[24px] bg-clip-text text-[#0c720f] text-center">SMA PGRI Sindangsono</h2>

    <div class="fitur md:hidden sm:hidden lg:block  w-[230px] h-full mt-[30px] ml-[37px]">

        <p class="font-signika text-base text-[#9B9B9B] ">Menu Utama</p>

        <div class="menu-utama w-[230px] mb-2 overflow-x-hidden overflow-y-hidden"> 

            <a href="{{ route('dashboard.index') }}" class="{{ request()->is('dashboard') ? 'bg-[#30a63a] text-white font-semibold' : '' }}  block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-gauge"></i><span class="ml-2 font-roboto group-hover:text-[#ffffff]">Dashboard</span>
            </a>
            @can('admin')
            <a href="{{ route('admin.banner.index') }}" class="{{ request()->is('admin/banner*') ? 'bg-[#30a63a] text-white font-semibold' : '' }} block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-images"></i><span class=" ml-2 font-roboto group-hover:text-[#ffffff]">Banner</span>
            </a>
            <a href="{{ route('admin.category.index') }}" class="{{ request()->is('admin/category*') ? 'bg-[#30a63a] text-white font-semibold' : '' }}  block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-list"></i><span class="ml-2 font-roboto group-hover:text-[#ffffff]">Kategori</span>
            </a>
            <a href="{{ route('admin.news.index') }}" class="{{ request()->is('admin/news*') ? 'bg-[#30a63a] text-white font-semibold' : '' }}  block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-newspaper"></i><span class="ml-2 font-roboto group-hover:text-[#ffffff]">Berita</span>
            </a>
            <a href="{{ route('admin.prestasion.index') }}" class="{{ request()->is('admin/prestasion*') ? 'bg-[#30a63a] text-white font-semibold' : '' }}  block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-trophy"></i><span class="ml-2 font-roboto group-hover:text-[#ffffff]">Prestasi</span>
            </a>
            <a href="{{ route('admin.degree.index') }}" class="{{ request()->is('admin/degree*') ? 'bg-[#30a63a] text-white font-semibold' : '' }}  block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-user-graduate"></i><span class="ml-2 font-roboto group-hover:text-[#ffffff]">Gelar</span>
            </a>
            <a href="{{ route('admin.teacher.index') }}" class="{{ request()->is('admin/teacher*') ? 'bg-[#30a63a] text-white font-semibold' : '' }}  block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-person-chalkboard"></i><span class="ml-2 font-roboto group-hover:text-[#ffffff]">Guru</span>
            </a>
            <a href="{{ route('admin.activity.index') }}" class="{{ request()->is('admin/activity*') ? 'bg-[#30a63a] text-white font-semibold' : '' }}  block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-person-running"></i><span class="ml-2 font-roboto group-hover:text-[#ffffff]">Kegiatan</span>
            </a>
            <a href="{{ route('admin.extracurricullar.index') }}" class="{{ request()->is('admin/extracurricullar*') ? 'bg-[#30a63a] text-white font-semibold' : '' }}  block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-clock"></i><span class="ml-2 font-roboto group-hover:text-[#ffffff]">Ektrakulikuler</span>
            </a>
            <a href="{{ route('admin.announcement.index') }}" class="{{ request()->is('admin/announcement*') ? 'bg-[#30a63a] text-white font-semibold' : '' }}  block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-bullhorn"></i><span class="ml-2 font-roboto group-hover:text-[#ffffff]">Pengumuman</span>
            </a>
            
            @endcan
            @can('student')
            <a href="{{ route('student.ppdb.index') }}" class="{{ request()->is('student/ppdb*') ? 'bg-[#30a63a] text-white font-semibold' : '' }}  block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-address-book"></i><span class="ml-2 font-roboto group-hover:text-[#ffffff]">Pendaftaran</span>
            </a> 
            <a href="{{ route('front.index') }}" class="{{ request()->is('/') ? 'bg-[#30a63a] text-white font-semibold' : '' }}  block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-house"></i><span class="ml-2 font-roboto group-hover:text-[#ffffff]">Beranda</span>
            </a> 
            @endcan 
        </div>

        @can('admin')
             <div class="relative w-[230px] group mt-3 mb-3 ml-1">
                <button id="dropdownButton" class="text-black bg-white focus:ring-4 w-[220px]  focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 flex items-center">
                    PPDB
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="dropdownMenu" class="absolute z-50  w-[230px]  h-[90px] bg-[#30a63a] mt-2 rounded-lg">
                    <a href="{{ route('admin.ppdb.index') }}" class="block px-4 py-2 text-white hover:text-black hover:bg-gray-100 rounded-lg">PPDB</a>
                    <a href="{{ route('front.index') }}" class="block px-4 py-2 text-white hover:text-black hover:bg-gray-100">Beranda</a>
                </div>
            </div>

             <a href="{{ route('admin.user.index') }}" class="{{ request()->is('admin/user*') ? 'bg-[#30a63a] text-white font-semibold' : '' }} block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-circle-user"></i><span class="ml-2 font-roboto group-hover:text-[#ffffff]">Akun</span>
            </a>
        @endcan

        <p class="font-signika text-base text-[#9B9B9B] ">Profile</p>
        <div class="menu-utama w-[230px] mb-2 overflow-x-hidden overflow-y-hidden">
            <!-- <a href="" class=" block w-[230px] group h-[49px] active:bg-[#EDFAEB] hover:bg-[#30a63a] rounded-xl cursor-pointer pt-[10px] px-2 pb-[10px] mb-1">
                <i class="fa-solid fa-circle-user"></i><span class="ml-2 font-roboto group-hover:text-[#ffffff]">Akun</span>
            </a> -->
           
            <form method="post" action="{{ route('logout') }}" class="w-[230px] hover:bg-[#30a63a] group h-[49px] rounded-xl">
                  @csrf
                  <button type="submit" class="w-full text-start group-hover:text-[#ffffff] px-3 h-full "> <i class="fa-solid fa-arrow-right-from-bracket "></i>
                  Logout</button>
             </form>
        </div>




    </div>
<!-- lg sidebar -->
</div>



@include('admin.partial.sidebarMobile')
