<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- icon awesome -->

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

      <!-- batas font awesome -->
  
      <!-- google font -->
  
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Signika:wght@300..700&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
      <!-- batas google font -->
  
    <style></style>
    <title>{{ $student->fullname }}</title>
</head>
<body>
    <div class="container">

        <div class="header">
            <div class="flex-item "  >
                <img class="logo" src="{{ public_path('asset/tut_wuri_handayani.png') }}" alt="">
            </div>

            <div class="title">
                <h2 class="text-center heading-title">IDENTITAS SISWA</h2>
                <h2 class="text-center heading-title">PPDB ONLINE</h2>
                <h2 class="text-center heading-title">SMA PGRI SINDANG SONO</h2>
                <p class="text-center">TAHUN AJARAN {{ date('Y') }}/{{ date('Y') + 1 }}</p>
            </div>

            <div class="flex-item absolute-r-0">
                <img class="logo" src="{{ public_path('asset/logo.png') }}" alt="">
            </div>
        </div>

        <!-- biodata siswa -->
        <div class="content  relative">
            <div class="content-item mr-6">

                <div class="biodata relative biodata-student biodata-box">
                    <div class="biodata-name absolute-l-2">
                        <h3>ID REGISTRASI</h3>
                        <h3>NAMA SISWA</h3>
                        <h3>JENIS KELAMIN</h3>
                        <h3>AGAMA</h3>
                        <h3>NISN</h3>
                        <h3>NIK</h3>
                        <h3>TEMPAT LAHIR</h3>
                        <h3>TANGGAL LAHIR</h3>
                        <h3>NO HANDPHONE</h3>
                        <h3>ALAMAT</h3>
                    </div>
                    <div class="biodata-value absolute-r-1">
                        <p>: {{ $student->id }}</p>
                        <p class="name-hidden">: {{ strtoupper($student->fullname) }} </p>
                        <!-- <p class="name-hidden">: Lorem ipsum dolor sit amet consectetur adipisicing elit. </p> -->
                        <p>: {{ strtoupper($student->gender) }} </p>
                        <p>: {{ strtoupper($student->religion) }} </p>
                        <p>: {{ $student->nisn }} </p>
                        <p>: {{ $student->nik }} </p>
                        <p>: {{ strtoupper($student->place_of_birth) }} </p>
                        <!-- <p>: {{ $student->date_of_birth }} </p> -->
                        <p>: {{ strtoupper($student->formatted_date_of_birth) }} </p>
                        <p>: {{ $student->phone }} </p>
                        <p class="school-name">: {{ $student->address }} </p>
                        <!-- <p class="school-name">: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, inventore. Dolor exercitationem corrupti officia molestias quos cupiditate non perferendis deleniti earum quis deserunt reprehenderit autem id aliquam, magnam, modi excepturi perspiciatis iusto omnis? Delectus. </p> -->
                    </div>
                </div>

                <!-- asal sekolah -->
                <div class="biodata relative">
                    <div class="shcool-title">
                        <h2>IDENTITAS SEKOLAH ASAL</h2>
                    </div>
                    <div class="biodata-student biodata-content">
                        <div class="biodata-name absolute top-8 left-2">
                            <h3>NAMA SEKOLAH</h3>
                            <h3>TAHUN LULUS</h3>
                            <h3>ALAMAT</h3>
                           
                        </div>
                        <div class="biodata-value absolute top-8 right-2 ">
                            <p class="school-name name-hidden">: {{ strtoupper($student->previousSchool->shcool_name) }}</p>
                            <p>: {{ $student->previousSchool->graduation_year }}</p>
                            <p class="school-name">: {{ $student->previousSchool->address }}</p>
                            
                        </div>
                    </div>

                </div>
            </div>

            <div class="coontent-photo border-dash absolute top-16 right-16">
                <div class=" image-border">
                    <img class="content-cover" src="{{ public_path(''). '/'. Storage::url($student->student_photo) }}" alt="">
                </div>
            </div>

        </div>

        <div class="relative">

            <div class="w-full  border-dash information">

                <div class="school-title">
                    <h2>INFORMASI PENTING</h2>
                </div>

                <div class="informasition-body w-full">
                    <ol>
                        <li>Simpanlah lembar pendaftaran ini sebagai bukti pendaftaran anda</li>
                        <li>Lembar pendaftaran ini wajib di bawa ke panitia PPBD SMA PGRI Sindang Sono</li>
                    </ol>
                </div>



            </div>

        </div>
      
        
    </div>
</body>
</html>