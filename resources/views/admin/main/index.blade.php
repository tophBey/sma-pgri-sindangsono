<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- icon awesome -->
        <meta name="description" content="Selamat Datang di Website SMA PGRI Sindangsono, Menyidiakan informasi profile sekolah, PPDB, dan Kegiatan lainnya">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

      <!-- batas font awesome -->
  
      <!-- google font -->
  
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Signika:wght@300..700&display=swap" rel="stylesheet">
  
      <!-- batas google font -->

    @vite('resources/css/app.css')


      <link rel="shortcut icon" href="{{ asset('asset/logo.png') }}" type="image/x-icon">

    
      
    <title>{{ $title }}</title>
</head>
<body>
    <div class="flex lg:w-screen min-h-screen bg-[#F5F6F9] overflow-x-hidden overflow-y-hidden ">

        <!-- col-1 -->
        @include('admin.partial.sidebar')
        <!-- col-1 -->

        <!-- col-2 -->
        @yield('content')
        <!-- col-2 -->
        
    </div>


<script>

   

    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // Mencegah pengiriman form secara langsung
                const form = this.closest('form');
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    form.submit(); // Kirim form jika user mengkonfirmasi
                }
            });
        });

        const hamburgerButton = document.getElementById("hamburgerButton2");
        const menu = document.getElementById("menu2");

        hamburgerButton.addEventListener("click", () => {
            menu.classList.toggle("hidden");

        })

        document.addEventListener('click', (event) => {
            if (!hamburgerButton.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });

    });

    const message = document.getElementById('message');

    if(message){
        setTimeout(function(){
            message.classList.add('hidden');
        }, 4000)

    }
    
    
</script>

<script src="{{ asset('js/dropdown.js') }}"></script>

</body>
</html>