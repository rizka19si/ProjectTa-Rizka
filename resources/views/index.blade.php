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
                <div class="container" id="home" style="width:100%; height:90vh; margin:0px">
                    <div class="row" style="width:100%;height:100%; margin:0px;">
                        <div class="col-lg-6"
                            style="display: flex;
                            height: 100%;
                            flex-direction: column;
                            align-items: center;
                            justify-content: center;">
                            <h1 style="color: #00465f; font-size:56pt">PRODUK</h1>
                            <h1 style="color: #00465f; font-size:56pt">INOVASI</h1>
                            <br>
                            <a class="primary-default-btn" style="border-radius: 20px; width:130px"
                                href="/indexproduk">Check</a>

                        </div>
                        <div class="col-lg-6"
                            style="background-color: white; border-radius:10px; display:flex; flex-direction:row; align-items:center; padding:30px;">
                            <img src="{{ URL::asset('img/gambar1.png') }}" />
                        </div>
                    </div>
                    <div class="row" style="width:100%; margin:0px">

                    </div>
                </div>
                
            </main>
            <!-- ! Footer -->

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
