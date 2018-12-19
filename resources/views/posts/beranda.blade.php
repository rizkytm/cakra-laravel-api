<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="{{ url('/home') }}" class="brand-logo">Laravel</a>
      @guest
      <ul class="right hide-on-med-and-down">
        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
      </ul>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
      </ul>
      @else
      <ul class="right hide-on-med-and-down">
        <li><a href="{{ route('create') }}">Buat Diskusi</a></li>
      </ul>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{ route('referensi.create') }}">Buat referensi</a></li>
      </ul>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{ route('buat.berita') }}">Buat berita</a></li>
      </ul>
      @endguest
      

      <ul id="nav-mobile" class="sidenav">
        <li><a href="{{ route('create') }}">Buat Diskusi</a></li>
        <li><a href="{{ route('referensi.create') }}">Buat referensi</a></li>
        <li><a href="{{ route('buat.berita') }}">Buat berita</a></li>
      </ul>
      <!-- <ul id="nav-mobile" class="sidenav">
        <li><a href="{{ route('referensi.create') }}">Buat referensi</a></li>
      </ul>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="{{ route('buat.berita') }}">Buat berita</a></li>
      </ul> -->
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

    @yield('content')
  
    @yield('footer')
  


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{ asset('js/materialize.js') }}"></script>
  <script src="{{ asset('js/init.js') }}"></script>

  </body>
</html>
