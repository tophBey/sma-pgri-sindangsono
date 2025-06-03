<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Selamat Datang di Website SMA PGRI Sindangsono, Menyidiakan informasi profile sekolah, PPDB, dan Kegiatan lainnya. Nama, : SMAS PGRI SINDANGSONO, NPSN : 69725917,  Alamat: KP. CAYUR RT. 06/02. Desa/Kelurahan, : SINDANG SONO. Kecamatan/Kota (LN), : KEC. SINDANG JAYA.">
    <meta property="og:description" content="Selamat Datang di Website SMA PGRI Sindangsono, Menyidiakan informasi profile sekolah, PPDB, dan Kegiatan lainnya. Nama, : SMAS PGRI SINDANGSONO, NPSN : 69725917,  Alamat: KP. CAYUR RT. 06/02. Desa/Kelurahan, : SINDANG SONO. Kecamatan/Kota (LN), : KEC. SINDANG JAYA.">
    <meta property="og:image" content="{{ asset('asset/logo.png') }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="627">
    <meta property="og:url" content="https://smapgri-sindangsono.sch.id">
    <meta name="robots" content="index, follow">

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>SMA PGRI Sindangsono</title>
    <link rel="shortcut icon" href="{{ asset('asset/logo.png') }}" type="image/x-icon">
    <!-- font-aweosme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body class="overflow-x-hidden">

    <!-- navbar -->
        @include('frontend.main.partial.sidebar')

        @if(request()->is('/'))
            @include('frontend.main.partial.banner')
        @endif


    <!-- content -->
        <div class="">
            @yield('content')
        </div>
    <!-- content -->


    <!-- footer -->
        @include('frontend.main.partial.footer')
    <!-- footer -->

<script>
    const hamburgerButton = document.getElementById("hamburgerButton");
    const menu = document.getElementById("menu");

    hamburgerButton.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });

    document.addEventListener('click', (event) => {
        if (!hamburgerButton.contains(event.target) && !menu.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });


  const dropdownMobile4 = document.getElementById('dropdownButtonMobile');
   const dropdownMenuMobile4 = document.getElementById('dropdownMenuMobile');

  const dropdownAuthMobile = document.getElementById('dropdownButtonAuth');
   const dropdownMenuAuth = document.getElementById('dropdownMenuAuth');

    dropdownMobile4.addEventListener('click', function(){
        // console.log('tetst')
        dropdownMenuMobile4.classList.toggle('hidden')
    })

    dropdownAuthMobile.addEventListener('click', function(){
        dropdownMenuAuth.classList.toggle('hidden')
    })

</script>
<script src="{{ asset('js/banner.js') }}"></script>
<script src="{{ asset('js/dropdown.js') }}"></script>
<script src="{{ asset('js/dropdownAuth.js') }}"></script>

</body>
</html>