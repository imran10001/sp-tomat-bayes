<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Penyakit</title>
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
                    <span><a href="{{route('index')}}" style="color: #f00222;">Home</a> / {{$get_hypothesis->name}}</span>
                </div>
            </nav>
        </div>
        </div>
    </header>
    <main>
        <div class="container">
            <section style="padding-top: 100px; padding-bottom: 100px">
                <h2 class="mb-5 text-capitalize">{{$get_hypothesis->name}}</h2>                    
                     <div class="mb-3">
                        <label for="">Deskripsi Penyakit :</label>
                        <textarea id="" class="autoresizeTextarea mt-2" disabled class="p-3 rounded-4">{{$get_hypothesis->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Penanganan Penyakit :</label>
                        <textarea id="" class="autoresizeTextarea mt-2" disabled class="p-3 rounded-4">{{$get_hypothesis->solution}}</textarea>
                    </div>
                    @foreach ($get_hypothesis->images as $item)
                        <img src="/storage/Hypothesis-Image/{{$item->image_path}}" height="500px" class="me-3 rounded" alt="Gambar Penyakit">
                    @endforeach
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