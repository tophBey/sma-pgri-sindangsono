@extends('frontend.main.index')

@section('content')
<div class="">

     <div class="min-w-screen max-w-[1530px] bg-[#ececec] min-h-screen py-16 mb-5">
          @include('frontend.main.partial.sambutan')
     </div>

       <div class="flex w-[90%] max-w-[1330px] mx-auto">

          <!-- visi misi -->
            @include('frontend.main.partial.visiMisi')
          <!-- visi misi -->
       </div>

       <!-- data kepegaiwaian -->
           @include('frontend.main.partial.data')
       <!-- data kepegaiwaian -->

       <!-- berita -->
            @include('frontend.main.partial.berita')
       <!-- berita -->

            <!-- kegiatan -->
            @include('frontend.main.partial.kegiatan')
            <!-- batas kegiatan -->


       <!-- fasilitas -->
            @include('frontend.main.partial.fasilitas')
       <!-- fasilitas -->
     
</div>
@endsection