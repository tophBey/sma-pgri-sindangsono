<div class="lg:w-[77.5%] lg:h-full md:w-full sm:w-full overflow-hidden">

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

     <div class="lg:w-full lg:max-w-[1345px] md:w-full sm:w-full lg:h-[175px] md:h-[155px] mt-3 mb-3 gap-2 flex overflow-hidden">

        <div class="lg:w-[98%] 2xl:w-[395px] md:h-full sm:w-[50%] md:w-full lg:h-full bg-[#FFFFFF] rounded-xl">
            <div class="lg:w-full 2xl:w-[350px] lg:h-[40px] mx-auto lg:pt-5 md:pt-4 sm:pt-3 px-4 2xl:pt-5 flex justify-between">
                <h2 class="font-signika lg:text-2xl md:text-[15px] font-semibold">{{ now()->translatedFormat('l') }}</h2>

                <div class="logo lg:w-[40px] lg:h-[40px] md:w-[30px] md:h-[30px] bg-[#30a63a] rounded-xl flex justify-center align-middle items-center px-3">
                    <i class="fa-solid fa-calendar-days lg:w-[20px] lg:h-[20px] text-white"></i>
                </div>
            </div>

            <div  class="angka lg:w-[353px] lg:h-[30px] w-[380px] lg:mt-[30px] md:mt-[25px] mb-3">
                <p class="font-medium font-signika lg:text-4xl md:text-[18px] ml-4">{{ now()->translatedFormat('d F Y') }}</p>
            </div>
        </div>
        <!-- card 2 -->
       

        <!-- card 3 -->
        <div class="lg:w-[98%] 2xl:w-[395px] md:w-full sm:w-[50%] md:h-full lg:h-full bg-[#FFFFFF] rounded-xl">
            <div class="lg:w-full 2xl:w-[350px] lg:h-[40px] mx-auto lg:pt-5 md:pt-4 sm:pt-3 px-4 2xl:pt-5 flex justify-between">
                <h2 class="font-signika lg:text-2xl md:text-[15px] sm:text-xs font-semibold">Status Pendaftaran</h2>

                <div class="logo lg:w-[40px] lg:h-[40px] md:w-[30px] md:h-[30px] bg-[#30a63a] rounded-xl flex justify-center items-center">
                    <i class="fa-solid fa-user lg:w-[20px] md:-mt-1 lg:h-[20px] lg:my-auto ml-1 text-white"></i>
                    <!-- <i class="fa-solid fa-user"></i> -->
                </div>
            </div>

            <div  class="angka lg:w-[353px] lg:h-[30px] 2xl:w-[380px] lg:mt-[30px] md:mt-[25px] mb-3">
                 @if (!$student->previousSchool || !$student->custodian || $student->attachment ?? collect()->isEmpty())
                    <p class="lg:px-3 lg:py-3 md:px-3 md:py-3 sm:px-2 sm:py-2 text-white lg:w-44 md:w-44 sm:w-32 font-bold rounded-xl bg-red-600 ml-3 sm:text-xs md:text-lg mt-2">Belum Lengkap</p>
                    @else
                    <p class="lg:px-3 lg:py-3 md:px-3 md:py-3 sm:px-2 sm:py-2 text-white lg:w-44 md:w-44 sm:w-32 font-bold rounded-xl sm:text-xs md:text-lg bg-green-600 ml-3">Lengkap</p>
                @endif
            </div>
        </div>

    </div>

    <div class="daftar-pesanan min-h-[600px] lg:max-w-[1345px] w-full  bg-[#FFFFFF] mt-3 rounded-xl p-[20px] overflow-y-scroll overflow-hidden">
        <div class="w-full min-h-[200px] px-5 py-3 rounded-lg border-2 border-dashed">

         @if (!$student->previousSchool || !$student->custodian || $student->attachment ?? collect()->isEmpty())
            <div class="w-full">
                <p class="font-bold text-xl ">Status Pendaftaran belum lengkap</p>
                <p class="font-semibold text-gray-500 mt-4">Silahkan lengkapi data di halaman Pendaftaran</p>
            </div>
            @else
            <div class="w-full">
                <p class="font-bold text-xl ">Status Pendaftaran Sudah lengkap</p>
                <p class="font-semibold text-gray-500 mt-4">Silahkan Download formulir di halaman Pendaftaran</p>
            </div>
        @endif

        </div>

        <div class="w-full min-h-[200px] mt-3 px-5 py-3 rounded-lg border-2 border-dashed">
        @if ($student->status == 'accepted')
            <div class="w-full">
                <p class="font-bold text-xl ">Selamat anda Lolos Pendaftaran 🎉</p>
                <p class="font-semibold text-gray-500 mt-4">Silakan melengkapi administrasi di sekolah untuk langkah berikutnya. Terima kasih telah mendaftar dan kami tunggu kehadiran Anda. </p>
            </div>
        @elseif ($student->status == 'rejected')
            <div class="w-full">
                <p class="font-bold text-xl ">Mohon Maaf</p>
                <p class="font-semibold text-gray-500 mt-4">Kami sampaikan bahwa Anda belum memenuhi persyaratan untuk lolos pendaftaran. Namun, kami menghargai upaya Anda dan berharap Anda terus semangat dalam perjalanan Anda. Terima kasih.</p>
            </div>
        @endif
        </div>
    </div>
</div>