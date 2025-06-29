@extends('admin.main.index')

@section('content')
<div class="lg:w-[77.5%] sm:w-full md:w-full lg:h-full overflow-hidden">

<!-- header -->
   <div class="lg:mt-2 md:mt-28 sm:mt-28 sm:w-full md:w-full mb-3 lg:w-full h-[85px] flex justify-between mt-4 rounded-xl bg-[#FFFFFF] py-3 px-5 lg:max-w-[1345px] overflow-hidden">
        <p class="font-signika  lg:text-[20px] md:text-[20px] sm:text-xs lg:mr-[200px] md:mr-[200px] sm:mr-[200px]  lg:w-full  font-semibold my-auto">Halo {{ auth()->user()->name }}</p>

        
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

    <div class="min-h-[1200px] lg:max-w-[1345px]  w-full  bg-[#FFFFFF] mt-3 rounded-xl p-[20px] overflow-y-scroll overflow-hidden">
        <p class="font-signika font-medium  text-[24px]">PPDB</p>
        @if (session()->has('SuccessUpdate'))
        <div id="message" class="w-full h-[70px] bg-[#30a63a] rounded-xl flex px-[20px] mt-3 pt-2">       
            <div>
                <p class="font-signika font-semibold text-[20px] text-white">Berhasil</p>
                <p class="font-signika font-semibold text-white">{{ session('SuccessUpdate') }}</p>
            </div>
        </div>
         @endif

        @if (session()->has('FailedUpdate'))
            <div id="message" class="w-full h-[70px] bg-[#FFF3E8] rounded-xl flex px-[20px] mt-3 pt-2">       
                <div>
                    <p class="font-signika font-semibold text-[20px] text-white">Gagal</p>
                    <p class="font-signika font-semibold text-white">{{ session('FailedUpdate') }}</p>
                </div>
            </div>
        @endif

        <div class="form mt-28 mb-5 w-full flex justify-between">
            @if (!$student->previousSchool || !$student->custodian || $student->attachment ?? collect()->isEmpty())
                <div class="">
                    <p class="font-medium mb-3 text-xl text-gray-600">Status</p>
                    <p class="px-3 py-3 text-white font-bold rounded-xl bg-red-600">Belum Lengkap</p>
                </div>
                @else
                
                <div class="flex lg:flex-nowrap md:flex-nowrap sm:flex-wrap">
                    <div class="mt-[-40px] mr-3">
                        <p class="font-medium mb-3 text-xl text-gray-600">Status</p>
                        <p class="px-3 py-3 text-white font-bold rounded-xl bg-green-500 ">Lengkap</p>
                    </div>
                    <div class="lg:mt-[-35px] md:mt-[-35px] sm:mt-5">
                        <div class="mb-3">
                            <p class="font-bold text-gray-600">Catatan* Perbaiki data apabila terdapat kesalahan saat mengisi data</p>
                        </div>
                        <div class="flex w-full gap-2">
                            <a href="{{ route('student.edit-school', $student) }}" class="lg:px-3 lg:py-3 md:px-3 md:py-3 sm:px-3 sm:py-1 h-12 w-fit text-sm rounded-xl text-white font-semibold bg-[#0c720f] block">Update Sekolah</a>
                            <a href="{{ route('student.edit.wali', $student) }}" class="lg:px-3 lg:py-3 md:px-3 md:py-3 sm:px-3 sm:py-1 h-12 text-sm rounded-xl text-white font-semibold bg-[#0c720f] block">Update Wali</a>
                            <a href="{{ route('student.edit.student', $student) }}" class="lg:px-3 lg:py-3 md:px-3 md:py-3 sm:px-3 sm:py-1 h-12 text-sm rounded-xl text-white font-semibold bg-[#0c720f] block">Update Siswa</a>
                            <a href="{{ route('student.edit.parent',$student) }}" class="lg:px-3 lg:py-3 md:px-3 md:py-3 sm:px-3 sm:py-1 h-12 text-sm rounded-xl text-white font-semibold bg-[#0c720f] block">Update Orang Tua</a>
                        </div>
                       
                    </div>
                </div>
            @endif
            
            @if ($student->previousSchool == null || !$student->custodian || $student->attachment ?? collect()->isEmpty())
                <a href="{{ route('student.ppdb.create') }}" class="px-3 py-3 h-12 rounded-xl text-white font-semibold bg-[#0c720f] block">Lengkapi Data</a>

                @else
                <a href="{{ route('student.download', $student->id) }}" class="sm:px-4 sm:py-3 lg:px-3 lg:py-3 md:px-3 md:py-3 h-12 lg:ml-0 md:ml-0 sm:ml-[-90px] rounded-xl text-white font-semibold bg-[#0c720f] block">Download <i class="sm:hidden fa-solid fa-file-arrow-down"></i></a>

            @endif
        </div>

        <div class=" w-full h-[200px] mt-4 ">
            <div class="flex sm:flex-wrap md:flex-nowrap gap-3 w-full">

                <div class="lg:w-[20%] md:w-[20%] sm:w-full md:mr-10 lg:mr-0">
                    <div class="border-2  rounded-xl w-[200px] h-[220px]">
                        @if (empty($student->student_photo))
                            <p class="font-semibold text-center mt-11"><i class="fa-solid fa-image"></i> Belum Tersedia</p>
                          @else
                          <img  src="{{ Storage::url($student->student_photo) }}" alt="User Profile" class="shadow-xl  rounded-xl w-[200px] h-[220px]">
  
                        @endif
                    </div>
                </div>

                <div class="lg:w-[60%] md:w-[60%] px-3 py-3 border rounded-xl">
                    <div class="w-full">
                        <p class="text-xl font-medium mb-2 text-gray-500">Biodata Calon Siswa</p>

                        <div class="w-full h-10 mb-4 rounded-xl bg-[#F5F6F9] border py-1 px-4 flex items-center">
                            <p class="text-[16px] font-medium">{{ $student->fullname }}</p>
                        </div>
                        <div class="w-full h-10 mb-4 rounded-xl bg-[#F5F6F9] border py-1 px-4 flex items-center">
                            <p class="text-[16px] font-medium">{{ $student->place_of_birth }}, {{ $student->date_of_birth }}</p>
                        </div>
                        <div class="w-full h-10 mb-4 rounded-xl bg-[#F5F6F9] border py-1 px-4 flex items-center">
                            <p class="text-[16px] font-medium">{{ $student->gender }}</p>
                        </div>
                        <div class="w-full h-10 mb-4 rounded-xl bg-[#F5F6F9] border py-1 px-4 flex items-center">
                            <p class="text-[16px] font-medium">{{ $student->religion }}</p>
                        </div>
                        <div class="w-full h-10 mb-4 rounded-xl bg-[#F5F6F9] border py-1 px-4 flex items-center">
                            <p class="text-[16px] font-medium">{{ $student->nik }}</p>
                        </div>
                        <div class="w-full h-10 mb-4 rounded-xl bg-[#F5F6F9] border py-1 px-4 flex items-center">
                            <p class="text-[16px] font-medium">{{ $student->nisn }}</p>
                        </div>
                        <div class="w-full h-28 mb-4 rounded-xl bg-[#F5F6F9] border py-1 px-4 flex items-start">
                            <p class="text-[16px] font-medium">{{$student->address}}</p>
                        </div>

                    </div>
                    <div class="w-full">
                        <p class="text-xl font-medium mb-2 text-gray-500">Sekolah Asal</p>

                        <div class="w-full h-10 mb-4 rounded-xl bg-[#F5F6F9] border py-1 px-4 flex items-center">
                            <p class="text-[16px] font-medium">{{ $student->previousSchool ? $student->previousSchool->shcool_name : 'Belum Ada' }}</p>
                        </div>
                        <div class="w-full h-10 mb-4 rounded-xl bg-[#F5F6F9] border py-1 px-4 flex items-center">
                            <p class="text-[16px] font-medium">{{ $student->previousSchool ? $student->previousSchool->graduation_year : 'Belum Ada' }}</p>
                        </div>
                       
                        <div class="w-full h-28 mb-4 rounded-xl bg-[#F5F6F9] border py-1 px-4 flex items-start">
                            <p class="text-[16px] font-medium">{{ $student->previousSchool ? $student->previousSchool->address : 'Belum Ada' }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
   

</div>
@endsection