@extends('admin.main.index')

@section('content')
<div class="lg:w-[77.5%] md:w-full lg:h-full sm:w-full overflow-hidden">

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

    <div class=" min-h-screen lg:max-w-[1345px]  w-full  bg-[#FFFFFF] mt-3 rounded-xl p-[20px] overflow-y-scroll overflow-hidden">
                <p class="font-signika font-medium  text-[24px]">Detail Pendaftaran Siswa</p>

                <div class="flex md:flex-nowrap lg:flex-nowrap sm:flex-wrap w-full justify-between">
                    <a href="{{ route('admin.ppdb.index') }}" class="px-3 py-3 w-24 mt-4 h-12 text-center rounded-xl text-white font-semibold bg-[#0c720f] block">Kembali</a>

                @if ($student->student->attactment != null && $student->student->previousSchool != null) 
                <div class="sm:mt-8 md:mt-0 lg:mt-0">
                        <p class="mb-2">Status Penerimaan : <span class="font-bold">{{ $student->student->status }}</span> </p>
                    <div class="flex gap-3">
                     
                        <form action="{{ route('admin.ppdb.student.null', $student->student) }}" method="post">
                            @csrf
                            @method('put')
                                <button type="submit"  class="px-3 py-3 w-28 text-center rounded-xl text-white font-semibold bg-gray-600 block">Null</button>
                        </form>
                        <form action="{{ route('admin.ppdb.student.accepted', $student->student) }}" method="post">
                            @csrf
                            @method('put')
                                <button type="submit"  class="px-3 py-3 w-28 text-center rounded-xl text-white font-semibold bg-green-600 block">Terima</button>
                        </form>
                        <form action="{{ route('admin.ppdb.student.rejected', $student->student) }}" method="post">
                            @csrf
                            @method('put')
                                <button type="submit"  class="px-3 py-3 w-28 text-center rounded-xl text-white font-semibold bg-[#ef2828] block">Tolak</button>
                        </form>
               
                    </div>
                </div>
                @endif
                    
                </div>

                
            <div class="w-full mt-20">
                <p class="font-signika font-medium mb-4 text-[20px]">Biodata Siswa</p>
                <div class="flex md:flex-nowrap lg:flex-nowrap sm:flex-wrap border-b-4 border-black mb-4 gap-8 w-full py-3 ">
                    <div class="img w-36 h-44 rounded-xl">
                        <img class="w-36 h-44 rounded-xl" src="{{ Storage::url($student->student->student_photo) }}" alt="">
                    </div>
                    <div class="lg:w-[35%] md:w-[35%] sm:w-[50%] lg:ml-5  lg:border-r-2 md:border-r-2 ">
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Nama</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->name }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Gender</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->gender }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Tempat Tanggal Lahir</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-sm">{{ $student->student->place_of_birth}}, {{ $student->student->date_of_birth }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Nisn</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->nisn }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">NIK</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->nisn }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Nomor Hp</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->phone }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Alamat</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->address }}</p>
                        </div>
                    </div>
                    <div class="lg:w-[50%] md:w-[50%]">
                        <p class="font-signika mt-[-35px] font-medium mb-2 text-[20px]">Orang Tua Siswa</p>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Nama Ayah</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->studentParent->father_name }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Pekerjaan Ayah</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->studentParent->father_job }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Nama Ibu</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->studentParent->mother_name }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Pekerjaan Ibu</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->studentParent->mother_job }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Nomor HP</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->studentParent->phone}}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Penghasilan Kedua Orang tua</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">Rp. {{ number_format($student->student->studentParent->parent_income, 0, ',', '.') }}</p>
                        </div>

                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Alamat</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->studentParent->address }}</p>
                        </div>

                        

                    </div>
                    
                </div>

                <p class="font-signika font-medium mb-4 text-[20px]">Wali Siswa</p>

                <div class="flex md:flex-nowrap lg:flex-nowrap sm:flex-wrap border-b-4 gap-8 w-full py-3 ">
                    <div class="sm:w-[100%] sm:border-b-2 sm:mb-3 md:mb-0 lg:mb-0 lg:w-[45%] lg:border-r-2 md:w-[45%] md:border-r-2 ">
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Nama</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->custodian->name }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Nomor HP</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->custodian->name }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Nomor HP</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->custodian->phone }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Pekerjaan</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->custodian->custodian_job }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Penghasilan</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">Rp. {{ number_format($student->student->custodian->custodian_income, 0, ',', '.') }}</p>
                        </div>
                        <div class="mb-2">
                            <h2 class="font-medium text-lg text-gray-500">Alamat</h2>
                            <p class="font-bold lg:text-xl md:text-xl sm:text-lg">{{ $student->student->custodian->address }} </p>
                        </div>
                    </div>
                    <div class="">
                        <p class="font-signika mt-[-35px] font-medium mb-2 text-[20px]">Lampiran Berkas</p>

                        <div class="flex gap-3">
                            <div class="lg:w-[200px] lg:h-[200px] md:w-[200px] md:h-[200px] sm:w-[180px] sm:h-[180px] rounded-xl border">
                                @if ($student->student?->attactment?->family_card === null)
                                <p class="text-center font-semibold">Belum Ada</p>
                                @else
                                <a href="{{ Storage::url($student->student->attactment->family_card) }}" target="_blank">
                                    <img src="{{ Storage::url($student->student->attactment->family_card) }}" alt="" class="lg:w-[200px] lg:h-[200px] md:w-[200px] md:h-[200px] sm:w-[180px] sm:h-[180px] rounded-xl">
                                </a>
                                @endif
                                
                            </div>
                            <div class="lg:w-[200px] lg:h-[200px] md:w-[200px] md:h-[200px] sm:w-[180px] sm:h-[180px] rounded-xl border">
                                @if ($student->student?->attactment?->birth_certificate === null)
                                <p class="text-center font-semibold">Belum Ada</p>
                                @else
                                <a href="{{ Storage::url($student->student->attactment->birth_certificate) }}" target="_blank">
                                    <img src="{{ Storage::url($student->student->attactment->birth_certificate) }}" alt="" class="lg:w-[200px] lg:h-[200px] md:w-[200px] md:h-[200px] sm:w-[180px] sm:h-[180px] rounded-xl">
                                </a>
                                @endif
                               
                            </div>
                        </div>
                        <div class="flex gap-3 mt-3">
                            <div class="lg:w-[200px] lg:h-[200px] md:w-[200px] md:h-[200px] sm:w-[180px] sm:h-[180px] rounded-xl border">
                                @if ($student->student?->attactment?->pip_card === null)
                                
                                <p class="text-center font-semibold">Belum Ada</p>
                                @else
                                <a href="{{ Storage::url($student->student->attactment->pip_card) }}" target="_blank">
                                    <img src="{{ Storage::url($student->student->attactment->pip_card) }}" alt="" class="lg:w-[200px] lg:h-[200px] md:w-[200px] md:h-[200px] sm:w-[180px] sm:h-[180px] rounded-xl">
                                </a>
                                @endif
                                </div>
                                <div class="lg:w-[200px] lg:h-[200px] md:w-[200px] md:h-[200px] sm:w-[180px] sm:h-[180px] rounded-xl border">
                                    @if ($student->student?->attactment?->school_certificate === null)
                                    <p class="text-center font-semibold">Belum Ada</p>
                                    @else
                                    <a href="{{ Storage::url($student->student->attactment->school_certificate) }}" target="_blank">
                                        <img src="{{ Storage::url($student->student->attactment->school_certificate) }}" alt="" class="lg:w-[200px] lg:h-[200px] md:w-[200px] md:h-[200px] sm:w-[180px] sm:h-[180px] rounded-xl">
                                    </a>  
                                    @endif
                                </div>
                        </div>
                      
                        
                    </div>
                </div> 
            </div>
    </div>

</div>
@endsection