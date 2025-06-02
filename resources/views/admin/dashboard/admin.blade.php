<div class="lg:w-[77.5%] lg:h-full md:w-full overflow-hidden">

    <!-- header -->
     <div class="lg:mt-2 md:mt-28 sm:mt-28 sm:w-full md:w-full mb-3 lg:w-full h-[85px] flex justify-between mt-4 rounded-xl bg-[#FFFFFF] py-3 px-5 lg:max-w-[1345px] overflow-hidden">
        <p class="font-signika  lg:text-[20px] md:text-[20px] sm:text-xs lg:mr-[200px] md:mr-[200px] sm:mr-[200px]  lg:w-full  font-semibold my-auto">Halo {{ auth()->user()->name }}</p>

        
        <div class=" lg:min-w-[250px] md:min-w-[250px] sm:w-[200px]  flex overflow-hidden">

            @if (auth()->user()->avatar == null)
                        <img src="{{ asset('avatar/default-avatar.jpg') }}" alt="User Profile" class="rounded-full lg:w-[60px] lg:h-[60px] md:w-[60px] md:h-[60px] sm:w[45px] sm:mt-2 lg:mt-0 md:mt-0 sm:h-[45px] mr-3">
                @else
                    <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="User Profile" class="rounded-full lg:w-[60px] lg:h-[60px] md:w-[60px] md:h-[60px] sm:mt-2 lg:mt-0 md:mt-0 sm:w-[45px] sm:h-[45px] mr-3">
            @endif
            <div class="py-2 w-full">
                    <h3 class="  lg:text-[18px] md:text-[18px] sm:text-xs lg:font-semibold md:font-semibold sm:font-bold text-nowrap">{{ auth()->user()->name }}</h3>
                    <p class="  lg:text-[18px] md:text-[18px] font-light">{{ auth()->user()->role }}</p>
            </div>
        </div> 
        
    </div>
    <!-- header -->

    <!-- card detail  -->
    <div class="lg:w-full lg:max-w-[1345px] lg:h-[175px] md:h-[155px] mt-3 mb-3 gap-2 grid grid-cols-3 overflow-hidden">

        <div class="lg:w-[98%] 2xl:w-[395px] md:h-full lg:h-full bg-[#FFFFFF] rounded-xl">
            <div class="lg:w-full 2xl:w-[350px] lg:h-[40px] mx-auto lg:pt-5 md:pt-4 px-4 2xl:pt-5 sm:pt-2 flex justify-between">
                <h2 class="font-signika lg:text-[20px] md:text-2xl sm:text-sm font-semibold">{{ now()->translatedFormat('l') }}</h2>

                <div class="logo lg:h-[40px] lg:w-[40px]  md:h-[40px] md:w-[40px]  sm:w-[20px] sm:h-[20px] bg-[#30a63a] rounded-xl flex justify-center align-middle items-center px-3">
                    <i class="fa-solid fa-calendar-days lg:w-[20px] lg:h-[20px] sm:text-xs md:text-xl text-white"></i>
                </div>
            </div>

            <div  class="angka lg:w-[353px] lg:h-[30px] 2xl:w-[380px] sm:ml-3 md:ml-0 mx-auto sm:mt-4 lg:mt-[30px] md:px-3 lg:px-4 md:mt-[25px] mb-3">
                <p class="font-medium font-signika lg:text-2xl md:text-2xl sm:text-xs ">{{ now()->translatedFormat('d F Y') }}</p>
            </div>
        </div>
        <!-- card 2 -->
        <div class="lg:w-[98%] 2xl:w-[395px] md:h-full lg:h-full bg-[#FFFFFF] rounded-xl">
            <div class="lg:w-full 2xl:w-[350px] lg:h-[40px] mx-auto lg:pt-5 md:pt-4 sm:pt-2 px-4 2xl:pt-5 flex justify-between">
                <h2 class="font-signika lg:text-[20px] md:text-2xl sm:text-xs font-semibold">Total Pendaftar</h2>

                <div class="logo lg:h-[40px] lg:w-[40px]  md:h-[40px] md:w-[40px] sm:w-[20px] sm:h-[20px] bg-[#30a63a] rounded-xl flex justify-center items-center pt-2">
                    <i class="fa-solid fa-check lg:my-auto  md:-mt-1 lg:h-[20px] lg:w-[20px]  md:h-[20px] md:w-[20px]  sm:w-[20px] sm:h-[20px]  mx-auto text-white"></i>
                    <!-- <i class="fa-solid fa-check"></i> -->
                </div>
            </div>

            <div  class="angka lg:w-[353px] lg:h-[30px] 2xl:w-[380px] mx-auto lg:mt-[30px] md:mt-[25px] mb-3">
                <p class="font-medium font-signika lg:text-[34px] md:text-2xl ml-4">{{ $students }}</p>
            </div>
        </div>

        <!-- card 3 -->
        <div class="lg:w-[98%] 2xl:w-[395px] md:h-full lg:h-full bg-[#FFFFFF] rounded-xl">
            <div class="lg:w-full 2xl:w-[350px] lg:h-[40px] mx-auto lg:pt-5 md:pt-4 px-4 2xl:pt-5 sm:pt-3 flex justify-between">
                <h2 class="font-signika lg:text-[20px] md:text-2xl sm:text-xs font-semibold">Total Admin</h2>

                <div class="logo lg:h-[40px] lg:w-[40px]  md:h-[40px] md:w-[40px] sm:w-[20px] sm:h-[20px] bg-[#30a63a] rounded-xl flex justify-center items-center">
                    <i class="fa-solid fa-user lg:w-[20px] md:w-[20px] sm:text-xs md:text-xl md:-mt-1 lg:h-[20px] lg:my-auto lg:ml-1 md:ml-1 text-white"></i>
                    <!-- <i class="fa-solid fa-user"></i> -->
                </div>
            </div>

            <div  class="angka lg:w-[353px] lg:h-[30px] 2xl:w-[380px] mx-auto lg:mt-[30px] md:mt-[25px] mb-3">
                <p class="font-medium font-signika lg:text-[34px] md:text-2xl ml-4">{{ $admins }}</p>
            </div>
        </div>

    </div>
    <!-- cart detail -->

    <div class="lg:w-full lg:max-w-[1345px] md:w-full sm:w-full lg:mb-3 md:mb-3 flex sm:mb-3  gap-3 min-h-28">
        <div class="min-h-28 rounded-xl bg-white items-center justify-between w-[49%] flex px-3">
            <div class="min-h-24 max-h-24  w-full lg:px-5 md:px-5">
                <p class="font-semibold md:text-2xl lg:text-2xl sm:text-lg">Total SDA</p>
                <p class="font-semibold md:text-2xl lg:text-2xl sm:text-lg mt-4">{{ $teacher }}</p>
            </div>
            <div class="lg:min-h-24 lg:max-h-24 lg:min-w-24 lg:max-w-24 md:min-h-24 md:max-h-24 md:min-w-24 md:max-w-24 sm:min-h-16 sm:max-h-16 sm:min-w-16 sm:max-w-16 bg-[#30a63a] flex justify-center items-center text-4xl text-white rounded-xl">
                <i class="fa-solid fa-user-graduate"></i>
            </div>
        </div>
        <div class="min-h-28 rounded-xl bg-white w-[49%] items-center justify-between flex px-3">
             <div class="min-h-24 max-h-24 w-full lg:px-5 md:px-5">
                <p class="font-semibold md:text-2xl lg:text-2xl sm:text-lg">Total Prestasi</p>
                <p class="font-semibold md:text-2xl lg:text-2xl sm:text-lg mt-4">{{ $teacher }}</p>
            </div>
            <div class="lg:min-h-24 lg:max-h-24 lg:min-w-24 lg:max-w-24 md:min-h-24 md:max-h-24 md:min-w-24 md:max-w-24 sm:min-h-16 sm:max-h-16 sm:min-w-16 sm:max-w-16 bg-[#30a63a] flex justify-center items-center text-4xl text-white rounded-xl">
                <i class="fa-solid fa-trophy"></i>
            </div>
        </div>
    </div>

    <div class=" lg:h-[423px] lg:w-full lg:max-w-[1345px] md:w-full sm:w-full sm:gap-3 md:gap-0 lg:gap-0 lg:mb-3 grid grid-cols-2 overflow-hidden">

        <div class="chart h-full lg:w-[105%] md:w-[104%] sm:w-full bg-[#FFFFFF] rounded-xl p-[20px]">
            <p class="font-signika font-semibold lg:text-[20px] md:text-[18px] sm:text-sm text-[#1A1A1A]">Berita Terbaru</p>

            @forelse ( $news as $new )
            <div class="flex overflow-hidden lg:h-24 md:h-24 sm:h-20 rounded-xl w-full border-2 items-center gap-4 px-3 mt-5">
                <div class="lg:max-h-20 md:min-w-20 md:min-h-20 md:max-w-20 md:max-h-20 sm:min-w-10 sm:min-h-10 sm:max-w-10 sm:max-h-10 rounded-xl">
                    <img class="lg:min-w-20 lg:min-h-20 md:min-w-20 md:min-h-20 md:max-w-20 md:max-h-20 sm:min-w-10 sm:min-h-10 sm:max-w-10 sm:max-h-10 rounded-xl" src="{{ Storage::url($new->thumbnail) }}" alt="">
                </div>
                <div class="w-full min-h-20 max-h-20">
                    <div class="title font-semibold line-clamp-1">
                        <p class="font-semibold lg:text-xl md:text-xl sm:text-sm sm:mt-1 md:mt-0 lg:mt-0">{{ $new->title }}</p>
                    </div>
                    <div class="mt-2 line-clamp-2">
                        <p class="font-medium text-gray-400 lg:text-xl md:text-xl sm:text-sm sm:mt-1 md:mt-0 lg:mt-0">{{ strip_tags($new->description) }}</p>
                    </div>
                </div>
            </div>
            
            @empty
            <div class="flex overflow-hidden lg:h-24 md:h-24 sm:h-20 rounded-xl w-full border-2 items-center gap-4 px-3 mt-5">
                <div class="lg:max-h-20 md:min-w-20 md:min-h-20 md:max-w-20 md:max-h-20 sm:min-w-10 sm:min-h-10 sm:max-w-10 sm:max-h-10 rounded-xl">
                    <img class="lg:min-w-20 lg:min-h-20 md:min-w-20 md:min-h-20 md:max-w-20 md:max-h-20 sm:min-w-10 sm:min-h-10 sm:max-w-10 sm:max-h-10 rounded-xl" src="{{asset('asset/bg.png')}}" alt="">
                </div>
                <div class="w-full min-h-20 max-h-20">
                    <div class="title font-semibold line-clamp-1">
                        <p class="font-semibold lg:text-xl md:text-xl sm:text-sm sm:mt-1 md:mt-0 lg:mt-0">Belum Tersedia</p>
                    </div>
                    <div class="mt-2 line-clamp-2">
                        <p class="font-medium text-gray-400 lg:text-xl md:text-xl sm:text-sm">Berita belum tersedia</p>
                    </div>
                </div>
            </div>
                
            @endforelse
        </div>


        <div class="h-full lg:w-[92%] md:w-[89%] sm:w-full bg-[#FFFFFF] rounded-xl lg:ml-11 md:ml-7 p-[20px] overflow-y-scroll">
            <p class="font-signika font-semibold lg:text-[20px] md:text-[18px] sm:text-sm text-[#1A1A1A]">Pengumuman Terbaru</p>
            @forelse ($announcememnts as $announcement)
            <div class="flex overflow-hidden h-24 rounded-xl w-full border-2 items-center gap-4 px-3 mt-5">
                <div class="min-w-20 min-h-20 max-w-20 max-h-20 rounded-xl bg-[#30a63a] flex justify-center items-center">
                    <i class="fa-solid fa-bullhorn text-4xl text-white"></i>
                </div>
                <div class="w-full min-h-20 max-h-20">
                    <div class="title font-semibold line-clamp-1">
                        <p class="font-semibold">{{ $announcement->title }}</p>
                    </div>
                    <div class="mt-2 line-clamp-2">
                        <p class="font-medium text-gray-400">{{ $announcement->description }}</p>
                    </div>
                </div>
            </div>
            
            @empty
            <div class="flex overflow-hidden lg:h-24 md:h-24 sm:h-20 rounded-xl w-full border-2 items-center gap-4 px-3 mt-5">
                <div class="lg:max-h-20 md:min-w-20 md:min-h-20 md:max-w-20 md:max-h-20 sm:min-w-10 sm:min-h-10 sm:max-w-10 sm:max-h-10 rounded-xl">
                    <img class="lg:min-w-20 lg:min-h-20 md:min-w-20 md:min-h-20 md:max-w-20 md:max-h-20 sm:min-w-10 sm:min-h-10 sm:max-w-10 sm:max-h-10 rounded-xl" src="{{asset('asset/bg.png')}}" alt="">
                </div>
                <div class="w-full min-h-20 max-h-20">
                    <div class="title font-semibold line-clamp-1">
                        <p class="font-semibold lg:text-xl md:text-xl sm:text-sm sm:mt-1 md:mt-0 lg:mt-0">Belum Tersedia</p>
                    </div>
                    <div class="mt-2 line-clamp-2">
                        <p class="font-medium text-gray-400 lg:text-xl md:text-xl sm:text-sm">Pengumuman belum tersedia</p>
                    </div>
                </div>
            </div>
                
            @endforelse
        </div>
    </div>

</div>