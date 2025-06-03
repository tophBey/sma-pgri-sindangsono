@extends('frontend.main.index')

@section('content')
<div class="w-screen px-5 py-3 min-h-screen max-h[1400px] flex-col justify-center items-center bg-[#F5F6F9]">

    <div class="lg:w-[1140px] lg:h-[380px] sm:w-full mt-24  mx-auto ">
        <div class="flex lg:w-[80%] md:w-[80%] sm:w-full lg:max:w-[1300px] lg:mx-auto md:mx-auto gap-5 py-2">
            <div class="py-4 lg:w-[55%] md:w-[55%] sm:pr-3  border-r-2">
                <h2 class="lg:text-[2.3rem] md:text-[2.3rem] sm:text-2xl sm:text-center lg:text-start md:text-start font-bold text-green-800">Hubungi Kami</h2>
            </div>

            <div class="py-4 lg:w-[40%] md:w-[40%]">
                <p class="text-[16px] font-medium sm:text-justify md:text-start lg:text-start">Jangan ragu untuk berbagi apa yang ingin Anda ketahui. Kami dengan senang hati menjawab pertanyaan seputar sekolah atau hal lainnya.</p>
            </div>
        </div>
        <!-- informasi contact -->
        <div class="flex sm:flex-wrap mt-14 justify-between">

            <div class="lg:w-[343px] md:w-[270px] md:h-[157px] sm:w-full flex gap-2 justify-between py-3 px-3 lg:h-[157px] bg-white shadow-xl rounded-xl border-spacing-3 ">
                <div class="min-w-20 my-auto ">
                    <div class="h-14  p-8 w-14 flex justify-center items-center rounded-full border-4 border-[#0c720f]">
                        <i class="fa-solid fa-building text-[28px] text-[#0c720f]"></i>
                    </div>
                </div>
            
                <div class="my-auto">
                    <h3 class="text-[18px] mb-3 font-semibold text-gray-400">Kunjungi Kami :</h3>
                    <p class="text-[12px] font-normal">JL Cayur, RT 05 RW 01, Sindang Sono, Kec. Sindang Jaya, Kabupaten Tangerang, Banten 15414</p>
                </div>
            </div>

            <div class="lg:w-[343px] md:w-[270px] md:h-[157px] sm:w-full sm:mt-2 lg:mt-0 md:mt-0  flex gap-2  py-3 px-3 lg:h-[157px] bg-white shadow-xl rounded-xl border-spacing-3 ">
                <div class="min-w-20 my-auto ">
                    <div class="h-14 p-8  w-14 flex justify-center items-center rounded-full border-4 border-[#0c720f]">
                        <i class="fa-solid fa-envelope text-[28px] text-[#0c720f]"></i>
                    </div>
                </div>
            
                <div class="my-auto">
                    <h3 class="text-[18px] mb-3 font-semibold text-gray-400">Email :</h3>
                    <p class="lg:text-[16px] lg:text-sm md:text-[9.5px] sm:text-xs font-normal">smapgrisindangsono183@gmail.com</p>
                </div>
            </div>
            <div class="lg:w-[343px] md:w-[270px] md:h-[157px] sm:w-full sm:mt-2 lg:mt-0 md:mt-0 flex gap-2  py-3 px-3 lg:h-[157px] bg-white shadow-xl rounded-xl border-spacing-3 ">
                <div class="min-w-20 my-auto ">
                    <div class="h-14 p-8 w-14 flex justify-center items-center rounded-full border-4 border-[#0c720f]">
                        <i class="fa-solid fa-phone text-[28px] text-[#0c720f]"></i>
                    </div>
                </div>
            
                <div class="my-auto">
                    <h3 class="text-[18px] mb-3 font-semibold text-gray-400">Phone Kami :</h3>
                    <p class="text-[16px] font-normal">082216501211</p>
                </div>
            </div>
        </div>
        <!-- informasi kontack -->
    </div>

    <!-- maps -->
        <div class="lg:w-[1140px] lg:max-w-[1140px] md:w-auto mx-auto rounded-xl lg:mt-4 md:mt-8 sm:mt-4 mb-8">
            <iframe class="w-full mb-8" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7539079926946!2d106.4816432!3d-6.163703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e4201c93a60fb03%3A0xdb19c2cc66dd3fd4!2sSMA%20S%20PGRI%20Sindang%20Sono!5e0!3m2!1sid!2sid!4v1745601749998!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <a href="https://maps.app.goo.gl/pGU4Ae9QiUNNjc756" target="_blank" class="px-3 py-3 mt-6 bg-[#0c720f] text-white font-semibold rounded-xl">Lihat Peta</a>
        </div>
    <!-- maps -->


</div>
@endsection