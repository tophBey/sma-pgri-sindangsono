
    <div class="slider-container">
        @forelse ($banners as $banner )
        <div  class="slider-item">
            <img src="{{ Storage::url($banner->banner_image) }}" alt="">
            <div class="slider-content">
                <h2 class="slider-title">{{ strtoupper($banner->title) }}</h2>
                <p class="slider-description">{{ strtolower($banner->subtitle) }}</p>
                <a class="silder-action" href="">Explore</a>
            </div>
        </div>
        @empty
        <div  class="slider-item">
            <img src="{{ asset('asset/banner_1.jpeg') }}" alt="">
            <div class="slider-content">
                <h2 class="slider-title">SMA PGRI SINDANG SONO</h2>
                <p class="slider-description">Selamat datang di official website SMA PGRI Sindangsono </p>
                <a class="silder-action" href="">Explore</a>
            </div>
        </div>
        <div  class="slider-item">
            <img src="{{ asset('asset/banner_2.jpeg') }}" alt="">
            <div class="slider-content">
                <h2 class="slider-title">PENERIMAAN PESERTA DIDIK BARU</h2>
                <p class="slider-description">Mari bergabung dengan kami untuk masa depan yang gemilang</p>
                <a class="silder-action" href="">Explore</a>
            </div>
        </div>
        <div  class="slider-item">
            <img src="{{ asset('asset/banner_3.jpeg') }}" alt="">
            <div class="slider-content">
                <h2 class="slider-title">BELAJAR HARI INI, SUKSES KEMUDIAN</h2>
                <p class="slider-description">Pendidikan adalah jembatan menuju kesuksesan</p>
                <a class="silder-action" href="">Explore</a>
            </div>
        </div>
        @endforelse
            
            
    </div>