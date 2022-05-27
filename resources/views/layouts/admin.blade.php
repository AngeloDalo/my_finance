<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>MyFinance</title>
  <link rel="icon" type="image/x-icon" href="Cattura.ico">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="row">
            <div class="d-none d-lg-block col-2 me-5">
                <nav id='sidebarMenu' class='bg-light sidebar me-2'>
                    <div class="d-flex flex-column flex-shrink-0 p-1 bg-light border border-success rounded-3" style="position: fixed; height: 100%">
                      <ul class="nav nav-pills flex-column mb-auto">
                        <li>
                            <a href="{{ url('/') }}"><img src="{{ asset('img/Cattura.jpg') }}" alt="logo" class="" style="width: 150px"></a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ url('/') }}" class="nav-link text-success" aria-current="page"><i class="fas fa-home" style="color:hsl(143, 95%, 22%)"></i>Home</a>
                        </li>
                        {{-- <li>
                          <a href="{{ route('transactions.index') }}" class="nav-link text-success"><i class="fas fa-money-bill" style="color:hsl(143, 95%, 22%)"></i>LE MIE TRANSAZIONI</a>
                        </li>
                        <li>
                          <a href="{{ route('transactions.create') }}" class="nav-link text-success"><i class="fas fa-plus" style="color:hsl(143, 95%, 22%)"></i>AGGIUNGI TRANSAZIONE</a>
                        </li>
                        <li>
                            <a href="{{ route('casa.index') }}" class="nav-link text-success"><i class="fas fa-home" style="color:hsl(143, 95%, 22%)"></i>CASA</a>
                        </li>
                        <li>
                            <a href="{{ route('campagna.index') }}" class="nav-link text-success"><i class="fas fa-wine-bottle" style="color:hsl(143, 95%, 22%)"></i>CAMPAGNA</a>
                        </li>
                        <li>
                            <a href="{{ url('http://127.0.0.1:8000/ventidue') }}" class="nav-link text-success"><i class="fas fa-wine-bottle" style="color:hsl(143, 95%, 22%)"></i>2022</a>
                        </li>
                        <li>
                            <a href="{{ url('http://127.0.0.1:8000/ventuno') }}" class="nav-link text-success"><i class="fas fa-wine-bottle" style="color:hsl(143, 95%, 22%)"></i>2021</a>
                        </li> --}}
                      </ul>
                    </div>
                  </nav>
            </div>
            <div class="d-block d-lg-none col-12">
                <nav class="navbar navbar-success bg-white">
                    <ul class="nav nav-pills flex-row mb-auto">
                        <li class="nav-item">
                          <a href="{{ url('/') }}" class="nav-link text-success" aria-current="page"><i class="fas fa-home" style="color:hsl(143, 95%, 22%)"></i>Home</a>
                        </li>
                        {{-- <li>
                          <a href="{{ route('transactions.index') }}" class="nav-link text-success"><i class="fas fa-money-bill" style="color:hsl(143, 95%, 22%)"></i>LE MIE TRANSAZIONI</a>
                        </li>
                        <li>
                          <a href="{{ route('transactions.create') }}" class="nav-link text-success"><i class="fas fa-plus" style="color:hsl(143, 95%, 22%)"></i>AGGIUNGI TRANSAZIONE</a>
                        </li>
                        <li>
                            <a href="{{ route('casa.index') }}" class="nav-link text-success"><i class="fas fa-home" style="color:hsl(143, 95%, 22%)"></i>CASA</a>
                        </li>
                        <li>
                            <a href="{{ route('campagna.index') }}" class="nav-link text-success"><i class="fas fa-wine-bottle" style="color:hsl(143, 95%, 22%)"></i>CAMPAGNA</a>
                        </li>
                        <li>
                            <a href="{{ url('http://127.0.0.1:8000/ventidue') }}" class="nav-link text-success"><i class="fas fa-calendar-alt" style="color:hsl(143, 95%, 22%)"></i>2022</a>
                        </li>
                        <li>
                            <a href="{{ url('http://127.0.0.1:8000/ventuno') }}" class="nav-link text-success"><i class="fas fa-calendar-alt" style="color:hsl(143, 95%, 22%)"></i>2021</a>
                        </li> --}}
                      </ul>
                </nav>
            </div>
            <div class="col-12 col-lg-9">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
