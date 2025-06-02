@extends('admin.main.index')

@section('content')
<div class="lg:w-[77.5%] md:w-full lg:h-full sm:w-full overflow-hidden">

<!-- header -->
    <div class="lg:mt-0 md:mt-28 mb-3 lg:w-full h-[85px] flex justify-between mt-4 rounded-xl bg-[#FFFFFF] py-3 px-5 lg:max-w-[1345px] overflow-hidden">
        <p class="font-signika text-[20px] mr-[200px] lg:w-full  font-semibold my-auto">Kategori</p>

        
        <div class=" min-w-[250px] flex overflow-hidden">

            @if (auth()->user()->avatar == null)
                        <img src="{{ asset('avatar/default-avatar.jpg') }}" alt="User Profile" class="rounded-full w-[60px] h-[60px] mr-3">
                @else
                    <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="User Profile" class="rounded-full w-[60px] h-[60px] mr-3">
            @endif
            <div class="py-2 w-full">
                    <h3 class=" top-5 right-[20px] text-[18px] font-semibold text-nowrap">{{ auth()->user()->name }}</h3>
                    <p class=" top-12 right-[25px] text-[18px] font-light">{{ auth()->user()->role }}</p>
            </div>
        </div> 
        
    </div>
    <!-- header -->

<div class=" min-h-screen lg:max-w-[1345px]  w-full  bg-[#FFFFFF] mt-3 rounded-xl p-[20px] overflow-y-scroll overflow-hidden">
    <p class="font-signika font-medium text-[24px]">Update Kategori</p>

    <div class="form mt-5 mb-5 w-full h-[47px] flex justify-end">
        <a href="{{ route('admin.category.index') }}" class="px-3 py-3 rounded-xl text-white font-semibold bg-[#0c720f] block">Kembali</a>
    </div>

   <form action="{{ route('admin.category.update', $category) }}" method="post">
    @csrf
    @method('put')
        <div class="w-full flex flex-col justify-between mt-3">
            <div class="w-full h-[80px] mb-5">
                <p class="font-signika font-medium text-[14px] text-[#222831] mb-2">Nama Kategori</p>
                <input name="name" value="{{ $category->name }}" type="text" class=" focus:outline-none w-full border  focus:ring focus:ring-[#0c720f]  h-[55px] rounded-xl pl-[20px] bg-[#FAFAFA]" placeholder="Masukan Nama Kategori", required>
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