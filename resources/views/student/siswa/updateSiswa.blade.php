@extends('admin.main.index')

@section('content')
<div class="lg:w-[77.5%] sm:w-full md:w-full lg:h-full overflow-hidden">

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

<div class=" min-h-[1050px] lg:max-w-[1345px]  w-full  bg-[#FFFFFF] mt-3 rounded-xl p-[20px] overflow-y-scroll overflow-hidden">
    <p class="font-signika font-medium text-[24px]">Update Murid</p>

    <div class="form mt-5 mb-5 w-full h-[47px] flex justify-end">
        <a href="{{ route('student.ppdb.index') }}" class="px-3 py-3 rounded-xl text-white font-semibold bg-[#0c720f] block">Kembali</a>
    </div>
    @if ($errors->any())
        <div class="text-red-400">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   <form action="{{ route('student.update.student', $student) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
        <div class="w-full flex flex-col justify-between mt-3">
            <div class="w-full mb-5">
                <p class="font-signika font-medium  text-[#222831] mb-2">Nama Murid</p>
                <input name="fullname" value="{{ $student->fullname }}" type="text" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Nama Wali" required>
                @error('name')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full mb-5">
                <p class="font-signika font-medium  text-[#222831] mb-2">Foto Murid</p>

                <img src="{{Storage::url($student->student_photo)}}" alt="" class="rounded d-block mb-3 h-[120px]" width="120" height="80">

                <input type="hidden" name="oldImage" value="{{ $student->student_photo }}">
                <input name="student_photo" value="" type="file" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pl-[20px] py-3 bg-[#FAFAFA]">
                @error('name')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full mb-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Jenis Kelamin</p>
                <select name="gender" id="" class="w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pt-1  pl-[20px] bg-[#FAFAFA]">
                    <option value="" >Pilih Kelamin</option>
                    <option value="Laki-laki" {{ old('gender', $student->gender ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Wanita" {{ old('gender', $student->gender ?? '') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                </select>

                @error('gender')
                   <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full mb-5">
                <p class="font-signika font-medium  text-[#222831] mb-2">NIK</p>
                <input name="nik" value="{{ $student->nik }}" type="number" min="0" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan nik KTP" required>
                @error('nik')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
           
            <div class="w-full">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">NISN</p>
                <input value="{{ $student->nisn }}" name="nisn"  type="number" min="0" class=" focus:outline-none w-full border focus:ring-4 focus:border-none pr-3 focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan NISN" required>
                @error('nisn')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full mb-5 mt-5">
                <p class="font-signika font-medium  text-[#222831] mb-2">Tempat Lahir</p>
                <input name="place_of_birth" value="{{ $student->place_of_birth }}" type="text" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Tempat Lahir" required>
                @error('place_of_birth')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full mb-5">
                <p class="font-signika font-medium  text-[#222831] mb-2">Tanggal Lahir</p>
                <input name="date_of_birth" value="{{ $student->date_of_birth }}" type="date" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Tempat Lahir" required>
                @error('date_of_birth')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full mb-5">
                <p class="font-signika font-medium  text-[#222831] mb-2">Nomor Telepon</p>
                <input name="phone" value="{{ $student->phone }}" type="number" min="0" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Tempat Lahir" required>
                @error('phone')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class=" w-full">
                <p class="font-signika font-medium mb-2">Alamat</p>
                <div class="w-full ">
                   <textarea  name="address" id="" cols="30" rows="10" class="focus:outline-none min-h-[130px] focus:ring focus:ring-[#0c720f] w-full h-[90px] rounded-xl pl-[20px] bg-[#FAFAFA] border pt-[10px]" placeholder="Alamat Siswa" required>{{ $student->address }}</textarea>
                   @error('address')
                        <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="w-full flex h-[80px] justify-end mt-3">
                <button class="px-4 w-[120px] h-[45px] font-semibold text-white py-2 rounded-xl bg-[#0c720f]" type="submit">Update</button>
            </div>        
        </div>
   </form>

</div>

</div>
@endsection