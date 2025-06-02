<div class="min-h-64 w-full  gap-4 px-2 py-3  rounded-xl">
    <div class=" min-h-64 mt-24 w-[85%] mx-auto">
         <div class="mb-12">
            <h2 class="text-center text-3xl font-semibold mb-2">Kegiatan</h2>
            <div class="">
                <p class="text-center font-normal text-gray-500">Temukan lebih banyak kesempatan untuk bertemu teman teman, berbagi pengalaman baru, menambah wawasan, mengembangkan minat dan bakat serta membangun jaringan yang luas melalu berbagai macam kegiatan yang tersedia di sekolah.</p>
            </div>
        </div>

        <div class="w-full flex flex-wrap gap-4 justify-center align-middle">
            @forelse ( $activities as $activity )
            <a href="{{ route('front.activityDetail', $activity) }}" class="block w-[256px] h-[200px] border rounded-xl">
                <img src="{{ Storage::url($activity->photo_activity) }}" alt="" class=" w-[256px] h-[200px] rounded-xl">
            </a>
            <a href="{{ route('front.activityDetail', $activity) }}" class="block w-[256px] h-[200px] border rounded-xl">
                <img src="{{ Storage::url($activity->photo_activity) }}" alt="" class=" w-[256px] h-[200px] rounded-xl">
            </a>
                
            @empty
            <a href="" class="block w-[256px] h-[200px] border rounded-xl text-center font-bold">
                Belum ada kegiatan terbaru
            </a> 
            @endforelse
        </div>
        <div class="w-full mt-16">
                <a href="{{ route('front.activity') }}" class="text-center w-52 mx-auto block px-3 py-2 rounded-xl border-2 border-[#0c720f] font-semibold text-[#0c720f] text-md">Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</div>