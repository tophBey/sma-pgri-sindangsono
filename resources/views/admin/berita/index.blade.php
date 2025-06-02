
@extends('admin.main.index')

@section('content')
<div class="lg:w-[77.5%] md:w-full lg:h-full sm:w-full overflow-hidden">

   <!-- header -->
    <div class="lg:mt-2 md:mt-28 sm:mt-28 sm:w-full md:w-full mb-3 lg:w-full h-[85px] flex justify-between mt-4 rounded-xl bg-[#FFFFFF] py-3 px-5 lg:max-w-[1345px] overflow-hidden">
        <p class="font-signika  lg:text-[20px] md:text-[20px] lg:mr-[200px] md:mr-[200px] sm:mr-[200px]  lg:w-full  font-semibold my-auto">Berita</p>

        
        <div class=" lg:min-w-[250px] md:min-w-[250px] sm:w-[200px]  flex overflow-hidden">

            @if (auth()->user()->avatar == null)
                        <img src="{{ asset('avatar/default-avatar.jpg') }}" alt="User Profile" class="rounded-full lg:w-[60px] lg:h-[60px] md:w-[60px] md:h-[60px] sm:w[45px] sm:mt-2 lg:mt-0 md:mt-0 sm:h-[45px] mr-3">
                @else
                    <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="User Profile" class="rounded-full lg:w-[60px] lg:h-[60px] md:w-[60px] md:h-[60px] sm:mt-2 lg:mt-0 md:mt-0 sm:w-[45px] sm:h-[45px] mr-3">
            @endif
            <div class="py-2 w-full">
                    <h3 class="  lg:text-[18px] md:text-[18px] sm:text-xs lg:font-semibold md:font-semibold sm:font-bold text-nowrap">{{ auth()->user()->name }}</h3>
                    <p class="  lg:text-[18px] md:text-[18px] font-light">{{ auth()->user()->role }}</p>
            </div>
        </div> 
        
    </div>
    <!-- header -->

    <div class=" min-h-screen lg:max-w-[1345px]  w-full  bg-[#FFFFFF] mt-3 rounded-xl lg:p-[20px] md:p-[20px] overflow-y-scroll overflow-hidden">
        <p class="font-signika font-medium text-[24px] sm:pl-4 md:pl-0 lg:pl-0">List Berita</p>
        @if (session()->has('successNews'))
            <div id="message" class="w-full h-[70px] bg-[#30a63a] rounded-xl flex px-[20px] mt-3 pt-2">       
                <div>
                    <p class="font-signika font-semibold text-[20px] text-white">Berhasil</p>
                    <p class="font-signika font-semibold text-white">{{ session('successNews') }}</p>
                </div>
            </div>
        @endif

        @if (session()->has('FailedNews'))
            <div id="message" class="w-full h-[70px] bg-[#FFF3E8] rounded-xl flex px-[20px] mt-3 pt-2">       
                <div>
                    <p class="font-signika font-semibold text-[20px] text-white">Gagal</p>
                    <p class="font-signika font-semibold text-white">{{ session('FailedNews') }}</p>
                </div>
            </div>
        @endif
        <div class="w-full flex mt-8 sm:pl-4 md:pl-0 lg:pl-0">
            <div class="lg:w-[55%] md:w-[55%] sm:w-[95%]">
                <form action="" method="get" class="flex gap-4">
                    <div class="lg:w-[55%] md:w-[55%] sm:w-[70%] mb-5">
                            <input name="search" value="{{ request('search') }}" type="text" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[44px]  rounded-xl pl-[20px] bg-[#FAFAFA]" autocomplete="off" placeholder="Cari Berita">
                    </div>
                    <div class="">
                        <button class="font-semibold text-white rounded-xl text-xl px-4 py-2 h-[44px] bg-[#0c720f]">Cari</button>
                    </div>
                </form>
            </div>
      </div>
        <div class="form mt-5 mb-5 w-full h-[47px] sm:pr-1 md:pr-0 flex justify-end">
            <a href="{{ route('admin.news.create') }}" class="px-3 py-3 rounded-xl text-white font-semibold bg-[#0c720f] block">Tambah Berita</a>
        </div>

        <div class="w-full mt-4 sm:overflow-x-auto md:overflow-visible lg:overflow-visible">

            <table  class="w-full">
                <thead>
                    <tr class="bg-[#30a63a] h-[50px] ">
                        <th class="w-[100px] font-signika font-semibold text-white text-[14px] text-start p-[10px] rounded-tl-xl">No</th>
                        <th class="w-[150.6px] font-signika font-semibold text-white text-[14px] text-start p-[10px]">Thumbnail Berita</th>
                        <th class="w-[211.6px] font-signika font-semibold text-white text-[14px] text-start p-[10px]">Judul</th>
                        <th class="w-[100px] font-signika font-semibold text-white text-[14px] text-start p-[10px]">Kategori</th>
                        <th class="w-[211px] font-signika font-semibold text-white text-[14px] text-start p-[10px]">Deskripsi</th>
                        <th class="w-[100.6px] font-signika font-semibold text-white text-[14px] text-start p-[10px] rounded-tr-xl">Aksi</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $new )
                    <tr>
                        <td class="border text-center w-[100px] p-[10px] font-signika font-light text-[14px] lg:min-h-20 lg:max-h-20 md:min-h-20 md:max-h-20 sm:min-h-[69px] sm:max-h-[69px]">{{ $loop->iteration }}</td>
                        <td class="border lg:min-h-20 lg:max-h-20 md:min-h-20 md:max-h-20 sm:min-h-[69px] sm:max-h-[69px]  w-[150.6px] p-[10px] font-signika font-light lg:text-[14px] md:text-[14px] sm:text-xs "><img class="w-12 h-12 rounded-xl" src="{{ Storage::url($new->thumbnail) }}" alt=""></td>
                        <td class="border lg:min-h-20 lg:max-h-20 md:min-h-20 md:max-h-20 sm:min-h-[69px] sm:max-h-[69px] w-full p-[10px] font-signika font-light lg:text-[14px] md:text-[14px] sm:text-xs lg:line-clamp-none md:line-clamp-none sm:line-clamp-4">{{ $new->title }}</td>
                        <td class="border lg:min-h-20 lg:max-h-20 md:min-h-20 md:max-h-20 sm:min-h-[69px] sm:max-h-[69px] w-[100px] p-[10px] font-signika font-light  lg:text-[14px] md:text-[14px] sm:text-xs pl-[20px] ">{{ $new->category->name }}</td>
                        <td class="border w-full lg:min-h-20 lg:max-h-20 md:min-h-20 md:max-h-20 sm:min-h-[69px] sm:max-h-[69px] pt-[10px] font-signika font-light  lg:text-[14px] md:text-[14px] sm:text-xs pl-[10px] lg:line-clamp-3 md:line-clamp-3 sm:line-clamp-4">{!! $new->description !!}</td>
                        <td class="border w-[100.6px] p-[10px] font-signika font-light text-[14px] lg:pl-[20px] md:pl-[20px]">

                            <div class="flex gap-3">
                                <a href="{{ route('admin.news.edit', $new) }}" class=" flex justify-center items-center sm:w-8 sm:h-8 lg:w-10 lg:h-10 md:w-10 md:h-10 bg-sky-500 rounded-xl text-[1.2rem]"><i class="fa-solid fa-square-pen"></i></a>
                                <form action="{{ route('admin.news.destroy',$new) }}"  method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                
                            <button type="button" class="delete-button flex justify-center items-center sm:w-8 sm:h-8 lg:w-10 lg:h-10 md:w-10 md:h-10 bg-red-400 rounded-xl text-[1.2rem]">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                            </div>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6"><p class="font-bold text-center text-2xl mt-4">Berita Belum tersedia</p></td>
                    </tr>
                    @endforelse
                
                </tbody>
            </table>

            <div class="mt-4">
                {{ $news->links() }}
            </div>

        </div>

    </div>

</div>
@endsection