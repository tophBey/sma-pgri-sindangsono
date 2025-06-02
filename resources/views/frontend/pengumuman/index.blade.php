@extends('frontend.main.index')

@section('content')
<div class="w-screen px-5 py-3 min-h-screen flex-col justify-center items-center bg-[#F5F6F9]">

    <div class="lg:w-[1240px]  mt-24  mx-auto ">
        <div class="flex lg:w-[80%] mx-auto gap-5 py-2">
            <div class="py-4 lg:w-[55%] md:w-[50%] border-r-2">
                <h2 class="lg:text-[1.8rem] md:text-[1.8rem] sm:text-xl sm:text-center md:text-start lg:mr-0 md:mr-0 sm:mr-3 lg:text-start font-bold text-green-800">Pengumuman SMA PGRI Sindang Sono</h2>
            </div>

            <div class="py-4 lg:w-[40%]">
                <p class="text-xl font-medium">Temukan Pengumuman Seputar Informasi Penting SMA PGRI Sindangsono</p>
            </div>
        </div>

        <!-- informasi contact -->
        <div class="flex flex-wrap  mt-14 justify-center gap-10 items-center">

        <!-- card -->
            @forelse ($anouncements as $anoucement)
            <a href="{{ route('front.announcement.detail', $anoucement) }}">
                <div class="w-[343px] flex gap-2  py-3 px-3 h-[157px] bg-white shadow-xl rounded-xl border-spacing-3 ">
                    <div class="min-w-20 my-auto ">
                        <div class="h-14  w-14 flex justify-center items-center rounded-full outline-4 outline-[#0c720f]">
                            <i class="fa-solid fa-bullhorn text-[28px] text-[#0c720f]"></i>
                        </div>
                    </div>
                    <div class="max-w-[300px]">
                        <h3 class="text-[18px] mb-3 font-bold">{{ $anoucement->title }}</h3>
                        <p class="text-[12px] font-normal text-gray-500">{{ substr($anoucement->description, 0, 70) }}</p>
                    </div>
                </div>
            </a>
            @empty
                <div class="w-[40%] shadow-lg shadow-[#0c720f] rounded-xl flex align-middle justify-center min-h-64 bg-white">
                    <p class="  my-auto text-2xl font-bold text-center">Pengumuman Belum Tersedia</p>
                </div>
            @endforelse
        
        <!-- card -->
            
        </div>
        <!-- informasi kontack -->
        <div class="mt-4">
            {{ $anouncements->links() }}
        </div>
    </div>
</div>
@endsection