@extends('layouts.new_style.template')
@section('content')

  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-xl-4">
            <h2>Selamat Datang</h2>
            <blockquote >
                <p>Menjadi salah satu institusi pendidikan unggulan, Sekolah Tinggi JeWePe merupakan tempat terbaik untuk mengejar impian dan mengeksplorasi potensi anda. Mari lihat beberapa artikel tentang sekolah ini </p>
            </blockquote>
          <div class="d-flex">
            <a href="{{ url('artikel') }}" class="btn-get-started btn-primary">Lihat Artikel</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
