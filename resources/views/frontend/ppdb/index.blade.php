@extends('frontend.main.index')

@section('content')

<div class="w-screen px-5 py-3 min-h-screen  flex-col justify-center items-center bg-[#F5F6F9]">

        <div class="lg:w-[1140px]  mt-24 mb-20  mx-auto ">
           
            <h1 class="text-center font-bold text-3xl text-[#0c720f]">Form Pendaftaran</h1>
            @if (session()->has('FailedRegister'))
                <div class="w-full h-[70px] bg-[#FFF3E8] rounded-xl flex px-[20px] mt-3 pt-2">       
                    <div>
                        <p class="font-signika font-semibold text-[20px] text-white">Gagal</p>
                        <p class="font-signika font-semibold text-white">{{ session('FailedRegister') }}</p>
                    </div>
                </div>
             @endif

             <!-- @if ($errors->any())
                <div class="text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
             @endif -->

        @if (auth()->check())
            <p class="font-bold text-3xl text-green-600 text-center mt-10">Anda Sudah Terdaftar</p>
        @elseif ($statusRegister->is_open === 0 )
            <p class="text-center font-bold mt-11 text-3xl text-gray-500">Pendaftaran Belum Dibuka</p>
        @elseif (!auth()->check() || $statusRegister->is_open === 1)
            @include('frontend.ppdb.form')
        @endif
                
       
       
        </div>      
    </div>
@endsection