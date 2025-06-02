@extends('admin.main.index')

@section('content')
<div class="lg:w-[77.5%] lg:h-full md:w-full overflow-hidden">

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

<div class=" min-h-[1250px] lg:max-w-[1345px]  w-full  bg-[#FFFFFF] mt-3 rounded-xl p-[20px] overflow-y-scroll overflow-hidden">
    <p class="font-signika font-medium text-[24px]">Identitas Sekolah Asal</p>

    <div class="form mt-5 mb-5 w-full h-[47px] flex justify-end">
        <a href="{{ route('student.ppdb.index') }}" class="px-3 py-3 rounded-xl text-white font-semibold bg-[#0c720f] block">Kembali</a>
    </div>
    <!-- @if ($errors->any())
        <div class="text-red-400">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->

   <form action="{{ route('student.ppdb.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="w-full flex flex-col justify-between mt-3">
            <div class="w-full mb-5">
                <p class="font-signika font-medium  text-[#222831] mb-2">Sekolah Asal</p>
                <input name="shcool_name" value="{{ old('shcool_name') }}" type="text" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Sekolah Asal" required>
                @error('shcool_name')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5">
                <p class="font-signika font-medium  text-[#222831] mb-2">Tahun Lulus</p>
                <input name="graduation_year" value="{{ old('graduation_year') }}" type="number" min="2000" max="2099" step="1"  class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Tahun lulus sekolah"  required>
                @error('graduation_year')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class=" w-full mt-4">
                <p class="font-signika font-medium mb-2">Alamat Sekolah</p>
                <div class="w-full ">
                   <textarea  name="address" id="" cols="30" rows="10" class="focus:outline-none min-h-[130px] focus:ring focus:ring-[#0c720f] w-full h-[90px] rounded-xl pl-[20px] bg-[#FAFAFA] border pt-[10px]" placeholder="Alamat Sekolah" required>{{ old('address') }}</textarea>
                   @error('address')
                        <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <p class="font-signika font-medium mt-8 text-[24px]">Lampiran Berkas</p>
            <p class="font-medium text-xl mt-2 text-gray-500">File berupa foto dengan format PNG, JPG, JPEG, dengan maksimal ukuran 2 MB</p>
            <div class="w-full mb-5 mt-5">
                <p class="font-signika font-medium  text-[#222831] mb-2">Foto Siswa</p>
                <input name="student_photo" type="file" min="1900"  class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] py-3 rounded-xl pl-[20px] bg-[#FAFAFA]"required>
                @error('student_photo')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5 mt-3">
                <p class="font-signika font-medium  text-[#222831] mb-2">Foto Kartu Keluarga (KK)</p>
                <input name="family_card" type="file" min="1900"  class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] py-3 rounded-xl pl-[20px] bg-[#FAFAFA]"required>
                @error('family_card')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5 mt-3">
                <p class="font-signika font-medium  text-[#222831] mb-2">Foto Akte Kelahiran</p>
                <input name="birth_certificate" type="file" min="1900"  class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] py-3 rounded-xl pl-[20px] bg-[#FAFAFA]"required>
                @error('birth_certificate')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5 mt-3">
                <p class="font-signika font-medium  text-[#222831] mb-2">Foto Ijazah (Smp/Mts) / SKL</p>
                <input name="school_certificate" type="file" min="1900"  class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] py-3 rounded-xl pl-[20px] bg-[#FAFAFA]"required>
                @error('school_certificate')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5 mt-3">
                <p class="font-signika font-medium  text-[#222831] mb-2">Foto Kartu PIP Jika ada*</p>
                <input name="pip_card" type="file" min="1900"  class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] py-3 rounded-xl pl-[20px] bg-[#FAFAFA]">
                @error('pip_card')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full flex h-[80px] justify-end mt-3">
                <button class="px-4 w-[120px] h-[45px] font-semibold text-white py-2 rounded-xl bg-[#0c720f]" type="submit">Submit</button>
            </div>

            
        </div>
   </form>

</div>

</div>
@endsection