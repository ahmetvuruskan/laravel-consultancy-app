@section('menu')
    <ul class="navbar-nav mr-auto nav-sub">
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="{{route("frontend.index")}}" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                Anasayfa
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="{{route("frontend.pages","hakkimizda")}}" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                Hakkımızda
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="{{route("frontend.contact")}}" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                İletişim
            </a>
        </li>
    </ul>
    @endsection
