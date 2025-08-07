<div class="area">
    <nav class="main-menu">
        <ul>
            <li>
                <a href="{{ url('/dashboard') }}"">
                    <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="{{ url('/rumahsakit') }}"">
                    <i class="fa fa-hospital-o" aria-hidden="true"></i>
                    <span class="nav-text">
                        Rumah Sakit
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="{{ url('/pasien') }}"">
                    <i class="fa fa-wheelchair" aria-hidden="true"></i>
                    <span class="nav-text">
                        Pasien
                    </span>
                </a>

            </li>
        </ul>

        <ul class="logout">
            <li>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <button type="submit" class="btn btn-link text-danger" style="text-decoration: none;">
                        <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">Logout</span>
                    </button>
                </form>
            </li>
        </ul>

    </nav>

</div>
