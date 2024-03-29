<!DOCTYPE html>
<html lang="en">
    @php
    if (session()->has('email') != null) {
        
    } else {
        echo "<script>
            location.href = '/adminlogin ';
        </script>";
    }
@endphp
@foreach($user as $p)
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projek TA</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('./img/svg/logo.svg') }}" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ URL::asset('./css/style.min.css') }}">
</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-start">
                <div class="sidebar-head">
                    <a href="##" class="logo-wrapper">
                        <span class="sidebar-user-img">
                            <picture>
                                <source srcset="{{asset('/img/avatar/avatar-illustrated-01.webp')}}" type="image/webp"><img
                                    src="./img/avatar/avatar-illustrated-01.png" alt="User name">
                            </picture>
                        </span>
                        <div class="sidebar-user-info">
                            <span class="sidebar-user__title">{{ $p->name }}</span>
                            <span class="sidebar-user__subtitle">
                                @if ($p->role == 1) 
                                  Admin Super
                                @elseif ($p->role == 2) 
                                  Mahasiswa
                                
                            @endif    
                            </span>
                        </div>
                    </a>
                    <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                        <span class="sr-only">Toggle menu</span>
                        <span class="icon menu-toggle" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="sidebar-body">
                    <ul class="sidebar-body-menu">
                        <li>
                            <a href="/dashboard"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                        </li>
                        <li>
                            <a class="show-cat-btn active" href="##">
                                <span class="icon document" aria-hidden="true"></span>Produk Inovasi
                                <span class="category__btn transparent-btn rotated" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu visible">
                                <li>
                                    <a href="/produk">Produk</a>
                                </li>
                                <li>
                                    <a class="active" href="/kategori">Kategori</a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                    <span class="system-menu__title"></span>
                    <ul class="sidebar-body-menu">

                        <li>
                            <a href="/adminlogin/logout"><svg style="margin-right: 10px" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-log-out" aria-hidden="true">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-footer">

            </div>
        </aside>
        <div class="main-wrapper">
            <!-- ! Main nav -->
            <nav class="main-nav--bg">
                <div class="container main-nav">
                    <div class="main-nav-start">
                        <img src="{{ URL::asset('img/pcr.png') }}" width="250" />
                    </div>
                    <div class="main-nav-end">
                        <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                            <span class="sr-only">Toggle menu</span>
                            <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                        </button>

                        <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                            <span class="sr-only">Switch theme</span>
                            <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                            <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
                        </button>
                        <div class="notification-wrapper">
                            <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
                                <span class="sr-only">To messages</span>
                                <span class="icon notification active" aria-hidden="true"></span>
                            </button>
                            <ul class="users-item-dropdown notification-dropdown dropdown">
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon info">
                                            <i data-feather="check"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">System just updated</span>
                                            <span class="notification-dropdown__subtitle">The system has been
                                                successfully upgraded. Read more
                                                here.</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon danger">
                                            <i data-feather="info" aria-hidden="true"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">The cache is full!</span>
                                            <span class="notification-dropdown__subtitle">Unnecessary caches take up a
                                                lot of memory space and
                                                interfere ...</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon info">
                                            <i data-feather="check" aria-hidden="true"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">New Subscriber here!</span>
                                            <span class="notification-dropdown__subtitle">A new subscriber has
                                                subscribed.</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="link-to-page" href="##">Go to Notifications page</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </nav>
            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target">
                <div class="container">
                    @foreach ($kategori as $klink)
                    @endforeach
                    <h2 class="main-title" style="color: cornflowerblue"><a href="http://127.0.0.1:8000/kategori">DAFTAR KATEGORI</a> / {{$klink->nama_kategori}}</h2>

                    <h3 style="color: cornflowerblue; font-weight:400">Tambah TKT </h3>
                    <form action="/kategori/tktstore" method="POST">
                    <div class="row" style="margin: 20px; width:100%">
                            @csrf
                            @foreach ($kategori as $kate)
                                <input type="hidden" name="idKategoriProduk" value="{{ $kate->idKategoriProduk }}">
                            @endforeach
                            <button type="submit"
                                style="right:0px; background-color:cornflowerblue; width:150px; height:45px; margin-top:10px; border-radius:10px; color:white">
                                Tambah TKT</button>
                        
                    </div>
                </form>
                    <h3 style="color: cornflowerblue; font-weight:400">Data TKT
                        <b>{{ $kate->nama_kategori }}</b> </h3>

                    <div class="row" style="margin: 20px">

                        <div class="col">

                            <div class="users-table table-wrapper">
                                <table class="posts-table">
                                    <thead>
                                        <tr class="users-table-info">

                                            <th>TKT</th>
                                            <th style="width: 8%">Aksi </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tkt as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->tkt }}
                                                </td>
                                               
                                                <td>
                                                    <a href="/kategori/pertanyaan/{{ $item->idKategoriProduk }}/{{$item->idTkt}}"
                                                        style="color:blue">
                                                        < Edit >
                                                    </a>
                                                    &nbsp;
                                                    &nbsp;
                                                    <a href="/kategori/tkthapus/{{ $item->idTkt }}"
                                                        style="color:red">
                                                        < Hapus >
                                                    </a>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </main>
            <!-- ! Footer -->
            <footer class="footer">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p>2021 © Rizka Faradilla - <a href="#" target="_blank"
                                rel="noopener noreferrer">Project TA</a></p>
                    </div>

                </div>
            </footer>
        </div>
    </div>
    <!-- Chart library -->
    <script src="./plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="js/script.js"></script>
</body>
@endforeach
</html>
