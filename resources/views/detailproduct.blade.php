@extends('layouts/main')

@section('title', 'Detail Produk')

@section('container')
<section class="detail-produk">
    <div class="container">
        <br><br>
        <h1 class="text-center">Detail Produk</h1>
        <br>
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ url('product-img/' . $products->photo) }}" class="img-fluid" alt="{{ $products->nama_produk }}">
            </div>
            <div class="col-lg-6">
                <div class="product-details">
                    <h2 class="product-title">{{ $products->nama_produk }}</h2>
                    <p class="product-stock"><strong>Stock:</strong> {{ $products->stock }}</p>
                    <p class="product-description"><strong>Deskripsi:</strong> {{ $products->deskripsi }}</p>
                    <a href="https://api.whatsapp.com/send?phone=+62895320297330&text=Halo%2C%20saya%20ingin%20order%20produk%20raitopia" class="btn btn-success">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</section>
@endsection
