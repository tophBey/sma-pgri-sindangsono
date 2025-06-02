@extends('admin.main.index')

@section('content')
<div class="lg:w-[77.5%] lg:h-full md:w-full overflow-hidden">

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
        <p class="font-signika font-medium text-[24px]">Update Gelar</p>

        <div class="form mt-5 mb-5 w-full h-[47px] flex justify-end">
            <a href="{{ route('admin.degree.index') }}" class="px-3 py-3 rounded-xl text-white font-semibold bg-[#0c720f] block">Kembali</a>
        </div>

    <form action="{{ route('admin.degree.update', $degree ) }}" method="post">
        @csrf
        @method('put')
            <div class="w-full  flex flex-col justify-between mt-3">
                <div class="w-full mb-5">
                    <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Nama Gelar</p>
                    <input name="name" type="text" value="{{ $degree->name }}" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Nama Gelar" required>
                    @error('name')
                        <span class="text-red-500 mt-1 font-semibold ml-6 block py-1 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full flex h-[80px] justify-end mt-3">
                    <button class="px-4 w-[120px] h-[45px] font-semibold text-white py-2 rounded-xl bg-[#0c720f]" type="submit">Update</button>
                </div>                        
            </div>
    </form>

    </div>

</div>
@endsection