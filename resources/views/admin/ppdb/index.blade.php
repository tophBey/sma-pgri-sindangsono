@extends('admin.main.index')

@section('content')
<div class="lg:w-[77.5%] lg:h-full md:w-full sm:w-full overflow-hidden">

            <!-- header -->
           <div class="lg:mt-2 md:mt-28 sm:mt-28 sm:w-full md:w-full mb-3 lg:w-full h-[85px] flex justify-between mt-4 rounded-xl bg-[#FFFFFF] py-3 px-5 lg:max-w-[1345px] overflow-hidden">
                <p class="font-signika  lg:text-[20px] md:text-[20px] lg:mr-[200px] md:mr-[200px] sm:mr-[200px]  lg:w-full  font-semibold my-auto">PPDB</p>

                
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

            <div class=" min-h-screen lg:max-w-[1345px]  w-full  bg-[#FFFFFF] mt-3 rounded-xl p-[20px] overflow-x-scroll overflow-hidden">
                @if (session()->has('successPPDB'))
                    <div id="message" class="w-full h-[70px] bg-[#30a63a] rounded-xl flex px-[20px] mt-3 pt-2">       
                        <div>
                            <p class="font-signika font-semibold text-[20px] text-white">Berhasil</p>
                            <p class="font-signika font-semibold text-white">{{ session('successPPDB') }}</p>
                        </div>
                    </div>
                @endif
    
                @if (session()->has('FailedPPDB'))
                    <div id="message" class="w-full h-[70px] bg-[#FFF3E8] rounded-xl flex px-[20px] mt-3 pt-2">       
                        <div>
                            <p class="font-signika font-semibold text-[20px] text-white">Gagal</p>
                            <p class="font-signika font-semibold text-white">{{ session('FailedPPDB') }}</p>
                        </div>
                    </div>
                @endif
                <div class="flex w-full justify-between">
                    <p class="font-signika font-medium  lg:text-[24px] md:text-[24px] ms:text-sm">List Pendaftaran Siswa</p>
                    <p class="font-signika font-medium lg:text-[24px] md:text-[24px] ms:text-sm">Status Pendaftaran</p>
                </div>


                <div class="w-full flex justify-between mt-8">
                    <div class="lg:w-[55%] md:w-[55%] sm:w-[65%]">
                        <form action="" method="get" class="flex gap-4">
                            <div class="w-[55%] mb-5">
                                <input name="search" value="{{ request('search') }}" type="text" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[44px]  rounded-xl pl-[20px] bg-[#FAFAFA]" autocomplete="off" placeholder="Cari Murid">
                            </div>
                            <div class="">
                                <button class="font-semibold text-white rounded-xl text-xl px-4 py-2 h-[44px] bg-[#0c720f]">Cari</button>
                            </div>
                        </form>
                    </div>

                     <div class=" mb-5   h-[47px] flex  justify-end">

                        <form action="{{ route('admin.ppdb.status.update', $statusRegister->id) }}" method="post">
                            @csrf
                            @method('put')
                            @if($statusRegister->is_open)
                                <button type="submit"  class="lg:px-3 lg:py-3 lg:w-28 md:px-3 md:py-3 md:w-28 sm:px-2 sm:py-2 sm:w-20 text-center rounded-xl text-white font-semibold bg-[#0c720f] block">DiBuka</button>
                                @else
                                <button type="submit"  class="px-3 py-3 w-28 text-center rounded-xl text-white font-semibold bg-[#ef2828] block">Ditutup</button>

                            @endif
                        </form>
                    </div>
                </div>

                <table  class="w-full border mt-12 sm:overflow-x-scroll md:overflow-visible lg:overflow-visible">
                    <thead>
                        <tr class="bg-[#30a63a] h-[50px] ">
                            <th class="w-[100px] font-signika font-semibold text-[14px] text-start text-white p-[10px] rounded-tl-xl">No</th>
                            <th class="w-[211.6px] font-signika font-semibold text-[14px] text-start text-white p-[10px]">Nama Siswa / Siswi</th>
                            <th class="w-[211.6px] font-signika font-semibold text-[14px] text-start text-white p-[10px]">Foto</th>
                            <th class="w-[200.6px] font-signika font-semibold text-[14px] text-start text-white p-[10px]">Status</th>
                            <th class="w-[211.6px] font-signika font-semibold text-[14px] text-start text-white p-[10px]">Status Penerimaan</th>
                            <th class="w-[100px] font-signika font-semibold text-[14px] text-start text-white p-[10px] rounded-tr-xl">Aksi</th>
                        
                        </tr>
                    </thead>
                <tbody>
               
            @forelse ( $students as $user)
                <tr>
                    <td class="border text-center w-[100px] p-[10px] font-signika font-light text-[14px]">{{ $loop->iteration }}</td>
                    <td class="border w-[100px] p-[10px] font-signika font-light text-[14px] pl-[20px]">{{ strtoupper($user->student->fullname) }}</td>
                    <td class="border min-h-20 max-h-20 p-[10px]  font-signika font-light text-[14px] line-clamp-3"><img class="w-12 h-12 rounded-xl mx-auto" src="{{ Storage::url($user->student->student_photo) }}" alt=""></td>
                    <td class="border w-[200.6px] p-[10px] font-signika font-light text-[14px] pl-[20px]">
                        <div class="flex w-full gap-3">
                            @if ($user->student->attactment == null || $user->student->previousSchool == null)
                            <div class="px-3 py-2 bg-red-600 font-semibold text-white rounded-xl">Tidak lengkap</div>
                               @else 
                               <div class="px-3 py-2 bg-green-600 font-bold text-white rounded-xl">Lengkap</div>
                            @endif
                        </div>

                    </td>
                    <td class="border w-[211.6px] p-[10px] font-signika font-light text-[14px] pl-[20px]">
                        <div class="flex w-full gap-3">
                            @if ($user->student->status == null)
                            <div class="px-3 py-2 bg-gray-600 font-semibold text-white rounded-xl">Null</div>
                               @elseif ($user->student->status == 'rejected')
                               <div class="px-3 py-2 bg-red-600 font-bold text-white rounded-xl">Ditolak</div>
                               @elseif ($user->student->status == 'accepted')
                               <div class="px-3 py-2 bg-green-600 font-bold text-white rounded-xl">Diterima</div>
                            @endif
                        </div>

                    </td>
                    <td class="border w-[211.6px] p-[10px] font-signika font-light text-[14px] pl-[20px]">

                        <div class="flex w-full gap-3">
                            <a href="{{ route('admin.ppdb.detail.student', $user) }}" class=" flex justify-center  items-center w-10 h-10 bg-gray-300 rounded-xl text-[1.2rem]"><i class="fa-solid fa-eye"></i></a>

                            <form action="{{ route('admin.ppdb.destroy', $user) }}"  method="post" class="flex w-10 h-10">
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
                     <td colspan="4"><p class="font-bold text-center text-2xl mt-4">Pendaftar Belum tersedia</p></td>
                </tr>
            @endforelse
            </tbody>
                <div class="mt-4">
                {{ $students->links() }}
                </div>
        </table>

            </div>

</div>
@endsection