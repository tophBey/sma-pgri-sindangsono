@extends('frontend.main.index')

@section('content')
<div class="w-screen px-5 py-3 min-h-screen max-h[1400px]  bg-[#F5F6F9]">

<!-- descripsion and image -->
<div class="mt-28 flex flex-wrap gap-4  w-full bg-white min-h-96 rounded-xl py-4">
  <div class="w-[90%] mx-auto ">
    <h1 class="text-center text-2xl font-semibold mb-4">{{ $news->title }}
    </h1>

    <div class="flex gap-3 w-[99%]   mx-auto mb-3">

        <div class="border-r-2 px-3 flex gap-2">
            <i class="fa-solid fa-user text-xl text-gray-500"></i>
            <p class="md:text-start sm:text-center">{{ $news->users->name }}</p>
        </div>
        <div class="flex gap-2">
            <i class="fa-solid fa-calendar-week text-xl text-gray-500"></i>
            <p class="md:text-xl sm:text-xs">{{ $news->created_at->format('d F Y') }}</p>
        </div>
    </div>

    <div class="w-[90%] mx-auto border rounded-lg mb-8 ">
        <img class="w-[100%] max-h-[550px] rounded-lg " src="{{ Storage::url($news->thumbnail) }}" alt="">
    </div>
    <div class=" px-3 py-4 w-[90%]   mx-auto">
        <p class="text-xl text-justify  mb-14"> {!! $news->description !!}        </p>
        <div class="flex justify-between mt-3">
            <a href="{{ route('front.news') }}" class="px-3  py-3 text-xl font-semibold rounded-xl text-[#0c720f] border-2 border-[#0c720f]">Kembali</a>

            
        </div>
    </div>
  </div>
</div>

</div>
@endsection