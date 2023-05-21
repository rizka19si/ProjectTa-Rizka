<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projek TA</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/svg/logo.svg" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/style.css">
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
                        <div class="col-lg-4"
                            style="display: flex;
                            height: 70%;
                            border-radius:20px;
                            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
                            flex-direction: column;
                            align-items: center;
                            margin-top:15vh;
                            justify-content: center;">
                            <div style="background-color:#418bca; border-radius:300px; width:200px; height:200px">

                            </div>
                            <br>
                            @foreach ($users as $u)
                            <b>{{$u->name}}</b>
                            <br>
                            <p>{{$u->id}}</p>
                            @endforeach
                            <br>
                            <a class="primary-default-btn" style="border-radius: 20px; width:130px"
                                href="/userlogin/logout">Logout</a>

                        </div>
                        <div class="col-lg-8"
                            style="border-radius:10px;
                            margin-top:15vh;
                            padding-left:80px">

                            <div class="col-lg-12"
                                style="background-color: #418bca;
                            color:white;
                            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
                            padding:15px">
                                Data
                                Produk yang dihasilkan</div>
                            @foreach ($produk as $p)
                            
                                    <div class="col-lg-11"
                                        style="background-color: #ffffff;
                                margin:30px;
                                border-radius:10px;
                                height:130px;
                                box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
                                padding:15px">



                                        <div class="col-lg-12" style="display: flex">
                                            <div
                                                style="background-color:#418bca;
                                border-radius:300px;
                                width:40px;
                                height:40px;
                                margin-right:10px">

                                            </div>

                                            <div>
                                             
                                                <b>{{$u->name}}</b>
                                                <p>{{$u->id}}</p>
                                               
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-12" style="padding-top:10px">
                                            {{$p->judul}}
                                        </div>

                                    </div>
                             
                            @endforeach
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
