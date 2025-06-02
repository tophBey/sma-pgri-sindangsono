@extends('frontend.main.index')

@section('content')
<div class="w-screen px-5 py-3 flex-col justify-center items-center bg-[#F5F6F9]">

    <div class="lg:w-[1140px]  mt-24  mx-auto ">

        <div class="flex lg:w-[80%] md:w-[80%] mx-auto gap-5 py-2">
            <div class="py-4 lg:w-[55%] md:w-[55%] sm:w-[40%] border-r-2">
                <h2 class="lg:text-[2.3rem] md:text-[2.3rem] sm:text-3xl font-bold text-green-800">Kegiatan</h2>
            </div>

            <div class="py-4 lg:w-[40%] md:w-[40%] sm:w-[60%]">
                <p class="lg:text-[19px] md:text-[18px] md:leading-6 lg:leading-7 sm:text-xs font-medium">Ikuti berbagai kegiatan menarik yang kami selenggarakan untuk mendukung pengembangan kreativitas, pengetahuan, dan bakat Anda. Temukan informasi lebih lanjut tentang program dan aktivitas kami di sini.</p>
            </div>
        </div>

         <div class="w-full flex gap-10 mb-8 mt-12 justify-center flex-wrap">

         @forelse ($activities as $activity)
         
            <div class="lg:w-72 md:w-60 h-[330px] sm:w-full bg-white flex gap-3 justify-center items-center rounded-xl py-4 shadow-xl relative">
                <a href="{{ route('front.activityDetail', $activity) }}">
                    <div class="">
                        <div class="w-48 h-48 overflow-hidden rounded-lg mx-auto">
                            <img class="w-48 h-48 rounded-lg" src="{{ Storage::url($activity->photo_activity) }}" alt="">
                        </div>

                        <div class="mt-3">
                            <p class="text-center font-medium ">{{ $activity->title }}</p>
                        </div>
                    </div>
                    <div class="absolute w-32 h-9 bg-gradient-to-r py-1 from-[#ce59f2] to-[#bf15f3] rounded-sm top-0 left-0">
                        <p class="text-center font-semibold text-white">Kegiatan</p>
                    </div>
                </a>
            </div>
            @empty
            <div class="lg:w-72 md:w-60 h-[330px] sm:w-full bg-white flex gap-3 justify-center items-center rounded-xl py-4 shadow-xl relative">
                <a href="#">
                    <div class="">
                        <div class="w-48 h-48 overflow-hidden rounded-lg mx-auto">
                            <img class="w-48 h-48 rounded-lg" src="{{ asset('asset/bg.png') }}" alt="">
                        </div>

                        <div class="mt-3">
                            <p class="text-center font-medium ">Belum Tersedia</p>
                        </div>
                    </div>
                    <div class="absolute w-32 h-9 bg-gradient-to-r py-1 from-[#ce59f2] to-[#bf15f3] rounded-sm top-0 left-0">
                        <p class="text-center font-semibold text-white">Kegiatan</p>
                    </div>
                </a>
            </div>
        
         
         @endforelse
          
        </div>
        <div class="mt-4">
            {{ $activities->links() }}
        </div>
    </div>

   


</div>
@endsection