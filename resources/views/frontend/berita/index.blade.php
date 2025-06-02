@extends('frontend.main.index')

@section('content')
<div class="w-screen px-5 py-3 max-w-[1600px] lg:flex md:flex gap-2 justify-between  bg-[#F5F6F9]">

    <div class="w-auto">

    <div class="mt-28 lg:flex lg:flex-wrap md:flex md:flex-wrap gap-4 lg:min-w-[848px] md:min-h-[200px] md:max-h-[400px] lg:max-h-max lg:h-auto md:w-[59%] sm:w-full lg:max-w-[848px]">
        
        <!-- mobile -->
        <div class="form lg:hidden md:hidden relative mt-5 mb-5 flex gap-6 w-full h-[47px]">
 
            <form action="{{ url('/berita') }}" method="GET" class="lg:min-w-80 md:w-80 sm:w-full flex gap-3">
                <input type="text" value="{{ request('search') }}" name="search" placeholder="Cari Berita" class="focus:outline-none focus:ring focus:border-none focus:ring-[#4ACF3A] h-full w-full pl-11 py-[10px] border border-black rounded-xl bg-white">
                <button type="submit" class="cursor-pointer px-3 py-3 bg-gradient-to-r from-[#43a146] to-[#3ccd41] font-bold text-white lg:min-w-24 md:min-w-24 rounded-xl">Cari</button>

            </form>
        </div>
        <!-- mobile -->

         @forelse ($news as $new )
        
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
                    <a href="{{ route('front.news.detail',$new) }}" class="lg:mt-4 md:mt-4 lg:px-3 lg:py-3 md:px-3 md:py-3 sm:px-3 sm:py-3 bg-gradient-to-r from-[#0c720f] to-[#3ccd41] text-white rounded-xl sm:text-xs font-semibold">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>

                    <p class="my-auto md:hidden sm:hidden lg:block text-gray-400 text-[13px]">SMA Sindang Sono</p>
                </div>
            </div>
        </div>
         @empty
            <div class="shadow-lg lg:w-[412px] md:w-[412px] mx-auto md:h-[495px] shadow-[#0c720f] rounded-xl flex align-middle justify-center min-h-64 bg-white">
                <p class="  my-auto text-2xl font-bold text-center">Berita <span class="text-red-600">{{ request('search') }}</span> Belum Tersedia</p>
            </div>
         @endforelse
        <!-- card -->

        </div> 
        <div class="mt-4 sm:hidden md:block lg:block">
                {{ $news->links() }}
        </div>

    </div>

    <div class="lg:w-[500px] md:w-[40%] sm:hidden md:block  px-5 rounded-xl  bg-white lg:min-h-60 mt-28">
        
            <div class="form relative mt-5 mb-5 flex gap-6 w-full h-[47px]">

                
                <form action="{{ url('/berita') }}" method="GET" class="lg:min-w-80 md:w-80 sm:w-full flex gap-3">
                    <input type="text" value="{{ request('search') }}" name="search" placeholder="Cari Berita" class="focus:outline-none  focus:ring focus:ring-[#4ACF3A] h-full w-full pl-11 py-[10px]  rounded-xl bg-[#F5F6F9]">
                    <button type="submit" class="cursor-pointer px-3 py-3 bg-gradient-to-r from-[#43a146] to-[#3ccd41] font-bold text-white lg:min-w-24 md:min-w-24 rounded-xl">Cari</button>

                </form>

            </div>


            <div class="w-full min-h-8 border-b-4  border-[#0c720f] mt-10 py-4">
                <h2 class="font-bold text-2xl text-center">SMA PGRI Sindang Sono</h2>
            </div>

            <div class="w-full min-h-8 mt-4 py-4">
                <h2 class="font-semibold text-gray-600 text-lg mb-3">Kategori</h2>
                <div class="w-full flex flex-wrap gap-3">

                @forelse ($categories as $category )

                <a href="{{ route('front.news.category', $category) }}">
                    <div class="min-w-36 h-20 max-w-36 rounded-xl overflow-hidden bg-[#F5F6F9] border flex px-2 justify-center items-center gap-2">
                        <div class="">
                            <i class="fa-solid fa-school text-gray-500 text-3xl"></i>
                        </div>
                        <div class="">
                            <p class="font-bold text-center">{{ $category->name }}</p>
                        </div>
                    </div> 
                </a> 
                @empty
                    <div class="min-w-36 h-20 max-w-36 rounded-xl bg-[#F5F6F9] border flex px-2 justify-center items-center gap-2">
                        <div class="">
                            <i class="fa-solid fa-school text-gray-500 text-3xl"></i>
                        </div>
                        <div class="">
                            <p class="font-bold text-center">Akademik</p>
                        </div>
                    </div>
                @endforelse
                    
                </div>
            </div>

            <div class="w-full min-h-8 mt-4 py-4">
                <h2 class="font-semibold text-gray-600 text-lg mb-3">Ekstrakulikuler</h2>
                <div class="w-full flex flex-wrap gap-3">
                    @forelse ($extracuricullars as $extracuricullar )
                    <div class="min-w-36 h-20 max-w-36 rounded-xl bg-[#F5F6F9] border flex px-2 justify-center items-center gap-2">
                        <div class="">
                            <i class="fa-solid fa-school text-gray-500 text-3xl"></i>
                        </div>
                        <div class="">
                            <p class="font-bold text-center">{{ $extracuricullar->name }}</p>
                        </div>
                    </div>
                        
                    @empty
                        
                    <div class="min-w-36 h-20 max-w-36 rounded-xl bg-[#F5F6F9] overflow-hidden border flex px-2 justify-center items-center gap-2">
                        <div class="">
                            <i class="fa-solid fa-school text-gray-500 text-3xl"></i>
                        </div>
                        <div class="">
                            <p class="font-bold text-center">Belum Tesedia</p>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
    </div>
</div>
@endsection