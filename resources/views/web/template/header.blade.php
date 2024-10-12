<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ settings()->title }}</title>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('web/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="{{ asset('storage/'.settings()->logo) }}" alt="Logo AVI | AVI Humanity">
        </div>
        <button class="hamburger" onclick="popupMenuMobile()"><iconify-icon icon="ion:menu-outline"></iconify-icon></button>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class="has-submenu">
                    <a href="#" class="submenu-toggle">Program <iconify-icon icon="fluent:chevron-down-32-filled"></iconify-icon></a>
                    <ul class="submenu">
                        @foreach(getAllCategories() as $subMenu)
                           <li><a href="program/{{ $subMenu['id'] }}">{{ $subMenu['name'] }}</a></li>
                        @endforeach
                        {{-- <li><a href="program.php">Program Reguler</a></li>
                        <li><a href="program.php">Darurat Kemanusiaan</a></li>
                        <li><a href="program.php">Recovery Gaza</a></li> --}}
                    </ul>
                </li>
                <!-- <li><a href="infaq.php">Infaq</a></li> -->
                <li><a href="{{ url('tentang-kami') }}">Tentang Kami</a></li>
                <li><a href="{{ url('berita') }}">Berita</a></li>
                <li><a href="{{ url('kontak') }}">Kontak</a></li>
            </ul>
        </nav>
    </div>
    <nav id="menuMobilePopup">
        <button class="close_btn" onclick="popupMenuMobile()"><iconify-icon icon="ic:round-close"></iconify-icon></button>
        <ul>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <!-- <li><a href="infaq.php">Infaq</a></li> -->
            <li><a href="{{ url('tentang-kami') }}">Tentang Kami</a></li>
            <li><a href="{{ url('berita') }}">Berita</a></li>
            <li><a href="{{ url('kontak') }}">Kontak</a></li>
        </ul>
    </nav>