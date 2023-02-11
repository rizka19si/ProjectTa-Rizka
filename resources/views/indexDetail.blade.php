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
                                <h1>Product Inovasi</h1>
                            </div>
                        </center>
                       
                    </div>
                    <div class="row" style="width:100%; height:100%; margin:0px; display:flex; justify-content: center;" >


                        <div class="col-lg-5"
                            style="display: flex;
                           background-color:blue;
                            flex-direction: column;
                            align-items: center;
                            justify-content: center;">
                            <div>
                               <div class="row" style="width:100%; height:100%; margin:0px; display:flex; justify-content: center;">
                                    <div class="col-lg-7" style="background-color: aqua;"> </div>
                               </div>
                            </div>
                        </div>

                        <div class="col-lg-5"
                            style="display: flex;
                           background-color:red;
                            flex-direction: column;
                            align-items: center;
                            justify-content: center;">
                            <div>
                                
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
