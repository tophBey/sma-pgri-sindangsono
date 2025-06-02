@extends('admin.main.index')

@section('content')
<div class="lg:w-[77.5%] md:fw-ull sm:w-full lg:h-full overflow-hidden">

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
    <p class="font-signika font-medium text-[24px]">Update Orang Tua Murid</p>

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

   <form action="{{ route('student.update.parent', $parent) }}" method="post">
    @csrf
    @method('put')
        <div class="w-full flex flex-col justify-between mt-3">
            <div class="w-full mb-5">
                <p class="font-signika font-medium  text-[#222831] mb-2">Nama Ayah</p>
                <input name="father_name" value="{{ $parent->father_name }}" type="text" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Nama ayah" required>
                @error('father_name')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="w-full mb-5">
                <p class="font-signika font-medium  text-[#222831] mb-2">Pekerjaan Ayah</p>
                <input name="father_job" value="{{ $parent->father_job }}" type="text" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Pekerjaan ayah" required>
                @error('faher_job')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5">
                <p class="font-signika font-medium  text-[#222831] mb-2">Nama Ibu</p>
                <input name="mother_name" value="{{ $parent->mother_name }}" type="text" class=" focus:outline-none w-full border focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="masukan nama ibu" required>
                @error('mother_name')
                <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5">
                <p class="font-signika font-medium  text-[#222831] mb-2">Pekerjaan Ibu</p>
                <input name="mother_job" value="{{ $parent->mother_job }}" type="text" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Pekerjaan Ibu" required>
                @error('mother_job')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Penghasilan Orang Tua</p>
                <select name="parent_income" id="" class="w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pt-1  pl-[20px] bg-[#FAFAFA]" required>
                    <option value="" >Pilih Penghasilan</option>
                        <option value="">Pilih Penghasilan</option>
                        <option value="1000000" {{ old('parent_income', $parent->parent_income ?? '') == '1000000' ? 'selected' : '' }}>Rp 1.000.000</option>
                        <option value="2000000" {{ old('parent_income', $parent->parent_income ?? '') == '2000000' ? 'selected' : '' }}>Rp 2.000.000</option>
                        <option value="3000000" {{ old('parent_income', $parent->parent_income ?? '') == '3000000' ? 'selected' : '' }}>Rp 3.000.000</option>
                        <option value="4000000" {{ old('parent_income', $parent->parent_income ?? '') == '4000000' ? 'selected' : '' }}>Rp 4.000.000</option>
                        <option value="5000000" {{ old('parent_income', $parent->parent_income ?? '') == '5000000' ? 'selected' : '' }}>Rp 5.000.000</option>   
                </select>
                    @error('parent_income')
                        <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                    @enderror
            </div>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">No Handphone Orang Tua</p>
                <input value="{{ $parent->phone }}" name="phone" min="0"  type="number" class=" focus:outline-none w-full border focus:ring-4 focus:border-none pr-3 focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan nomor telepon" required>
                @error('phone')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class=" w-full mt-4">
                <p class="font-signika font-medium mb-2">Alamat Orang tua</p>
                <div class="w-full ">
                   <textarea  name="address" id="" cols="30" rows="10" class="focus:outline-none min-h-[130px] focus:ring focus:ring-[#0c720f] w-full h-[90px] rounded-xl pl-[20px] bg-[#FAFAFA] border pt-[10px]" placeholder="Alamat Sekolah" required>{{ $parent->address }}</textarea>
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