  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <h1 class="d-flex align-items-center text-white">Sekolah JeWePe</h1>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar ml-auto">
        <ul>
          <li><a href="{{url('/')}}" @if(Request::segment('1') == '')" class="active" @endif>Home</a></li>
          <li><a href="{{url('/artikel')}}" @if(Request::segment('1') == 'artikel')" class="active" @endif>Artikel</a></li>
          <li><a href="{{ route('login') }}" >Login</a></li>
        </ul>
      </nav>

    </div>
  </header>