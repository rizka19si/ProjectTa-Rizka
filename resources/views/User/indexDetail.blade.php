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
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body style="background: white">
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->


        <div class="main-wrapper">
            <!-- ! Main nav -->
            @include('nav.navbar')
            <!-- ! Main -->
            <main class="container main" id="skip-target">

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="container" id="product" style="width:100%; height:70vh; margin:0px">
                    <div>
                        <center>
                            <div style="margin-bottom: 60px">
                                <h1>Product Inovasi</h1>
                            </div>
                        </center>

                    </div>
                    @foreach ($produk as $p)
                    <div class="row"
                        style="width:100%; height:100%; margin:0px; display:flex; justify-content: center;">
                        <div class="col-lg-5">
                            <section data-galerijid="1" class="afbeeldingengalerij">
                                <section data-galerijid="1" data-kpics="5" class="afbeeldingengalerij">

                                    <section class="galerij">
                                        <div class="galerij-G">
                                            @php
                                                $o = 0;
                                            @endphp
                                            @foreach ($photo as $v)
                                                @php
                                                    $o++;
                                                @endphp
                                                @if ($o == 1)
                                                    <div class="kimg kimgwidth"><img data-gitem="1" style="border-radius: 20px"
                                                            src="{{ asset('img/ProdukImage/' . $v->nama_foto) }}">
                                                    </div>
                                                @endif
                                            @endforeach

                                            <div class="galerij-chevron-L">
                                                <button data-chevron="links">
                                                    &lt;</i>
                                                </button>
                                            </div>
                                            <div class="galerij-chevron-R">
                                                <button data-chevron="rechts">
                                                    &gt;</i>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="galerij-K" data-kgalerij="1">
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($photo as $foto)
                                                @php
                                                    $i++;
                                                @endphp

                                                <div class="kimg kimgwidth"><img style="border-radius: 5px"
                                                        data-kitem="{{ $i }}"
                                                        src="{{ asset('img/ProdukImage/' . $foto->nama_foto) }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </section>
                                    <section>
                                        @foreach ($video as $vid)
                                            <video width="100%" height="280px" data-kitem="1" controls style="border-radius: 20px">
                                                <source src="{{ asset('img/ProdukVideo/' . $vid->url) }}"
                                                    type="video/mp4">
                                            </video>
                                        @endforeach
                                    </section>
                                    <!-- </div> -->
                                </section>
                            </section>

                        </div>

                        <div class="col-lg-5"
                            style="display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: flex-start;">
                            <div>
                                <div style="padding:10px">
                                    <h3 style="color:#234374">{{ $p->judul }}</h3>
                                </div>
                                <div style="padding:5px; color:grey">
                                    <h6>TKT</h6>
                                </div>
                                <div style="padding:10px">
                                    <h3 style="color:#234374">{{ $p->nilai_tkt }}</h3>
                                </div>
                                <div style="padding:5px; color:grey">
                                    <h6>Segment Customer</h6>
                                </div>
                                <div style="padding:10px">
                                    <h3 style="color:#234374">{{ $p->segmen_customer }}</h3>
                                </div>
                                <div style="padding:5px; color:grey">
                                    <h6>Unique Selling Point</h6>
                                </div>
                                <div style="padding:10px">
                                    <h3 style="color:#234374">{{ $p->uniques_selling_point }}</h3>
                                </div>
                                <div style="padding:5px; color:grey">
                                    <h6>Gambaran Pesaing</h6>
                                </div>
                                <div style="padding:10px; color:#234374">
                                    <p>{{ $p->gambaran_pesaing }}</p>
                                </div>
                                <div style="padding:5px; color:grey">
                                    <h6>Jenis</h6>
                                </div>
                                <div style="padding:10px; color:#234374">
                                    <p>{{ $p->jenis }}</p>
                                </div>
                                <div style="display:flex">
                                </div>
                            </div>

                        </div>

                    </div>
                @endforeach
            </main>
            <!-- ! Footer -->

        </div>
    </div>
    <!-- Chart library -->
    <script src="./plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('js/script.js') }}"></script>

        <script src="{{ asset('js/gallery.js') }}"></script>
</body>

</html>
