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
        #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #fff;
        color: #333;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 99999;
        left: 10%;
        top: 30px;
        font-size: 17px;
    }

    #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {
            top: 0;
            opacity: 0;
        }

        to {
            top: 30px;
            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            top: 0;
            opacity: 0;
        }

        to {
            top: 30px;
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeout {
        from {
            top: 30px;
            opacity: 1;
        }

        to {
            top: 0;
            opacity: 0;
        }
    }

    @keyframes fadeout {
        from {
            top: 30px;
            opacity: 1;
        }

        to {
            top: 0;
            opacity: 0;
        }
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
            
            <main class="container main" id="skip-target"
                style=" width:100vw; max-width:100vw; padding:0px; margin:0px">
                <script>
                    function myFunction() {
                      var x = document.getElementById("snackbar");
                      x.className = "show";
                      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                    }
                    </script>
                     @error('email')
                     <script> window.onload = myFunction </script>
                 <div id="snackbar">{{$message}}</div>
    
                 @enderror
                <div class="container" id="home" style="width:100vw; height:100vh; margin:0px; padding:0px">
                    <div style="width:100vw; height:100%; margin:0px; display:flex">
                        <div
                            style="display: flex;
                            width:100%;
                            height: 100%;
                            flex-direction: column;
                            align-items: center;
                            justify-content: center;">
                            <img src="{{ URL::asset('img/gambar2.png') }}" />


                        </div>
                        <div
                            style="width:100%; 
                            background-image: linear-gradient(to right, #428BCA , #96C7F1); 
                            display:flex; 
                            flex-direction:column; 
                            align-items:center;
                            justify-content: center;">
                            <div class="white-block"
                                style="display: flex; flex-direction:column; align-items:center; justify-content:center; width: 50%; height:50%">
                                <h1>Login</h1>
                                <hr>
                                <form action="userlogin/auth" method="POST">
                                    @csrf
                                    <input type="text" name="email" placeholder="Email"
                                        style="width: 90%; padding:10px; margin:10px" />

                                    <input type="password" name="password" placeholder="Password"
                                        style="width: 90%; padding:10px; margin:10px" />
                                    <button type="submit" class="primary-default-btn"
                                        style="border-radius: 20px; width:130px; margin:10px"
                                        >Login</button>
                                </form>

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
