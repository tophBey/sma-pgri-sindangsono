<div class="min-h-64  bg-[#ececec] px-2 py-3  rounded-xl ">

           <div class="w-[80%] min-h-11 border-t-4 flex justify-center  mt-8 mx-auto border-gray-400 relative">
               <div class="w-44 h-14 rounded-xl bg-white border-2 absolute top-[-30px] flex justify-center gap-4 items-center px-2 border-gray-400">
                   <div class="">
                       <i class="fa-regular fa-envelope text-4xl"></i>
                   </div>
                   <div class="">
                       <p class="font-semibold text-2xl">Berita</p>
                   </div>
               </div>
           </div>

           <div class="flex justify-center items-center gap-8 mt-5 flex-wrap w-full">
               <!-- card -->
                @forelse ($news as $new)
                <div class="w-[246px] h-[429px] rounded-xl bg-white shadow-xl">
                   <div class="w-full h-[138px] max-h-[138px]  relative">
                       <img class="object-cover w-full h-[138px] max-h-[138px] rounded-tl-xl rounded-tr-xl" src="{{ Storage::url($new->thumbnail) }}" alt="">
                       <div class="absolute flex justify-center items-center  h-14 w-14 border-2 bottom-[-30px] bg-[#ececec] shadow-2xl rounded-xl border-[#0c720f] ">
                           <p class="text-center font-semibold text-sm">20 MAR</p>
                       </div>
                   </div>
                   <div class="w-full px-3 py-4 mt-5  min-h-20">
                       <h2 class="text-md font-semibold line-clamp-3">{{ $new->title }}</h2>
                   </div>
                   <div class="w-full px-3  py-2 min-h-20">
                       <h2 class="text-sm text-gray-500 font-normal line-clamp-3">{{ strip_tags($new->description) }}</h2>
                   </div>

                   <div class="w-full px-3 flex justify-center items-center py-2 min-h-20 mt-1">
                       <a class="px-3 py-2 rounded-xl border-2 border-[#0c720f] font-semibold text-[#0c720f] text-md " href="{{ route('front.news.detail',$new) }}">Baca Selengkapnya</a>
                   </div>
                </div>
                @empty
                <div class="w-[246px] h-[429px] rounded-xl bg-white shadow-xl">
                   <div class="w-full h-[138px] max-h-[138px]  relative">
                       <img class="object-cover w-full h-[138px] max-h-[138px] rounded-tl-xl rounded-tr-xl" src="{{ asset('asset/bg.png') }}" alt="">
                       <div class="absolute flex justify-center items-center  h-14 w-14 border-2 bottom-[-30px] bg-[#ececec] shadow-2xl rounded-xl border-[#0c720f] ">
                           <p class="text-center font-semibold text-sm">20 MAR</p>
                       </div>
                   </div>
                   <div class="w-full px-3 py-4 mt-5  min-h-20">
                       <h2 class="text-md font-semibold line-clamp-3">Belum Tersedia</h2>
                   </div>
                   <div class="w-full px-3  py-2 min-h-20">
                       <h2 class="text-sm text-gray-500 font-normal line-clamp-3">Saat ini belum ada berita terbaru</h2>
                   </div>

                   <div class="w-full px-3 flex justify-center items-center py-2 min-h-20 mt-1">
                       <a class="px-3 py-2 rounded-xl border-2 border-[#0c720f] font-semibold text-[#0c720f] text-md " href="">Baca Selengkapnya</a>
                   </div>
                </div>
                    
                @endforelse
               
                <!-- card -->
           </div>
           <div class="w-full mt-16 mb-4">
                <a href="{{ route('front.news') }}" class="text-center w-52 mx-auto block px-3 py-2 rounded-xl border-2 border-[#0c720f] font-semibold text-[#0c720f] text-md">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
           </div>
       </div>