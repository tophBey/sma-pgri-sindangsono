@extends('frontend.main.index')

@section('content')
<div class="w-screen px-5 py-3 min-h-screen max-h[1400px]  bg-[#F5F6F9]">

        <!-- descripsion and image -->
        <div class="mt-28 flex flex-wrap gap-4  w-[80%] mx-auto bg-white min-h-96 rounded-xl py-4">
          <div class="w-[80%] mx-auto ">
            <h1 class="text-center text-2xl font-semibold mb-7"><i class="fa-solid fa-bullhorn"></i> {{ $announcement->title }}
            </h1>

            <div class="flex gap-3 w-[90%] mx-auto mb-3">

                <div class=" pr-3 flex gap-3">
                    <i class="fa-solid fa-calendar-week text-xl text-gray-500"></i>
                    <p>{{ $announcement->created_at }}</p>
                </div>
            </div>

           
            <div class=" px-3 py-4 w-[90%]   mx-auto">
                <p class="text-xl text-justify border-b-2 mb-10">{{ $announcement->description }}</p>
                <div class="flex justify-between">
                    <a href="{{ route('front.announcement') }}" class="px-3  py-3 text-xl font-semibold rounded-xl text-[#0c720f] border-2 border-[#0c720f]">Kembali</a>

                   
                </div>
            </div>
          </div>
        </div>

    </div>
@endsection