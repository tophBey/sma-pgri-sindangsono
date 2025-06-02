@extends('frontend.main.index')

@section('content')
<div class="w-full max-w-[1400px] mt-28 min-h-screen py-3 px-3">
    <p class="text-center font-bold text-4xl">Kategori Berita {{ $category->name }}</p>

    <div class="flex gap-4 flex-wrap w-[95%] justify-center  max-w-[1400px] mx-auto mt-8">
         
    
        @forelse ( $news as $new)
            
        <div class="lg:w-[412px] lg:h-[495px] md:w-[210px] md:h-[350px] sm:w-full sm:h-[450px] lg:mb-0 md:mb-0 sm:mb-4  shadow-lg shadow-[#0c720f] bg-white rounded-xl">
            <div class="w-full lg:h-[275px] md:h-[150px] overflow-hidden rounded-xl">
                <img class="w-full lg:h-[275px] md:h-[150px] sm:h-[250px]" src="{{ Storage::url($new->thumbnail) }}" alt="">
            </div>

            <div class="w-full  px-3 py-1">
                <div class="w-full max-h-16 line-clamp-2 overflow-hidden ">
                    <a href="" class="font-bold lg:text-[20px] md:text-[20px] sm:text-lg text-ellipsis">{{ $new->title }}</a>
                </div>
                <div class="line-clamp-2 w-full min-h-12 mt-3 mb-5">
                    <p class="text-gray-500 font-normal">{{ strip_tags($new->description) }}</p>
                </div>
                <div class="flex sm:flex-wrap lg:flex-nowrap w-full justify-between">
                    <a href="{{ route('front.news.detail', $new) }}" class="lg:mt-4 md:mt-4 lg:px-3 lg:py-3 md:px-3 md:py-3 sm:px-3 sm:py-3 bg-gradient-to-r from-[#0c720f] to-[#3ccd41] text-white rounded-xl sm:text-xs font-semibold">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>

                    <p class="my-auto md:hidden sm:hidden lg:block text-gray-400 text-[13px]">SMA Sindang Sono</p>
                </div>
            </div>
        </div>
        @empty
            
        <div class="lg:w-[412px] lg:h-[495px] md:w-[210px] md:h-[350px] sm:w-full sm:h-[450px] lg:mb-0 md:mb-0 sm:mb-4  shadow-lg shadow-[#0c720f] bg-white rounded-xl">
            <div class="w-full lg:h-[275px] md:h-[150px] overflow-hidden rounded-xl">
                <img class="w-full lg:h-[275px] md:h-[150px] sm:h-[250px]" src="{{ asset('asset/bg.png') }}" alt="">
            </div>

            <div class="w-full  px-3 py-1">
                <div class="w-full max-h-16 line-clamp-2 overflow-hidden ">
                    <a href="" class="font-bold lg:text-[20px] md:text-[20px] sm:text-lg text-ellipsis">Berita Belum tersedia</a>
                </div>
                <div class="line-clamp-2 w-full min-h-12 mt-3 mb-5">
                    <p class="text-gray-500 font-normal">Saat ini berita dengan kategori {{ $category->name }} belum tersedia</p>
                </div>
                <div class="flex sm:flex-wrap lg:flex-nowrap w-full justify-between">
                    <a href="" class="lg:mt-4 md:mt-4 lg:px-3 lg:py-3 md:px-3 md:py-3 sm:px-3 sm:py-3 bg-gradient-to-r from-[#0c720f] to-[#3ccd41] text-white rounded-xl sm:text-xs font-semibold">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>

                    <p class="my-auto md:hidden sm:hidden lg:block text-gray-400 text-[13px]">SMA Sindang Sono</p>
                </div>
            </div>
        </div>
        @endforelse
        

    </div>

     <div class="mt-4  md:block lg:block">
                {{ $news->links() }}
    </div>
</div>
@endsection