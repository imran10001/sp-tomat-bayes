<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Riwayat</title>
  <link rel="stylesheet" href="{{asset('landing/asset/css/style.css')}}" />
  <link rel="shortcut icon" href="{{asset('landing/asset/icons/tomato.png')}}" type="image/x-icon" />
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <script src="https://kit.fontawesome.com/d6601cbc46.js" crossorigin="anonymous"></script>
</head>
<body>
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
                    <span><a href="{{route('index')}}" style="color: #f00222;">Home</a> / Hasil Diagnosis</span>
                </div>
            </nav>
        </div>
        </div>
    </header>
    <main>
        <div class="container">
            <section style="padding-top: 100px">
                <div id="report">
                    <h2 class="fw-bolder">Hasil Diagnosis</h2>
                    <div class="result">
                        <div class="mb-2">
                            <label for="">Nama Penyakit :</label>
                            <textarea class="autoresizeTextarea" disabled name="" id="">{{$get_diagnosis->hypothesis->name}}
</textarea>
                        </div>
                        {{-- <div class="mb-2">
                            <label for="">Gejala Yang Dipilih :</label>
                            <textarea class="autoresizeTextarea" disabled name="" id="">@foreach($selectedEvidencesData as $evidence)
- {{ $evidence -> name }}
@endforeach</textarea>
                        </div> --}}
                        <div class="mb-2">
                            <label for="">Persentase Penyakit :</label>
                            <textarea class="autoresizeTextarea" disabled name="" id="">{{$get_diagnosis->value}}%</textarea>
                        </div>
                        {{-- <div class="mb-2">
                            <label for="">Tingkat Kepastian :</label>
                            <textarea class="autoresizeTextarea" disabled name="" id="">{{ $certainty }}</textarea>
                        </div> --}}
                        <div class="mb-2">
                            <label for="">Deskripsi Penyakit :</label>
                            <textarea class="autoresizeTextarea" disabled name="" id="">{{ $get_diagnosis->hypothesis->description }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="">Solusi Mengatasi Penyakit :</label>
                            <textarea class="autoresizeTextarea" disabled name="" id="">{{ $get_diagnosis->hypothesis->solution }}</textarea>
                        </div>
                        {{-- <img src="/storage/Hypothesis-Image/{{ $get_diagnosis->hypothesis->image }}" class="rounded-4" height="500px" alt="Gambar Penyakit"> --}}
                        @if ($get_diagnosis->hypothesis && $get_diagnosis->hypothesis->images->isNotEmpty())

                            @foreach ($get_diagnosis->hypothesis->images as $item)
                                <img src="/storage/Hypothesis-Image/{{$item->image_path}}" height="350px" class="me-3 rounded" alt="Gambar Penyakit">
                            @endforeach
                        @else
                            <p class="text-muted">Gambar tidak tersedia.</p>
                        @endif
                        
                    </div>
                </div>
            </section>
</div>
</main>
    <footer class="mt-5">
        <span style="color: white;">- 2024 -</span>
    </footer>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous">
    </script>
    <script src="{{asset('landing/asset/js/index.js')}}"></script>
</body>
</html>
