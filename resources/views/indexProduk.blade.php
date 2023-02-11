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
                                <h1>Product</h1>
                            </div>
                        </center>
                        <div style="margin-bottom:30px">
                            <div class="lang-switcher-wrapper"
                                style="display:flex ;
                        flex-direction: row;
                        justify-content: flex-end;">
                                <button class="lang-switcher transparent-btn" type="button" style="margin-right: 20px">
                                    Filter
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-down" aria-hidden="true">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>

                                <input style="margin: 10px; padding:10px" placeholder="Search..." type="text" />
                                <ul class="lang-menu dropdown" style="right: 22%">
                                    <li><a href="##">Mahasiswa</a></li>
                                    <li><a href="##">Dosen</a></li>
                                    <li><a href="##">Semua</a></li>
                                </ul>


                            </div>



                        </div>
                    </div>
                    <div class="row" style="width:100%; height:100%; margin:0px;">

                        
                        <div class="col-lg-4"
                            style="display: flex;
                            height: 50%;
                            flex-direction: column;
                            align-items: center;
                            justify-content: center;">
                            <div
                                style="box-shadow:0px 0px 10px 0px rgb(203, 203, 203) ;border-radius:10px; height:100%; width:100%; overflow:hidden">
                                <div style="overflow:hidden; height:75%; background-size:cover"><img
                                        src="https://awsimages.detik.net.id/community/media/visual/2016/01/07/4da80f4a-fe5e-4585-977d-5c3cae9e0ce2_169.jpg?w=700&q=90"
                                        alt=""> </div>
                                <div style="padding: 10px">
                                    <h4 style="color: #00465f"><a href="/indexdetail">Sistem Informasi Akuntansi</a></h4>
                                    <h6 style="padding-top: 5px; color:#00465f">Rizka Faradilla </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4"
                            style="display: flex;
                            height: 50%;
                            flex-direction: column;
                            align-items: center;
                            justify-content: center;">
                            <div
                                style="box-shadow:0px 0px 10px 0px rgb(203, 203, 203) ;border-radius:10px; height:100%; width:100%; overflow:hidden">
                                <div style="overflow:hidden; height:75%; background-size:cover"><img
                                        src="https://awsimages.detik.net.id/community/media/visual/2016/01/07/4da80f4a-fe5e-4585-977d-5c3cae9e0ce2_169.jpg?w=700&q=90"
                                        alt=""> </div>
                                <div style="padding: 10px">
                                    <h4 style="color: #00465f">Sistem Informasi Akuntansi</h4>
                                    <h6 style="padding-top: 5px; color:#00465f">Rizka Faradilla </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4"
                            style="display: flex;
                            height: 50%;
                            flex-direction: column;
                            align-items: center;
                            justify-content: center;">
                            <div
                                style="box-shadow:0px 0px 10px 0px rgb(203, 203, 203) ;border-radius:10px; height:100%; width:100%; overflow:hidden">
                                <div style="overflow:hidden; height:75%; background-size:cover"><img
                                        src="https://awsimages.detik.net.id/community/media/visual/2016/01/07/4da80f4a-fe5e-4585-977d-5c3cae9e0ce2_169.jpg?w=700&q=90"
                                        alt=""> </div>
                                <div style="padding: 10px">
                                    <h4 style="color: #00465f">Sistem Informasi Akuntansi</h4>
                                    <h6 style="padding-top: 5px; color:#00465f">Rizka Faradilla </h6>
                                </div>
                            </div>
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
