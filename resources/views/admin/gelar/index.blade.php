@extends('admin.main.index')

@section('content')
<div class="lg:w-[77.5%] lg:h-full md:w-full sm:w-full overflow-hidden">

           <!-- header -->
            <div class="lg:mt-2 md:mt-28 sm:mt-28 sm:w-full md:w-full mb-3 lg:w-full h-[85px] flex justify-between mt-4 rounded-xl bg-[#FFFFFF] py-3 px-5 lg:max-w-[1345px] overflow-hidden">
                <p class="font-signika  lg:text-[20px] md:text-[20px] lg:mr-[200px] md:mr-[200px] sm:mr-[200px]  lg:w-full  font-semibold my-auto">Gelar</p>

                
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

            <div class=" min-h-screen lg:max-w-[1345px]  w-full  bg-[#FFFFFF] mt-3 rounded-xl p-[20px] overflow-y-scroll overflow-hidden">
                <p class="font-signika font-medium text-[24px]">List Gelar</p>

                @if (session()->has('successDegree'))
                <div id="message" class="w-full h-[70px] bg-[#30a63a] rounded-xl flex px-[20px] mt-3 pt-2">       
                    <div>
                        <p class="font-signika font-semibold text-[20px] text-white">Berhasil</p>
                        <p class="font-signika font-semibold text-white">{{ session('successDegree') }}</p>
                    </div>
                </div>
                 @endif

                @if (session()->has('FailedDegree'))
                    <div id="message" class="w-full h-[70px] bg-[#FFF3E8] rounded-xl flex px-[20px] mt-3 pt-2">       
                        <div>
                            <p class="font-signika font-semibold text-[20px] text-white">Gagal</p>
                            <p class="font-signika font-semibold text-white">{{ session('FailedDegree') }}</p>
                        </div>
                    </div>
                @endif

                <div class="w-full flex mt-8">
                    <div class="lg:w-[55%] md:w-[55%] sm:w-[95%]">
                        <form action="" method="get" class="flex gap-4">
                            <div class="w-[55%] mb-5">
                                <input name="search" value="{{ request('search') }}" type="text" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[44px]  rounded-xl pl-[20px] bg-[#FAFAFA]" autocomplete="off" placeholder="Cari Gelar">
                            </div>
                            <div class="">
                                <button class="font-semibold text-white rounded-xl text-xl px-4 py-2 h-[44px] bg-[#0c720f]">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="form mt-5 mb-5 w-full h-[47px] flex justify-end">
                    <a href="{{ route('admin.degree.create') }}" class="px-3 py-3 rounded-xl text-white font-semibold bg-[#0c720f] block">Tambah Gelar</a>
                </div>

                <div class=" w-full  mt-4 sm:overflow-x-auto md:overflow-visible lg:overflow-visible">

                    <table  class="w-full">
                        <thead>
                            <tr class="bg-[#30a63a] h-[50px] ">
                                <th class="w-[100px] font-signika font-semibold text-[14px] text-white text-start p-[10px] rounded-tl-xl">No</th>
                                <th class="w-[211.6px] font-signika font-semibold text-[14px] text-white text-start p-[10px]">Nama Gelar</th>
                                <th class="w-[100px] font-signika font-semibold text-[14px] text-white text-start p-[10px] rounded-tr-xl">Aksi</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($degress as $degree )
                            <tr>
                                <td class="border text-center w-[100px] p-[10px] font-signika font-light text-[14px]">{{ $loop->iteration }}</td>
                                <td class="border w-[211.6px] p-[10px] font-signika font-light text-[14px]">{{ strtoupper($degree->name) }}</td>
                                <td class="border w-[211.6px] p-[10px] font-signika font-light text-[14px] pl-[20px]">

                                    <div class="flex gap-3">
                                        <a href="{{ route('admin.degree.edit',$degree) }}" class=" flex justify-center items-center w-10 h-10 bg-sky-500 rounded-xl text-[1.2rem]"><i class="fa-solid fa-square-pen"></i></a>
                                        <form action="{{ route('admin.degree.destroy',$degree) }}"  method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="delete-button flex justify-center items-center w-10 h-10 bg-red-400 rounded-xl text-[1.2rem]">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                   </form>
                                    </div>

                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="3"><p class="font-bold text-center text-2xl mt-4">Gelar Belum tersedia</p></td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $degress->links() }}
                    </div>
                </div>
            </div>

</div>
@endsection