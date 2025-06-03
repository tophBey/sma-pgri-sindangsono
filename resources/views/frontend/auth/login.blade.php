<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="Selamat Datang di Website SMA PGRI Sindangsono, Menyidiakan informasi profile sekolah, PPDB, dan Kegiatan lainnya">
        <meta name="robots" content="index, follow">

        <!-- font-aweosme -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

        <link rel="shortcut icon" href="{{ asset('asset/logo.png') }}" type="image/x-icon">


        <!-- tailwind css -->
        @vite('resources/css/app.css')
        <!-- tailwind css -->
        <title>Login</title>



    </head>
    <body >
        <!-- navbar -->
        @include('frontend.main.partial.sidebar')
        <!-- visi Misi -->
        <div class="lg:w-screen lg:mt-0 md:mt-0 sm:mt-14 px-5 py-3 lg:min-h-screen md:min-h-screen md:w-screen sm:h-full flex-col justify-center items-center bg-[#F5F6F9]">

            <div class="lg:w-[1140px] sm:w-full h-screen lg:mt-14 md:mt-14 flex flex-col justify-center items-center  lg:mx-auto ">

                @if (session()->has('SuccessRegister'))

                        <div class="lg:w-[70%] px-3 py-2 lg:h-28 md:h-28 sm:h-24 flex justify-center items-center rounded-xl border mt-[-40px] mb-4 bg-gradient-to-r from-[#0c720f] to-[#3ccd41] text-white">
                            <div class="">
                                <i class="fa-solid fa-user-check mr-3 text-2xl"></i>
                            </div>
                            <p class="font-semibold lg:text-start md:text-start sm:text-center lg:text-xl md:text-xl sm:text-sm"> Registrasi akun portal calon siswa berhasil dibuat, silahkan login</p>
                        </div>
                @endif

                <div class="lg:w-[500px] lg:min-h-[500px] md:w-[500px] md:min-h-[500px] sm:w-full sm:min-h-[420px] rounded-xl mx-auto  bg-white  shadow-2xl">

                        <div class="w-full">
                            <div class="justify-center  flex items-center lg:mt-6 md:mt-6 sm:mt-2">
                                <img class="lg:w-32 lg:h-32 md:w-32 md:h-32 sm:w-28 sm:h-28" src="{{ asset('asset/logo.png') }}" alt="">

                            </div>
                            <div class="mt-3">
                                <h1 class="text-center font-semibold text-xl">SMA PGRI Sindang Sono</h1>
                            </div>
                        </div>

                        <div class="w-full px-4 mt-8">
                            <form action="{{ route('login.store') }}" method="post">
                                @csrf
                                <div class="w-full h-auto mb-5 ">
                                    <label for="email" class="font-semibold mb-2 ml-6">Email</label>
                                    <input name="email"   type="email" placeholder="Masukan email" id="email" class="block mx-auto focus:outline-none mt-2  focus:ring focus:ring-[#4ACF3A] h-full w-[90%] pl-11 py-[10px]  rounded-xl bg-[#F5F6F9]" required>
                                    @error('email')
                                        <span class="text-red-500 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                                    @enderror
                                    @if (session('LoginError'))
                                        <span class="text-red-500 font-semibold ml-6 block py-1 text-sm">{{ session('LoginError') }}</span>
                                    @endif
                                </div>
                                <div class="w-full ">
                                    <label for="password" class="font-semibold mb-2 ml-6">Password</label>
                                    <input name="password" type="password" placeholder="Masukan password" id="password" class="focus:outline-none mt-2  focus:ring focus:ring-[#4ACF3A] h-full  w-[90%] block mx-auto  pl-11 py-[10px]  rounded-xl bg-[#F5F6F9]" required>
                                    @error('password')
                                        <span class="text-red-500 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                                    @enderror
                                    @if (session('LoginError'))
                                        <span class="text-red-500 font-semibold ml-6 block py-1 text-sm">{{ session('LoginError') }}</span>
                                    @endif
                                </div>
                                <div class=" mt-5 w-full mb-4 flex justify-center">
                                    <button type="submit" class="w-[90%] font-semibold cursor-pointer bg-gradient-to-r from-[#0c720f] to-[#3ccd41] text-white py-3 px-3 rounded-xl hover:bg-gradient-to-r hover:from-[#5bd269] hover:to-[#65ee69]">Login</button>
                                </div>
                            </form>
                        </div>

                </div>
            </div>

        
        </div>
    <!-- visi misi -->

    
    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script src="./js/index.js"></script>
    <script>
            const hamburgerButton = document.getElementById("hamburgerButton");
            const menu = document.getElementById("menu");

         hamburgerButton.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });

         document.addEventListener('click', (event) => {
            if (!hamburgerButton.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
    });

    const dropdownButton = document.getElementById('dropdownButton');
  const dropdownMenu2 = document.getElementById('dropdownMenu');

  const dropdownButtonMobile99 = document.getElementById('dropdownButtonMobile');
  const dropdownMenuMobile99 = document.getElementById('dropdownMenuMobile');


  if(dropdownMenu2.classList.contains('hidden')){
      dropdownMenuMobile99.classList.add('hidden')

  }

    // mobile button

    dropdownButtonMobile99.addEventListener('click', () => {
      console.log('hello');
      dropdownMenuMobile99.classList.toggle('hidden');
    });
  
    document.addEventListener('click', (event) => {
      if (!dropdownButtonMobile99.contains(event.target) && !dropdownMenuMobile.contains(event.target)) {
        dropdownMenuMobile99.classList.add('hidden');
      }
    });

</script>
    </body>
</html> 