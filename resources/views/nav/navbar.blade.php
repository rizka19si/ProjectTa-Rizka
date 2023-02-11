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

    <body >
        <div class="layer"></div>
        <!-- ! Body -->
     
        <div class="page-flex">
            <!-- ! Sidebar -->
            
            <div class="main-wrapper" style="position: fixed; z-index:9999">
                <!-- ! Main nav -->
                <nav class="main-nav--bg">
                    <div class="container main-nav">
                        <div class="main-nav-start">
                            <img src="{{ URL::asset('img/pcr.png') }}" width="250" />
                        </div>
                        <div class="main-nav-end">
                            <a href="/"><p>Home</p></a>
                            <a href="/indexproduk"><p>Product</p></a>

                            
                            <div class="notification-wrapper">
                                <a href="/loginUser" class="primary-default-btn" style="border-radius: 20px; width:110px" title="To messages" type="button">
                                 
                                    Login
                                </a>
                             
                            </div>

                        </div>
                    </div>
                </nav>
                <!-- ! Main -->
              
             
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
