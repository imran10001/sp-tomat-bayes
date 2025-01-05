<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Penyakit</title>
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
                    <span><a href="{{route('index')}}" style="color: #f00222;">Home</a> / Semua Penyakit</span>
                </div>
            </nav>
        </div>
        </div>
    </header>
    <main>
        <div class="container">
            <section style="padding-top: 100px">
              <h2 class="fw-semibold pb-4">Semua Penyakit</h2>
            @foreach ($hypothesis_data as $item)
            <div class="card border-0 mb-3" style="width: 100%;">
                <div class="row g-0 d-flex align-items-center justify-content-center">
                  <div class="col-md-2 d-flex justify-content-center align-items-center border border-1 rounded-5" style=" width: 150px; height: 150px; overflow:hidden;">
                    @if ($item->images->isNotEmpty())
                    <img src="/storage/Hypothesis-Image/{{$item->images->first()->image_path}}" height="300px" class="me-3 rounded" alt="Gambar Penyakit">
                    @else
                        <p>Gambar tidak tersedia.</p>
                    @endif
                    <img src="storage/Hypothesis-Image/{{ $item->image }}" class="rounded-start border" width="100%"  alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title text-capitalize">{{$item->name}}</h5>
                    </div>
                  </div>
                  <div class="col-md-2 d-flex justify-content-end gap-1">
                    <a href="{{route('hypothesis_detail', $item->id)}}" class="btn btn-primary text-light"><i class="fa-solid fa-chevron-right"></i></a>
                  </div>
                </div>
              </div>
              @endforeach
            </section>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>
</html>