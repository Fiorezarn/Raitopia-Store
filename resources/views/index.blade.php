@extends('layouts/main')

@section('title', 'Home')

@section('container')
<div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slider1.webp" class="d-block w-100" alt="jordan">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/slider2.webp" class="d-block w-100" alt="offwhite">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/slider3.webp" class="d-block w-100" alt="stussy">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- providing start --}}
<div class="my-3">
    <div class="provide" id="provide">
        <div class="isi">
            <div class="text-center judulpro"><h2>Apa yang kami berikan?</h2></div><br><br><br>
            <div class="container text-center">
                <div class="row">
                  <div class="col">
                    <h5>Keamanan Terjamin</h5>
                    <img src="img/safety.png" alt="safety" style="width: 200px">
                    <p>Kami menjamin keamanan belanja Anda dengan sistem keamanan terpercaya dan perlindungan data yang ketat. Belanja dengan kami adalah pengalaman yang aman dan nyaman</p>
                  </div>
                  <div class="col">
                    <h5>Barang Original</h5>
                    <img src="img/original.png" alt="original" style="width: 200px">
                    <p>Kami berkomitmen untuk menjadi olshop yang mengutamakan barang original. Kami percaya bahwa keaslian produk adalah hal yang penting bagi pelanggan kami. Dengan memastikan bahwa semua barang yang kami tawarkan adalah original, kami ingin memberikan kepercayaan dan kepuasan kepada pelanggan dalam berbelanja di olshop kami.</p>
                  </div>
                  <div class="col">
                    <h5>Layanan Pelanggan 24 Jam</h5>
                    <img src="img/full-time.png" alt="service" style="width: 200px">
                    <p>Kami siap memberikan pelayanan terbaik dengan layanan pelanggan kami yang tersedia 24 jam, tim kami akan selalu ada di sini untuk membantu menjawab pertanyaan, memberikan saran produk, dan menyelesaikan masalah dengan cepat. Kami berkomitmen untuk memberikan pengalaman belanja yang menyenangkan dan aman, serta memastikan kepuasan pelanggan adalah prioritas utama kami.</p>
                  </div>
                </div>
              </div>
        </div>
    </div>
    </div>
    
    {{-- providing end --}}
    
    
    
    {{-- product start --}}
    <section class="produk">
      <div class="container">
          <br><br>
          <h1 class="text-center">Daftar Produk</h1>
          <br>
          <div class="row">
              <div class="col-lg-4 col-md-6 mb-3">
                  <div class="card item cardpro" style="width: 300px;">
                    <img src="product-img/product1.jpeg" class="d-block w-100" alt="product1">
                      <div class="card-body">
                        <img src="">
                          <h5 class="card-title">Diamon Free Fire</h5>
                          <p class="card-text">Rp. 15.000</p>
                          <a class="btn btn-primary" href="#">Lihat lebih lanjut</a>
                      </div>
                  </div>
              </div>
          </div>
          <br><br>
          <div class="buttonload text-center">
            <a href="/product" class="btn btn-info">Lihat lainnya</a>
          </div>
      </div>
      <br><br>
    </section>
@endsection