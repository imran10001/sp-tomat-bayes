<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hasil</title>
  <link rel="stylesheet" href="{{asset('landing/asset/css/style.css')}}" />
  <link rel="shortcut icon" href="{{asset('landing/asset/icons/tomato.png')}}" type="image/x-icon" />
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <script src="https://kit.fontawesome.com/d6601cbc46.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="rounded-bottom">
        <div class="container">
            <nav>
                <div class="icon">
                    <a href="{{route('index')}}"><img src="{{asset('landing/asset/icons/tomato.png')}}" alt="" />
                        <span>SISTEM PAKAR TOMAT</span>
                    </a>
                </div>
                <div class="nav-menu">
                    <span><a href="{{route('index')}}" style="color: #f00222;">Home</a> / Hasil</span>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <section style="padding-top: 100px; padding-bottom: 100px">
                <div id="report">
                    <h2 class="fw-bolder">Detail Hasil Diagnosa</h2>
                    <div class="result">
                        <div class="d-flex flex-column-reverse flex-lg-row align-items-start justify-content-between gap-4 mt-5">
                            <!-- Kiri: Deskripsi dan Penanganan -->
                            <div class="kiri col-lg-6">
                                <div class="mb-2 mt-5">
                                    <label for="">Nama Penyakit :</label>
                                    <textarea class="autoresizeTextarea text-black" disabled>{{ $hypothesis->name }}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label for="">Deskripsi Penyakit :</label>
                                    <textarea class="autoresizeTextarea text-black" disabled>{{ $hypothesis->description }}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label for="">Solusi Mengatasi Penyakit :</label>
                                    <textarea class="autoresizeTextarea text-black" disabled>{{ $hypothesis->solution }}</textarea>
                                </div>
                            </div>                        
                            <!-- Kanan (atau atas jika layar kecil): Carousel -->
                            <div class="kanan col-lg-6 d-flex justify-content-center align-items-center position-relative " style="height: 400px;">
                                <!-- Tombol Prev (di luar kiri gambar) -->
                                <button class="btn btn-outline-dark rounded-circle position-absolute start-0 top-50 translate-middle-y me-2" 
                                        type="button" data-bs-target="#Carousel" data-bs-slide="prev" style="z-index: 1;">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </button>

                                <!-- Carousel (Gambar di Tengah) -->
                                <div id="Carousel" class="carousel  slide overflow-hidden" data-bs-ride="carousel" style="max-width: 80%; height: 100%" data-bs-toggle="modal" data-bs-target="#myModal">
                                    <div class="carousel-inner text-center d-flex align-item-center" style="height: 100%">
                                        @foreach ($hypothesis->images as $key => $item)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}  " style="height: 100%">
                                                <img src="/storage/Hypothesis-Image/{{$item->image_path}}" 
                                                    class="d-block mx-auto img-fluid modal-image" 
                                                    alt="Image"
                                                    style="height: 100%" >
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Tombol Next (di luar kanan gambar) -->
                                <button class="btn btn-outline-dark rounded-circle position-absolute end-0 top-50 translate-middle-y ms-2" 
                                        type="button" data-bs-target="#Carousel" data-bs-slide="next" style="z-index: 1;">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                        
                        {{-- <div class="carousel modal-body d-flex justify-content-center align-items-center position-relative translate-middle-x start-50" >
                            <!-- Tombol Prev (di luar kiri gambar) -->
                            <button class="btn btn-outline-dark position-absolute start-0 top-50 translate-middle-y me-2" 
                                    type="button" data-bs-target="#Carousel" data-bs-slide="prev" style="z-index: 1;">
                                <i class="fa-solid fa-chevron-left"></i>
                            </button>

                            <!-- Carousel (Gambar di Tengah) -->
                            <div id="Carousel" class="carousel  slide overflow-hidden" data-bs-ride="carousel" style="max-width: 80%; height: 100%" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="carousel-inner text-center d-flex align-item-center" style="height: 100%">
                                    @foreach ($hypothesis->images as $key => $item)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}  " style="height: 100%">
                                            <img src="/storage/Hypothesis-Image/{{$item->image_path}}" 
                                                class="d-block mx-auto img-fluid modal-image" 
                                                alt="Image"
                                                style="height: 100%" >
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Tombol Next (di luar kanan gambar) -->
                            <button class="btn btn-outline-dark position-absolute end-0 top-50 translate-middle-y ms-2" 
                                    type="button" data-bs-target="#Carousel" data-bs-slide="next" style="z-index: 1;">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>
                        <div class="mb-2 mt-5">
                            <label for="">Nama Penyakit :</label>
                            <textarea class="autoresizeTextarea" disabled>{{ $hypothesis->name }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="">Deskripsi Penyakit :</label>
                            <textarea class="autoresizeTextarea" disabled>{{ $hypothesis->description }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="">Solusi Mengatasi Penyakit :</label>
                            <textarea class="autoresizeTextarea" disabled>{{ $hypothesis->solution }}</textarea>
                        </div> --}}
                    </div>
                </div>
            </section>            
        </div>
            <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered mx-auto" style="max-width: 80%; height: 70vh;">
        <div class="modal-content position-relative d-flex justify-content-center align-items-center" style="height: 80%;"> <!-- Modal Content -->
            <div class="modal-header" style="width: 100%;>
                <h5 class="modal-title">{{$hypothesis->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center position-relative" style="height: calc(100% - 58px); width: 90%"> <!-- 58px is approx height of header -->
                <!-- Tombol Prev -->
                <button class="btn btn-outline-dark rounded-circle position-absolute start-0 top-50 translate-middle-y me-2" 
                        type="button" data-bs-target="#modalCarousel" data-bs-slide="prev" style="z-index: 1;">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <!-- Carousel -->
                <div id="modalCarousel" class="carousel slide overflow-hidden" data-bs-ride="carousel" style="max-width: 90%; height: 100%;">
                    <div class="carousel-inner text-center d-flex align-items-center justify-content-center" style="height: 100%">
                        @foreach ($hypothesis->images as $key => $item)
                            <div class="carousel-item position-relative {{ $key == 0 ? 'active' : '' }}" style="height: 100%;">
                                <img src="/storage/Hypothesis-Image/{{$item->image_path}}" 
                                     class="d-block mx-auto img-fluid modal-image position-absolute top-50 translate-middle" 
                                     alt="Image"
                                     style="max-height: 100%; max-width: 90%;">
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tombol Next -->
                <button class="btn btn-outline-dark rounded-circle position-absolute end-0 top-50 translate-middle-y ms-2" 
                        type="button" data-bs-target="#modalCarousel" data-bs-slide="next" style="z-index: 1;">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>
    {{-- <div class="modal fade" id="myModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content position-relative"> <!-- Modal Content -->
                <div class="modal-header">
                    <h5 class="modal-title">{{ $hypothesis->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center position-relative " style="min-height: 70vh;">
                    <!-- Tombol Prev (di luar kiri gambar) -->
                    <button class="btn btn-outline-dark position-absolute start-0 top-50 translate-middle-y me-2" 
                            type="button" data-bs-target="#modalCarousel" data-bs-slide="prev" style="z-index: 1;">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>

                    <!-- Carousel (Gambar di Tengah) -->
                    <div id="modalCarousel" class="carousel slide overflow-hidden" data-bs-ride="carousel" style="max-width: 80%; height: 650px">
                        <div class="carousel-inner text-center d-flex align-item-center" style="height: 100%">
                            @foreach ($hypothesis->images as $key => $item)
                                <div class="carousel-item position-relative {{ $key == 0 ? 'active' : '' }}  " style="height: 100%">
                                    <img src="/storage/Hypothesis-Image/{{$item->image_path}}" 
                                        class="d-block mx-auto img-fluid modal-image position-absolute top-50 start-50 translate-middle" 
                                        alt="Image"
                                        style="height: 100%" >
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Tombol Next (di luar kanan gambar) -->
                    <button class="btn btn-outline-dark position-absolute end-0 top-50 translate-middle-y ms-2" 
                            type="button" data-bs-target="#modalCarousel" data-bs-slide="next" style="z-index: 1;">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div> --}}
    </main>
    <footer>
        <span style="color: white;">- 2024 -</span>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="{{asset('landing/asset/js/index.js')}}"></script>
</body>

</html>