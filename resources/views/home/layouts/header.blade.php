<header>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #013220;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo_kaltim.png') }}" alt="Logo" width="30"
                    class="d-inline-block align-text-center me-2">
                <b>WIBELTAN</b>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fw-bold" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-4">
                        <a class="nav-link {{ request()->segment(1) == '' ? 'active' : '' }}"
                            href="{{ url('/') }}">
                            <i class="fas fa-home"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link {{ request()->segment(1) == 'materi-wisata-belajar-pertanian' ? 'active' : '' }}"
                            href="{{ route('materis') }}">
                            <i class="fa-solid fa-book"></i>
                            Materi
                        </a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link {{ request()->segment(1) == 'lihat-jadwal' ? 'active' : '' }}"
                            href="{{ route('jadwal') }}">
                            <i class="fa-regular fa-calendar-days"></i>
                            Jadwal
                        </a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link {{ request()->segment(1) == 'materi-wisata-belajar-pertanian' ? 'active' : '' }}"
                            href="{{ route('publikasi.pertanaman') }}">
                            <i class="fa-solid fa-bullhorn"></i>
                            Publikasi & Pertanaman
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Navbar End --}}
</header>
