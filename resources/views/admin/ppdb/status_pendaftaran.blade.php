@extends('admin.main.index')

@section('content')
<div class="lg:w-[77.5%] lg:h-full overflow-hidden">

<!-- header -->
<div class="mb-3 lg:w-full h-[85px] flex justify-between mt-4 rounded-xl bg-[#FFFFFF] py-3 px-5 lg:max-w-[1345px] overflow-hidden">
    <p class="font-signika text-[20px] mr-[200px] lg:w-full  font-semibold my-auto">Status Pendaftaran</p>

    
    <div class="w-[500px] flex ">

        @if (auth()->user()->avatar == null)
                    <img src="{{ asset('avatar/default-avatar.jpg') }}" alt="User Profile" class="rounded-full w-[60px] h-[60px] mr-3">
            @else
                <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="User Profile" class="rounded-full w-[60px] h-[60px] mr-3">
        @endif
        <div class="py-2">
                <h3 class=" top-5 right-[20px] text-[18px] font-semibold">{{ auth()->user()->name }}</h3>
                <p class=" top-12 right-[25px] text-[18px] font-light">{{ auth()->user()->role }}</p>
        </div>
    </div> 
    
</div>
<!-- header -->

<div class=" min-h-screen lg:max-w-[1345px]  w-full  bg-[#FFFFFF] mt-3 rounded-xl p-[20px] overflow-y-scroll overflow-hidden">
    <p class="font-signika font-medium text-[24px]">Status Pendaftaran</p>

    @if (session()->has('successCategory'))
        <div class="w-full h-[70px] bg-[#30a63a] rounded-xl flex px-[20px] mt-3 pt-2">       
            <div>
                <p class="font-signika font-semibold text-[20px] text-white">Berhasil</p>
                <p class="font-signika font-semibold text-white">{{ session('successCategory') }}</p>
            </div>
        </div>
    @endif

    @if (session()->has('FailedCategory'))
        <div class="w-full h-[70px] bg-[#FFF3E8] rounded-xl flex px-[20px] mt-3 pt-2">       
            <div>
                <p class="font-signika font-semibold text-[20px] text-white">Gagal</p>
                <p class="font-signika font-semibold text-white">{{ session('FailedCategory') }}</p>
            </div>
        </div>
    @endif

    <div class="form mt-5 mb-5 w-full h-[47px] flex justify-start">
        <form action="{{ route('admin.ppdb.status.update', $statusRegister->id) }}" method="post">
            @csrf
            @method('put')
             @if($statusRegister->is_open)
                <button type="submit"  class="px-3 py-3 w-28 text-center rounded-xl text-white font-semibold bg-[#0c720f] block">DiBuka</button>
                @else
                <button type="submit"  class="px-3 py-3 w-28 text-center rounded-xl text-white font-semibold bg-[#ef2828] block">Ditutup</button>

             @endif
         </form>
    </div>

    <div class=" w-full h-[200px] mt-4 ">
       
    </div>

</div>

</div>
@endsection