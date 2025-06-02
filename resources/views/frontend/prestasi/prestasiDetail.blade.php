@extends('frontend.main.index')

@section('content')
<div class="w-screen px-5 py-3 min-h-screen max-h[1400px]  bg-[#F5F6F9]">

<!-- descripsion and image -->
<div class="mt-28 flex flex-wrap gap-4  w-full bg-white min-h-96 rounded-xl py-4">
  <div class="w-[90%] mx-auto ">
    <h1 class="text-center text-2xl font-semibold mb-4">{{ $prestasion->title }}
    </h1>

    <div class="w-[90%] mx-auto border rounded-lg mb-8 ">
        <img class="w-[100%] max-h-[550px] rounded-lg " src="{{ Storage::url($prestasion->photo_prestasion) }}" alt="">
    </div>
    <div class=" px-3 py-4 w-[90%]   mx-auto">
        <!-- <p class="text-xl text-justify border-b-2 mb-10">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum magnam officiis ut cupiditate voluptates possimus inventore enim odit, maiores esse maxime rerum quibusdam alias harum est consectetur placeat, et unde reprehenderit necessitatibus? Delectus rerum accusantium quas ratione unde? Eveniet, temporibus. Labore, alias dicta. Perspiciatis rem laudantium placeat, distinctio laborum numquam. Quasi fuga praesentium optio officiis sed saepe a sit autem, magni aspernatur deserunt commodi. Natus doloribus ex explicabo tempora quo voluptas vero temporibus dolorum? Distinctio, ipsam qui, dolorum doloribus minus consequatur inventore ratione quam voluptas architecto tempore fuga commodi, blanditiis in ipsum. Labore, aliquam similique id repellat unde perspiciatis quae. Aspernatur impedit assumenda autem inventore optio laborum quidem ab? Harum qui labore fuga enim molestias quas ratione fugit doloribus totam eaque! Minima, aliquam accusantium itaque numquam ratione earum. Blanditiis quae eligendi tempora totam doloribus sapiente voluptas nobis unde labore sequi officia eveniet beatae tenetur ipsam facilis itaque, ad porro aspernatur dolorum nisi ut incidunt repellendus? Ducimus laboriosam praesentium cumque velit ex maiores dolores delectus veniam illum eum! Repellat excepturi doloremque est ipsum dolore deleniti ut, rem obcaecati quo nam aspernatur nostrum illum <br><br>, mollitia eius commodi enim fugiat eaque ad! Pariatur explicabo debitis perferendis tenetur laboriosam maiores doloremque expedita labore nam velit eveniet error temporibus sapiente animi, incidunt aut omnis dolores. Blanditiis id rerum ipsa facilis saepe quidem doloribus ratione itaque exercitationem, ad quam aspernatur aperiam autem consequuntur vitae voluptatem beatae ea culpa recusandae repellendus! Ex sequi excepturi laboriosam cumque nostrum! Quia deserunt, quaerat eum mollitia dolorum sint ullam voluptatem asperiores laboriosam voluptates expedita, quae adipisci in, vitae distinctio. Cumque rem, praesentium eius nemo maiores, itaque eveniet fugit,<br><br> recusandae voluptatibus eaque consequuntur impedit vero ab doloremque mollitia totam quas libero molestias amet provident maxime dolorem non. Sequi perferendis commodi, aliquam illum dolorem nisi quo, soluta, quibusdam quos iusto eaque dolore id? Vero fuga ipsa laborum repellat vel nihil qui temporibus deserunt, sequi consectetur esse, error architecto, et doloremque! Repellat officiis maiores accusamus? Deserunt dignissimos eum accusantium quod expedita, consequuntur voluptatem ex impedit porro, maiores nobis, non ab ipsa eveniet dolore officia velit fuga atque! Non, magni officia molestiae porro consectetur corrupti libero fugiat est adipisci facere. Praesentium recusandae eaque fugiat! At sed assumenda error sint dolorum quas, accusantium fugit id debitis, cumque praesentium tempora culpa dolor reprehenderit nisi libero! Consequatur accusantium earum hic consequuntur eaque excepturi dicta maxime ipsa voluptatibus. Praesentium repudiandae cumque totam voluptatum quia, numquam qui? Voluptas, vitae mollitia?</p> -->
        <p class="text-xl text-justify  mb-14">{{ $prestasion->description }}</p>
        <div class="flex justify-between mt-3">
            <a href="{{ route('front.prestasion') }}" class="px-3  py-3 text-xl font-semibold rounded-xl text-[#0c720f] border-2 border-[#0c720f]">Kembali</a>

            
        </div>
    </div>
  </div>
</div>

</div>
@endsection