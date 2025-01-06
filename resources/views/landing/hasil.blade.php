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
                    <span><a href="{{route('index')}}" style="color: #f00222;">Home</a> / Hasil Diagnosis</span>
                </div>
            </nav>
        </div>
        </div>
    </header>
    <main>
        <div class="container">
            <section style="padding-top: 100px; padding-bottom: 100px">
                <div id="report">
                    <h2 class="fw-bolder">Hasil Diagnosa</h2>
                    <div class="result">
                        @if(isset($bestHypothesisData))
                        <div class="mb-2">
                            <label for="">Nama Penyakit :</label>
                            <textarea class="autoresizeTextarea" disabled name="" id="">{{ $bestHypothesisData->name }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="">Gejala Yang Dipilih :</label>
                            <textarea class="autoresizeTextarea" disabled name="" id="">@foreach($selectedEvidencesData as $evidence)
- {{ $evidence -> name }}
@endforeach</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="">Persentase Penyakit :</label>
                            <textarea class="autoresizeTextarea" disabled name="" id="">{{ $maxTotalBayes }}%</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="">Tingkat Kepastian :</label>
                            <textarea class="autoresizeTextarea" disabled name="" id="">{{ $certainty }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="">Deskripsi Penyakit :</label>
                            <textarea class="autoresizeTextarea" disabled name="" id="">{{ $bestHypothesisData->description }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="">Solusi Mengatasi Penyakit :</label>
                            <textarea class="autoresizeTextarea" disabled name="" id="">{{ $bestHypothesisData->solution }}</textarea>
                        </div>                        
                        {{-- <img src="/storage/Hypothesis-Image/{{ $bestHypothesisData->image }}" class="rounded-4" height="500px" alt="Gambar Penyakit"> --}}
                            @foreach ($bestHypothesisData->images as $item)
                                <img src="/storage/Hypothesis-Image/{{$item->image_path}}" height="300px" class="me-3 rounded" alt="Gambar Penyakit">
                            @endforeach
                        @else
                            <div>Data tidak ditemukan.</div>
                        @endif
                    </div>
                    {{-- <table class="table">
                        <tr >
                            <td class="p-3">Nama</td>
                            <td class="p-3">:</td>
                            <td class="p-3">Nama User</td>
                        </tr>
                        <tr>
                            <td class="p-3">Gejala yang Dipilih</td>
                            <td class="p-3">:</td>
                            <td class="p-3">
                                <ul>
                                    @foreach($selectedEvidencesData as $evidence)
                                    <li>- {{ $evidence -> name }}</li>
                                    @endforeach
                                 </ul>
                            </td>
                        </tr>
                        @if(isset($bestHypothesisData))
                        <tr>
                            <td class="p-3">Nama Penyakit</td>
                            <td class="p-3">:</td>
                            <td class="p-3">{{ $bestHypothesisData->name }}</td>
                        </tr>
                        <tr>
                            <td class="p-3">Tingkat Kepastian</td>
                            <td class="p-3">: </td>
                            <td class="p-3"> {{ $maxTotalBayes }}%</td>
                        </tr>
                        <tr>
                            <td class="p-3">Deskripsi Tingkat Kepastian</td>
                            <td class="p-3">: </td>
                            <td class="p-3"> {{ $certainty }}</td>
                        </tr>
                        <tr>
                            <td class="p-3">Deskripsi Penyakit</td>
                            <td class="p-3">:</td>
                            <td> <textarea class="autoresizeTextarea" disabled name="" id=""  style="border: none; resize:none">{{ $bestHypothesisData->description }}</textarea></td>
                        </tr>
                        <tr>
                            <td class="p-3">Solusi Mengatasi Penyakit</td>
                            <td class="p-3">:</td>
                            <td> <textarea class="autoresizeTextarea" disabled style="border: none; resize:none; width:100%">{{ $bestHypothesisData->solution }}</textarea></td>
                        </tr>
                        <tr>
                            <td><img src="/storage/Hypothesis-Image/{{ $bestHypothesisData->image }}" height="500px" alt="Gambar Penyakit"></td>
                        </tr>
                        @else
                            <div>Data tidak ditemukan.</div>
                        @endif
                    </table> --}}
                    {{-- <h2 class="mt-5">Hasil Diagnosa Lainnya</h2>
                    @foreach($totalBayes as $hypothesisId => $totalBayesValue)
                    @php
                        $hypothesis = $hypothesesData[$hypothesisId];
                    @endphp
                          <h3 class="mt-5">{{ $hypothesis->name }}</h3>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Persentase Penyakit</th>
                                <th style="text-align: center;">Deskripsi Tingkat Kepastian</th>
                                <th style="text-align: right;">Total Bayes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="vertical-align: middle;">
                                <td>{{ number_format($totalBayesValue) }}%</td>
                                <td style="text-align: center;">{{ $certaintyDescriptions[$hypothesisId] }}</td>
                                <td style="text-align: right;">{{ number_format($totalBayesValue, 2) }}</td>
                            </tr>                            
                        </tbody>
                    </table>
                    @endforeach --}}
                    
                    <h2 class="mt-5 mb-2 fw-bold">Hasil Diagnosa Lainnya</h2>
                    @foreach($totalBayes as $hypothesisId => $totalBayesValue)
                    @php
                        $hypothesis = $hypothesesData[$hypothesisId];
                    @endphp
                        <div class="card rounded-4 border-2 mb-5" style="max-width: 100vw;">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-3 rounded-4 me-5" style="max-height: 450px; overflow: hidden;">
                                    {{-- <img src="/storage/Hypothesis-Image/{{ $hypothesis->image }}" class="img-fluid " alt="Gambar Penyakit"> --}}
                                    <img src="/storage/Hypothesis-Image/{{$hypothesis->images->first()->image_path}}" class="img-fluid " alt="Gambar Penyakit">

                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title fw-semibold">{{ $hypothesis->name }}</h3>
                                        <p class="card-text">{{ number_format($totalBayesValue) }}%</p>
                                        <p class="card-text">{{ $certaintyDescriptions[$hypothesisId] }}</p>
                                        <a href="{{ route('more_diagnosis_detail', $hypothesis->id) }}" class="btn btn-primary mt-2">
                                            Lihat Detail <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="diagnosis-item border mb-5">
                            <div class="d-flex align-items-center">
                                <div class="col-md-2">
                                    <img src="/storage/Hypothesis-Image/{{ $hypothesis->image }}" height="200px" alt="Gambar Penyakit">
                                </div>
                                <div class="col-md-10">
                                    <h3>{{ $hypothesis->name }}</h3>
                                    <span class="d-block">Persentase Penyakit : {{ number_format($totalBayesValue) }}%</span>
                                    <span class="d-block">Tingkat Kepastian Penyakit : {{ $certaintyDescriptions[$hypothesisId] }}</span>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Persentase Penyakit</th>
                                                <th style="text-align: center;">Deskripsi Tingkat Kepastian</th>
                                                <th style="text-align: right;">Total Bayes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="vertical-align: middle;">
                                                <td>{{ number_format($totalBayesValue) }}%</td>
                                                <td style="text-align: center;">{{ $certaintyDescriptions[$hypothesisId] }}</td>
                                                <td style="text-align: right;">{{ number_format($totalBayesValue, 2) }}</td>
                                            </tr>                            
                                        </tbody>
                                    </table>
                                    <a href="" class="btn btn-primary mt-2">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                    @endforeach

                    
                </div>

                <div class="col-12 text-right"><button type="button" class="btn"
                        style="background-color: #f00222; color: #ffffff;" onclick="printReport()"><i
                            class="fa fa-print"></i> Print</a></button></div>
            </section>
        </div>
    </main>
    <footer>
        <span style="color: white;">- 2024 -</span>
    </footer>
    <script>
        function printReport() {
            const printContents = document.getElementById('report').innerHTML;
            const originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
          <script src="{{asset('landing/asset/js/index.js')}}"></script>

</body>

</html>