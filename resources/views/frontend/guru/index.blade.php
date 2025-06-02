@extends('frontend.main.index')

@section('content')
<div class="w-screen px-5 py-3 flex-col justify-center items-center bg-[#F5F6F9]">

<div class="lg:w-[1140px] mb-16 lg:h-[150px] md:h-[150px] sm:h-32 mt-28 rounded-xl shadow-2xl flex justify-center items-center px-6  mx-auto bg-gradient-to-r from-[#0c720f] to-[#3ccd41]">
    <div class="lg:w-[60%] flex ">
        <div class="lg:min-w-32 lg:min-h-24 md:min-w-32 md:min-h-24 sm:min-w-28 sm:min-h-24 py-2 lg:mt-0 md:mt-0 sm:mt-1">
            <div class="w-20 h-20 p-8 flex justify-center items-center  rounded-full border-4 border-[#ffffff]">
                <i class="fa-solid fa-user-graduate text-[34px] font-bold text-white"></i>
            </div>
        </div>

        <div class="my-auto">
            <p class="text-white font-semibold lg:text-[30px] sm:text-xl sm:text-center md:text-[30px]">Daftar Guru SMA PGRI Sindangsono</p>
        </div>
        
    </div>
</div>


<div class="w-full flex gap-10 mb-8 justify-center flex-wrap">
    <!-- card -->
     @forelse ($teachers as $teacher )
        <div class="lg:w-64 md:w-60 sm:w-full h-[290px] bg-white flex gap-3 justify-center items-center rounded-xl py-4 shadow-xl">
            <div class="">
                <div class="lg:w-48 lg:h-48 md:w-44 md:h-44 sm:w-40 sm:h-40 overflow-hidden rounded-full">
                    <img class="lg:w-48 lg:h-48 md:w-44 md:h-44 sm:w-40 sm:h-40 rounded-full" src="{{ Storage::url($teacher->foto) }}" alt="">
                </div>

                <div class="mt-3">
                    <p class="text-center font-medium text-[#0c720f]">{{ $teacher->name }} {{ strtoupper($teacher->degrees->name) }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="lg:w-64 md:w-60 sm:w-full h-[290px] bg-white flex gap-3 justify-center items-center rounded-xl py-4 shadow-xl">
            <div class="">
                <div class="lg:w-48 lg:h-48 md:w-44 md:h-44 sm:w-40 sm:h-40 overflow-hidden rounded-full">
                    <img class="lg:w-48 lg:h-48 md:w-44 md:h-44 sm:w-40 sm:h-40 rounded-full" src="{{ asset('asset/bg.png') }}" alt="">
                </div>

                <div class="mt-3">
                    <p class="text-center font-medium text-[#0c720f]">Belum Tersedia</p>
                </div>
            </div>
        </div>
     @endforelse
    
   
    <!-- card --> 
</div>
<div class="mt-4">
    {{ $teachers->links() }}
</div>
</div>
@endsection