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
                        <div class="carousel modal-body d-flex justify-content-center align-items-center position-relative translate-middle-x start-50" >
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
                        </div>
                            {{-- <img src="/storage/Hypothesis-Image/{{ $hypothesis->image }}" height="500px" alt="Gambar Penyakit"> --}}
                            {{-- @foreach ($hypothesis->images as $item)
                                <img src="/storage/Hypothesis-Image/{{$item->image_path}}" height="300px" class="me-3 rounded" alt="Gambar Penyakit">
                            @endforeach --}}
                    </div>
                </div>
            </section>
            
        </div>
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