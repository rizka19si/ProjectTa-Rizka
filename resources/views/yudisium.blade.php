<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projek TA</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="./css/style.min.css">
</head>
<style>
    .new-button {
        display: block;

        padding: 10px 11px;
        cursor: pointer;
        border-radius: 4px;
        background-color: cornflowerblue;
        font-size: 16px;
        color: #fff;
    }

    input[type="file"] {
        position: absolute;
        z-index: -1;
        top: 0px;
        left: 0;
        font-size: 15px;

        color: rgb(153, 153, 153);
    }

    .button-wrap {
        position: relative;
    }

    ::placeholder {
        color: grey;
    }
</style>

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
                                <source srcset="./img/avatar/avatar-illustrated-01.webp" type="image/webp"><img
                                    src="./img/avatar/avatar-illustrated-01.png" alt="User name">
                            </picture>
                        </span>
                        <div class="sidebar-user-info">
                            <span class="sidebar-user__title">Nafisa Sh.</span>
                            <span class="sidebar-user__subtitle">Support manager</span>
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
                            <a href="#"><span class="icon home" aria-hidden="true"></span>Yudisium</a>
                        </li>
                    </ul>
                    <span class="system-menu__title"></span>
                    <ul class="sidebar-body-menu">

                        <li>
                            <a href="##"><svg style="margin-right: 10px" xmlns="http://www.w3.org/2000/svg"
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
                    <h2 class="main-title" style="color: cornflowerblue">Yudisium</h2>
                    <h3 style="color: cornflowerblue; font-weight:400"></h3>
                    <form action="/produk/store" method="POST" enctype="multipart/form-data">
                        <div class="row" style="margin: 20px">
                            @csrf
                            <input type="text" name="judul" placeholder="Masukan Judul"
                                style="background-color:white; padding:10px; margin-right:10px; margin-bottom:10px; width:49%; "
                                required>
                            <textarea name="pesaing" placeholder="Gambaran Pesaing"
                                style="background-color:white; padding:10px; margin-right:10px; margin-bottom:10px; width:49%; border-radius:5px; border:0px"
                                required></textarea>
                            {{-- <input type="hidden" name="" value="-"> --}}
                            <select name="id_kategori"
                                style="border:0px; width:49%; height:40px; border-radius:5px; padding:10px; color:grey; margin-right:10px; margin-bottom:10px">
                                <option value=" " selected disabled>Pilih Kategori</option>
                                @foreach ($kategori as $kate)
                                    <option value="{{ $kate->idKategoriProduk }}"> {{ $kate->nama_kategori }} </option>
                                @endforeach
                            </select>
                            <div class="button-wrap" >
                                <label class="new-button" for="upload" style="width: 180px"> Foto Produk Inovasi
                                    <input id="upload" name="mulfoto" type="file" style="margin-left: 79px" required multiple>
                                </label>
                            </div>
                            <select name="segmen_customer"
                                style="border:0px; width:49%; height:40px; border-radius:5px; padding:10px; color:grey; margin-right:10px; margin-bottom:10px;">
                                <option value=" " selected disabled>Pilih Segmen Customer</option>
                                <option value="Umum">Umum</option>
                                <option value="Privat">Privat</option>
                            </select>
                            <div class="button-wrap" style="margin-bottom: 10px;">
                                <label class="new-button" for="upload2"> Video Produk Inovasi
                                    <input id="upload2" type="file" style="margin-left: 79px">
                                </label>
                            </div>
                            
                            <input type="text" name="sellingpoint" placeholder="Masukan Unique Selling Point"
                                style="background-color:white; padding:10px; margin-right:10px; margin-bottom:10px; width:49%; "
                                required>
                            <input type="text" name="keypartner" placeholder="Masukan Key Partner"
                                style="background-color:white; padding:10px; margin-right:10px; margin-bottom:10px; width:49%; "
                                required>


                        </div>



                        <div class="row" style="margin: 20px">
                            <button type="submit"
                                style="right:0px; background-color:cornflowerblue; width:150px; height:45px; border-radius:10px; color:white">
                                Simpan </button>
                        </div>

                    </form>
                    <h3 style="color: cornflowerblue; font-weight:400">Data Produk</h3>
                    <div class="row" style="margin: 20px">
                        <div class="col">

                            <div class="users-table table-wrapper">
                                <table class="posts-table">
                                    <thead>
                                        <tr class="users-table-info">
                                            <th>
                                                no
                                            </th>
                                            <th>Title</th>
                                            <th>Katagori</th>
                                            <th>TKT</th>
                                            <th>Segmen Customer</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produk as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->id_Produk }}
                                                </td>
                                                <td>
                                                    {{ $item->judul }}
                                                </td>
                                                <td>
                                                    <?php
                                                        
                                                    foreach($kategori as $k){
                                                        if ($k->idKategoriProduk == $item->id_Kategori ) {
                                                            echo $k->nama_kategori;
                                                        }
                                                    }
                                                        ?>
                                                    
                                                </td>
                                                <td> {{ $item->nilai_tkt }}</td>
                                                <td> {{ $item->segmen_customer }}</td>
                                                <td>
                                                    <a href="">
                                                        < View>
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

</html>
