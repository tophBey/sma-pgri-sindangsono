@extends('frontend.main.index')

@section('content')
<div class="w-screen px-5 py-3 flex-col justify-center items-center bg-[#F5F6F9]">

<div class="lg:w-[1140px] mb-16 lg:h-[150px] md:h-[150px] sm:h-32 mt-28 rounded-xl shadow-2xl flex justify-center items-center px-6  mx-auto bg-gradient-to-r from-[#0c720f] to-[#3ccd41]">
    <div class="lg:w-[60%] flex ">
        <div class="min-w-32 min-h-24">
            <div class="w-20 p-8 lg:mt-0 md:mt-0 sm:mt-3 h-20 flex justify-center items-center  rounded-full border-4 border-[#ffffff]">
                <i class="fa-solid fa-trophy text-[34px] font-bold text-white"></i>
            </div>
        </div>

        <div class="my-auto">
            <p class="text-white font-semibold lg:text-[30px] sm:text-xl sm:text-center md:text-[30px] md:text-start">Prestasi SMA PGRI Sindangsono</p>
        </div>
        
    </div>
</div>

<div class="w-full flex gap-10 mb-8 justify-center flex-wrap">
    <!-- card -->
    @forelse ( $prestasions as $prestasion)
    <div class="lg:w-[280px] md:w-60 h-[310px] sm:w-full bg-white flex gap-3 justify-center items-center rounded-xl py-4 shadow-xl relative">
        <a href="{{ route('front.prestasionDetail', $prestasion) }}">
            <div class="">
                <div class="lg:w-48 lg:h-48 md:w-44 md:h-44 sm:w-40 sm:h-40 overflow-hidden mx-auto rounded-full">
                    <img class="lg:w-48 lg:h-48 md:w-44 md:h-44 sm:w-40 sm:h-40 rounded-full" src="{{ Storage::url($prestasion->photo_prestasion) }}" alt="">
                </div>

                <div class="mt-3">
                    <p class="text-center font-medium ">{{ $prestasion->title }}</p>
                </div>
            </div>
            <div class="absolute border w-32 h-9 bg-gradient-to-r py-1 from-[#f2ed59] to-[#f0bb1d] rounded-sm top-0 left-0">
                <p class="text-center font-semibold text-white">Prestasi</p>
            </div>
        </a>
    </div>
    
    @empty
    <div class="lg:w-[280px] md:w-60 h-[310px] sm:w-full bg-white flex gap-3 justify-center items-center rounded-xl py-4 shadow-xl relative">
        <a href="#">
            <div class="">
                <div class="lg:w-48 lg:h-48 md:w-44 md:h-44 sm:w-40 sm:h-40 overflow-hidden mx-auto rounded-full">
                    <img class="lg:w-48 lg:h-48 md:w-44 md:h-44 sm:w-40 sm:h-40 rounded-full" src="{{ asset('asset/bg.png') }}" alt="">
                </div>

                <div class="mt-3">
                    <p class="text-center font-medium ">Belum Tersedia</p>
                </div>
            </div>
            <div class="absolute border w-32 h-9 bg-gradient-to-r py-1 from-[#f2ed59] to-[#f0bb1d] rounded-sm top-0 left-0">
                <p class="text-center font-semibold text-white">Prestasi</p>
            </div>
        </a>
    </div>
        
    @endforelse  
    <!-- card -->
   
</div>
<div class="mt-4">
    {{ $prestasions->links() }}
</div>
</div>
@endsection