<form action="{{ route('ppdb.store') }}" class="mt-4 h-auto" method="post">
                @csrf

    <div class="w-full flex justify-between flex-wrap ">

        <div class="lg:w-[46%] md:w-[46%] lg:mx-0 md:mx-0 sm:w-full sm:mx-auto sm:border md:border-none border-black px-3 py-2 mb-5 shadow-inner rounded-xl">
            <h2 class="text-xl text-gray-600 font-semibold">Identitas Calon Peserta Didik</h2>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Nama Lengkap</p>
                <input name="fullname" value="{{old('fullname')}}" type="text" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Nama Lengkap Anda" required>
                @error('fullname')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">NIK</p>
                <input name="nik" value="{{old('nik')}}" min="0" type="number" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Nomor Induk Kependudukan " required>
                @error('nik')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">NISN</p>
                <input name="nisn" value="{{old('nisn')}}" type="number" min="0" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Nomor Induk Siswa Nasional " required>
                    @error('nisn')
                        <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                    @enderror
            </div>
            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Agama</p>
                <input name="religion" value="{{old('religion')}}" type="text"  class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Agama" required>
                    @error('religion')
                        <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                    @enderror
            </div>
            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Tempat Lahir</p>
                <input name="place_of_birth" value="{{old('place_of_birth')}}"  type="text" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Tempat Lahir" required>
                @error('place_of_birth')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Tanggal Lahir</p>
                <input name="date_of_birth"  value="{{old('date_of_birth')}}" type="date" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none pr-3 focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" required>
                @error('date_of_birth')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Jenis Kelamin</p>
                <select name="gender" id="" class="w-full border  focus:ring focus:ring-[#0c720f]  h-[55px]  border-black rounded-xl pt-1  pl-[20px] bg-[#FAFAFA]">
                   <option value="" {{ old('gender') == '' ? 'selected' : '' }}>Pilih Kelamin</option>
                   <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                   <option value="Wanita" {{ old('gender') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                </select>

                @error('gender')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">No Handphone</p>
                <input name="phone" value="{{old('phone')}}" type="number" min="0" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none pr-3 focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan nomor telepon" required>
                @error('phone')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Alamat</p>
                <textarea value="{{old('address')}}" name="address" id="" cols="30" rows="10" class="focus:outline-none border border-black min-h-[130px] focus:ring-4 focus:border-none focus:ring-[#0c720f] w-full h-[90px] rounded-xl pl-[20px] bg-[#FAFAFA] pt-[10px]" placeholder="Alamat Lengkap Siswa" required>{{old('address')}}</textarea>
                @error('address')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="lg:w-[46%] md:w-[46%] lg:mx-0 md:mx-0 sm:w-full sm:mx-auto sm:border md:border-none border-black px-3 shadow-inner rounded-xl py-2">
            <h2 class="text-xl text-gray-600 font-semibold">Identitas Orang Tua</h2>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Nama Ayah</p>
                <input value="{{old('father_name')}}" name="father_name"  type="text" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Nama Lengkap Anda" required>
                @error('father_name')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Pekerjaan Ayah</p>
                <input name="father_job" value="{{old('father_job')}}" type="text" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Pekerjaan Ayah" required>
                @error('father_job')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Nama Ibu</p>
                    <input name="mother_name" value="{{old('mother_name')}}" type="text" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Nama Lengkap Anda" required>
                    @error('mother_name')
                        <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                    @enderror
            </div>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Pekerjaan Ibu</p>
                <input name="mother_job" value="{{old('mother_job')}}" type="text" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f] h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Pekerjaan Ibu" required>
                @error('mother_job')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Penghasilan Orang Tua</p>
                <select name="parent_income" id="" class="w-full border border-black  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pt-1  pl-[20px] bg-[#FAFAFA]" required>
                    <option value="" {{ old('parent_income') == '' ? 'selected' : '' }}>Pilih Penghasilan</option>
                    <option value="1000000" {{ old('parent_income') == '1000000' ? 'selected' : '' }}>Rp 1.000.000</option>
                    <option value="2000000" {{ old('parent_income') == '2000000' ? 'selected' : '' }}>Rp 2.000.000</option>
                    <option value="3000000" {{ old('parent_income') == '3000000' ? 'selected' : '' }}>Rp 3.000.000</option>
                    <option value="4000000" {{ old('parent_income') == '4000000' ? 'selected' : '' }}>Rp 4.000.000</option>
                    <option value="5000000" {{ old('parent_income') == '5000000' ? 'selected' : '' }}>Rp 5.000.000</option>
                </select>

                @error('parent_income')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror

            </div>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">No Handphone Orang Tua</p>
                <input name="parent_phone" min="0" value="{{old('parent_phone')}}" type="number" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none pr-3 focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan nomor telepon" required>
                @error('parent_phone')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Alamat</p>
                <textarea value="{{old('parent_address')}}" name="parent_address" id="" cols="30" rows="10" class="focus:outline-none border border-black min-h-[130px] focus:ring-4 focus:border-none focus:ring-[#0c720f] w-full h-[90px] rounded-xl pl-[20px] bg-[#FAFAFA] pt-[10px]" placeholder="Alamat Lengkap Orang Tua" required>{{old('parent_address')}}</textarea>
                @error('parent_address')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
                    
        </div>

        <div class="lg:w-[46%] md:w-[46%] lg:mx-0 md:mx-0 sm:w-full sm:mx-auto sm:border md:border-none border-black px-3 py-2 shadow-inner rounded-xl sm:mt-5 md:mt-0 lg:mt-0">
            <h2 class="text-xl text-gray-600 font-semibold">Identitas Wali</h2>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Nama Wali</p>
                <input value="{{old('custodian_name')}}" name="custodian_name" type="text" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Nama Lengkap Anda" required>
                @error('custodian_name')
                <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Pekerjaan Wali</p>
                <input value="{{old('custodian_job')}}" name="custodian_job" type="text" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Pekerjaan orang wali" required>
                @error('custodian_job')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Penghasilan Wali</p>
                <select name="custodian_income" id="" class="w-full border border-black  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pt-1  pl-[20px] bg-[#FAFAFA]" required>
                    <option value="" {{ old('custodian_income') == '' ? 'selected' : '' }}>Pilih Penghasilan</option>
                    <option value="1000000" {{ old('custodian_income') == '1000000' ? 'selected' : '' }}>Rp 1.000.000</option>
                    <option value="2000000" {{ old('custodian_income') == '2000000' ? 'selected' : '' }}>Rp 2.000.000</option>
                    <option value="3000000" {{ old('custodian_income') == '3000000' ? 'selected' : '' }}>Rp 3.000.000</option>
                    <option value="4000000" {{ old('custodian_income') == '4000000' ? 'selected' : '' }}>Rp 4.000.000</option>
                    <option value="5000000" {{ old('custodian_income') == '5000000' ? 'selected' : '' }}>Rp 5.000.000</option>          
                </select>
                @error('custodian_income')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">No Handphone Wali</p>
                <input value="{{old('custodian_phone')}}" name="custodian_phone" min="0"  type="number" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none pr-3 focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan nomor telepon" required>
                @error('custodian_phone')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full  mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Alamat</p>
                <textarea value="{{old('custodian_address')}}" name="custodian_address" id="" cols="30" rows="10" class="focus:outline-none border border-black min-h-[130px] focus:ring-4 focus:border-none focus:ring-[#0c720f] w-full h-[90px] rounded-xl pl-[20px] bg-[#FAFAFA] pt-[10px]" placeholder="Alamat Lengkap Wali" required>{{old('custodian_address')}}</textarea>
                @error('custodian_address')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
                    
        </div>

        <div class="lg:w-[46%] md:w-[46%] lg:mx-0 md:mx-0 sm:w-full sm:mx-auto sm:border md:border-none border-black px-3 py-2 shadow-inner rounded-xl sm:mt-5 md:mt-0 lg:mt-0">
            <h2 class="text-xl text-gray-600 font-semibold">Portal Calon Siswa</h2>
            <p class="mt-3">Registrasi Akun calon siswa</p>

            <div class="w-full mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Email</p>
                <input value="{{old('email')}}" name="email" type="email" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Email" required>
                 @error('email')
                     <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Password</p>
                <input name="password" type="password" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan password" required>
                @error('password')
                    <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mt-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Konfirmasi Password</p>
                <input name="password_confirmation" type="password" class=" focus:outline-none w-full border border-black focus:ring-4 focus:border-none focus:ring-[#0c720f]   h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Konfirmasi password" required>
                @error('password')
                <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
                
        <div class="w-full mt-24">
                <button type="submit" class="w-full cursor-pointer font-semibold text-xl py-3 px-3 bg-gradient-to-r from-[#0c720f] to-[#3ccd41] text-white rounded-xl">Kirim Pendaftaran</button>
        </div>

     </div>
</form>