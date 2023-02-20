<!DOCTYPE html>
<html lang="en">
    @php
    if (session()->has('email') != null) {
        echo "<script>
            location.href = '/dashboard';
        </script>";
    } else {
        
    }
@endphp
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

        <div class="main-wrapper" style="height: 100vh">
            <!-- ! Main nav -->

            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target" >
                <div class="container" style="display: flex; align-items:center; position:relative; margin-top:19vh ; justify-items:center; flex-direction:column;">
                    <div style="border:1px solid grey; border-radius:15px; padding:50px;">
                    <center>
                        <img src="{{ URL::asset('img/pcr.png') }}" width="250" />
                    <h2 class="main-title">Produk Inovasi</h2></center>
                    <h3 style="color: cornflowerblue; font-weight:400"></h3>
                    <form action="/adminlogin/auth" method="POST">
                        @csrf
                        <div style="margin: 20px">
                            <input type="text" name="email" placeholder="Masukan Email"
                                style="background-color:white; padding:10px; width:100%; "
                                required>
                        </div>
                        <div style="margin: 20px">
                            <input type="password" name="password" placeholder="Masukan Password"
                                style="background-color:white; padding:10px; width:100%; "
                                required>
                        </div>
                        <div  style="margin: 20px">
                            <button type="submit"
                                style=" background-color:cornflowerblue; width:100%; height:45px; border-radius:10px; color:white">
                                Login </button>
                        </div>

                    </form>
                    </div>

                </div>
            </main>
            <!-- ! Footer -->
            <footer class="footer" style="bottom: 0px">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p>2021 © Rizka Faradilla - <a href="#" target="_blank" rel="noopener noreferrer">Project
                                TA</a></p>
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
