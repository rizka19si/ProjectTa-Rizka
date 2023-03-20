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
    <link rel="stylesheet" href="./css/style.css">
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


    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border-radius: 10px;
        overflow: hidden;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 16px;
        background-color: cornflowerblue;
        color: white;
    }

    .modal-body {
        padding: 2px 16px;
    }

    .modal-footer {
        padding: 2px 16px;
        background-color: cornflowerblue;
        color: white;
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
                            <span class="sidebar-user__title">Rizka Faradilla</span>
                            <span class="sidebar-user__subtitle">Mahasiswa</span>
                        </div>
                    </a>

                </div>
                <div class="sidebar-body">
                    <ul class="sidebar-body-menu">
                        <li>
                            <a href="/yudisium"><span class="icon home" aria-hidden="true"></span>Yudisium</a>
                        </li>
                    </ul>
                    <span class="system-menu__title"></span>
                    {{-- <ul class="sidebar-body-menu">

                        <li>
                            <a href="/userlogin/logout"><svg style="margin-right: 10px" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-log-out" aria-hidden="true">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>Logout</a>
                        </li>
                    </ul> --}}
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


                    </div>
                </div>
            </nav>
            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target">
                <div class="container">
                    <h2 class="main-title" id="testone" style="color: cornflowerblue">Yudisium</h2>
                    <h3 style="color: cornflowerblue; font-weight:400"></h3>
                    <span id="output"> </span>
                    <form onsubmit="sendData()" id="yudisiumform" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">


                                <div class="col-lg-5">
                                    <input type="text" name="judul" id="judul" placeholder="Masukan Judul"
                                        style="background-color:white; padding:10px; width:100%; height:80%; margin-right:10px; margin-bottom:10px"
                                        required>
                                </div>

                                <div class="col-lg-5">
                                    <textarea name="gambaran_pesaing" id="gambaran" placeholder="Gambaran Pesaing"
                                        style="background-color:white; padding:10px; border-radius:5px; border:0px; width:100%; margin-right:10px; margin-bottom:10px"
                                        required></textarea>
                                </div>
                                {{-- <input type="hidden" name="" value="-"> --}}

                                <div class="col-lg-5">
                                    <select name="id_Kategori" id="IdKategori" onchange="indikatornilai(this.value)"
                                        style="border:0px; width:100%; height:40px; border-radius:5px; padding:10px; color:grey; margin-right:10px; margin-bottom:10px">
                                        <option value=" " selected disabled>Pilih Kategori</option>
                                        {{-- @foreach ($kategori as $kate)
                                            <option value="{{ $kate->idKategoriProduk }}"> {{ $kate->nama_kategori }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="col-lg-5">
                                    <div class="button-wrap">
                                        <label class="new-button" for="photos" style="width: 180px"> Foto Produk
                                            Inovasi
                                            <input id="photos"  name="Photos[]" type="file"
                                                style="margin-left: 72px" accept="image/png, image/jpeg, image/jpg"
                                                required multiple>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" name="nilai_tkt" placeholder="TKT" value="" class="form-input"
                                        id="total"
                                        style="background-color:white; padding:10px; margin-bottom:10px; width:50%;"
                                        readonly required>
                                    <button id="tktbtn" type="button"
                                        style="right:0px; background-color:cornflowerblue; width:19%; height:40px; border-radius:10px; color:white">
                                        Ukur </button>
                                </div>
                                <div id="modaltkt" class="modal">

                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 style="color: #fff">Nilai TKT</h2>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row"
                                                style="margin: 20px; display:flex; justify-content: flex-end;">
                                                <div class="col">

                                                    <div class="users-table">
                                                        <table class="posts-table">
                                                            <thead>
                                                                <tr class="users-table-info">
                                                                    <th>
                                                                        No
                                                                    </th>
                                                                    <th>Indikator</th>
                                                                    <th>Nilai</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody id="indikatorPertanyaan">
                                                                {{-- Isi Looping Indikator Nilai --}}

                                                            </tbody>
                                                        </table>
                                                       
                                                    </div>
                                                    <button type="button" id="spantkt"
                                                    style=" margin:10px; background-color:cornflowerblue; width:19%; height:40px; border-radius:10px; color:white">
                                                    Hitung</button>
                                                </div>
                                                
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                {{-- <div class="col-lg-5">
                                    <div class="button-wrap" style="margin-bottom: 10px;">
                                        <label class="new-button" for="videoProduk"> Video Produk Inovasi
                                            <input id="videoProduk" name="Video" type="file"
                                                accept="video/mp4, video/x-m4v" style="margin-left: 79px" required>
                                        </label>
                                    </div>
                                </div> --}}
                                <div class="col-lg-5">
                                    <select id="segmen" name="segmen_customer"
                                        style="border:0px; width:100%; height:40px; border-radius:5px; padding:10px; color:grey; margin-right:10px; margin-bottom:10px;"
                                        required>
                                        <option value=" " selected disabled>Pilih Segmen Customer</option>
                                        <option value="Umum">Umum</option>
                                        <option value="Privat">Privat</option>
                                    </select>
                                </div>

                                <div class="col-lg-5">
                                    <input type="text" id="unique" name="uniques_selling_point"
                                        placeholder="Masukan Unique Selling Point"
                                        style="background-color:white; padding:10px; margin-right:10px; margin-bottom:10px; width:100%; "
                                        required>
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" id="key_partner" name="key_partner"
                                        placeholder="Masukan Key Partner"
                                        style="background-color:white; padding:10px; margin-right:10px; margin-bottom:10px; width:100%; "
                                        required>
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" id="id_mahasiswa" name="id_mahasiswa" value="1"
                                        style="background-color:white; padding:10px; margin-right:10px; margin-bottom:10px; width:100%; "
                                        hidden required>
                                </div>



                            </div>
                        </div>
                        <div class="row" style="margin: 20px">
                            <button type="submit"
                                style="right:0px; background-color:cornflowerblue; width:150px; height:45px; border-radius:10px; color:white">
                                Simpan </button>
                        </div>

                    </form>



                    @if ($errors->any())
                        <div id="myModal" class="modal" style="">

                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <p style="padding: 5%">{{ $errors->first() }}</p>
                            </div>

                        </div>

                        <script>
                            var modal = document.getElementById("myModal");
                            modal.style.display = "block"
                        </script>
                    @endif
                    
                        <h3 style="color: cornflowerblue; font-weight:400">Data Produk</h3>
                        <div class="row" style="margin: 20px">
                            <div class="col">

                                <div class="users-table">
                                    <table class="posts-table">
                                        <thead>
                                            <tr class="users-table-info">
                                                <th style="width: 15%">id</th>
                                                <th style="width: 40%">Title</th>
                                                <th>Katagori</th>
                                                <th>TKT</th>
                                                <th>Segmen Customer</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableData">
                                           
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

    <script>
        var modal = document.getElementById("myModal");


        // var span = document.getElementByid("close");

        // // When the user clicks the button, open the modal 


        // // When the user clicks on <span> (x), close the modal
        // span.onclick = function() {
        //     modal.style.display = "none";
        // }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        // Get the modal
        var modaltkt = document.getElementById("modaltkt");

        // Get the button that opens the modal
        var btntkt = document.getElementById("tktbtn");

        // Get the <span> element that closes the modal
        var spantkt = document.getElementById("spantkt");

        // When the user clicks the button, open the modal 
        btntkt.onclick = function() {
            modaltkt.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        spantkt.onclick = function() {
            modaltkt.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modaltkt) {
                modaltkt.style.display = "none";
            }
        }
    </script>

    <script>
        var httphost = window.location.origin;
        const tableData = document.getElementById('tableData');
        tableData.innerHTML = `Mohon Pilih Kategori Terlebih Dahulu.`;
        window.onload = (event) => {
            fetch(httphost + '/api/yudisium')
                .then(res => {
                    return res.json();
                })
                .then(data => {
                    console.log(data);
                    tableData.replaceChildren();
                    data.forEach(d => {

                        const dataRow = `<tr>
                                                    <td>
                                                        ${d.id_Produk }
                                                    </td>
                                                    <td>
                                                        ${d.judul}
                                                    </td>
                                                    <td>
                                                       ${d.nama_kategori}
                                                    </td>
                                                    <td> ${d.nilai_tkt}</td>
                                                    <td> ${d.segmen_customer}</td>
                                                    <td>
                                                        <a href="/yudisium/${d.id_Produk}">
                                                            < View>
                                                        </a>
                                                    </td>
                                                    </tr>`;


                        tableData.innerHTML += dataRow;

                    });
                })
                .catch(error => console.log(error));
        };
    </script>

    <script>
        var idKategori = document.getElementById("IdKategori");
        const head = document.getElementById('indikatorPertanyaan');


        head.innerHTML = `<tr>
                            <td></td>
                            <td>Mohon Pilih Kategori Terlebih Dahulu.</td>
                            <td></td>
                        </tr>`;
        indikator();
        var i = 0;

        function indikator() {
            fetch(httphost + '/api/kategori')
                .then(res => {
                    return res.json();
                })
                .then(data => {
                    console.log(data);

                    data.forEach(kate => {

                        const markup = `<option value="${kate.idKategoriProduk}"> ${kate.nama_kategori}
                                            </option>`;
                        idKategori.innerHTML += markup;

                    });
                })
                .catch(error => console.log(error));

        }

        function indikatornilai(valu) {
            var value = idKategori.value;

            head.replaceChildren();
            console.log(value);
            //var text = idKategori.options[idKategori.selectedIndex].text;

            fetch(httphost + '/api/indikator/' + valu)
                .then(res => {
                    return res.json();
                })
                .then(data => {
                    console.log(data);

                    data.forEach(indi => {
                        i++;
                        const markup = `<tr>
                                            <td>
                                                ${i}
                                            </td>
                                            <td>
                                                ${indi.pertanyaan}
                                            </td>
                                            <td>
                                                <select name="nilaitkt${i}" id="nilaitkt${i}" onchange="nilaical()"
                                                style="border:0px; width:80%; height:40px; padding:10px; color:grey;">
                                                    <option value="0">0%</option>
                                                    <option value="20">20%</option>
                                                    <option value="40">40%</option>
                                                    <option value="60">60%</option>
                                                    <option value="80">80%</option>
                                                    <option value="100">100%</option>
                                                </select>
                                            </td>
                                        </tr>`;
                        head.innerHTML += markup;

                    });
                })
                .catch(error => console.log(error));
            return i;


        }

        function nilaical() {
            var nilai = 0;
            var total = 0;
            for (let g = 0; g < i; g++) {
                nilai += parseFloat(document.getElementById(`nilaitkt${g+1}`).value);
                console.log(nilai);
            }
            total = nilai / i;
            document.getElementById('total').value = (total.toFixed(2) + '%');
            console.log(total);


        }
    </script>

    {{-- Request Form Body --}}
    <script>
        function sendData() {

            const XHR = new XMLHttpRequest();
            var output = document.getElementById('output');
            var judulival = document.getElementById('judul').value;
            var gambaranval = document.getElementById('gambaran').value;
            var kategorival = document.getElementById('IdKategori').value;
            var photosval = document.getElementById('photos');
            var photosLength = document.getElementById('photos').files.length;
            var tktval = document.getElementById('total').value;
         
            var segmenval = document.getElementById('segmen').value;
            var uniqueival = document.getElementById('unique').value;
            var keyval = document.getElementById('key_partner').value;
            var idmahasiswaval = document.getElementById('id_mahasiswa').value;

            // Bind the FormData object and the form element
            var FD = new FormData();
            FD.append('id_mahasiswa', idmahasiswaval);
            FD.append('id_Kategori', kategorival);
            FD.append('judul', judulival);
            FD.append('segmen_customer', segmenval);
            FD.append('key_partner', keyval);
            FD.append('nilai_tkt', tktval);
            FD.append('gambaran_pesaing', gambaranval);
            FD.append('uniques_selling_point', uniqueival);
            // FD.append('Video',videoval);
            for (var i = 0; i < photosLength; i++) {
                FD.append('Photos[]', photosval.files[i]);
            }
            // Define what happens on successful data submission
            XHR.addEventListener("load", (event) => {
                alert(event.target.responseText);
            });

            // Define what happens in case of error
            XHR.addEventListener("error", (event) => {
                alert('Oops! Something went wrong.');
            });

            // Set up our request
            XHR.open("POST", httphost + "/api/yudisium");
            XHR.onload = (progress) => {
                alert(
                    XHR.status === 200 ?
                    "Uploaded!" :
                    `Error ${XHR.status} occurred when trying to upload your file.<br />`);
            };
            // The data sent is what the user provided in the form
            XHR.send(FD);
        }

        // Get the form element
        // const form = document.getElementById("yudisiumform");

        // // Add 'submit' event handler
        // form.addEventListener("submit", (event) => {
        //     event.preventDefault();

        //     sendData();
        // });
    </script>
</body>


</html>
