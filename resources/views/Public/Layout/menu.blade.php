@section('menu')
    <ul class="navbar-nav mr-auto nav-sub">
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="{{route("frontend.index")}}" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                Anasayfa
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="{{route("frontend.pages","nasil-calisir")}}" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                Nasıl Çalışır?
            </a>
        </li>
      <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="{{route("frontend.appointment")}}" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                Psikolog Seç
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="{{route("frontend.pages","s-s-s")}}" id="navbarDropdown" role="button"
               aria-haspopup="true" aria-expanded="false">
                S.S.S
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="{{route("frontend.pages","kendini-test-et")}}" id="navbarDropdown" role="button"
               aria-haspopup="true" aria-expanded="false">
                Kendini Test Et
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="{{route("frontend.blog")}}" id="navbarDropdown" role="button"
               aria-haspopup="true" aria-expanded="false">
                Blog
            </a>
        </li>

    </ul>
    @endsection
