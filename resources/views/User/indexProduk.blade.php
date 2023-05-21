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
    <link rel="stylesheet" href="{{asset('/css/style.min.css')}}">
    <style>
        html {
            scroll-behavior: smooth;
        }
        .pagination{
            display: flex;
            align-items: center
        }
        .pagination ul{
            padding: 30px;
        }
        .pagination li{
            margin: 20px;
            padding: 20px
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);

        }
        .page-item{

        }
        .pagination .page-item span{
            color: #00465f;
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
                            <form action="indexproduk/search" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div
                                    style="display:flex ;
                        flex-direction: row;
                        justify-content: flex-end;">
                                    <select name="filter" class="lang-switcher transparent-btn">
                                        <option value="" selected disabled>
                                            Filter
                                        </option>
                                        <option value="mahasiswa">
                                            Mahasiswa
                                        </option>
                                        <option value="dosen">
                                            Dosen
                                        </option>
                                        <option value="semua">
                                            Semua
                                        </option>
                                    </select>
                                    <input name="cari" style="margin: 10px; padding:10px" placeholder="Search..."
                                        type="text" />

                                    <input type="submit" hidden />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div {{-- id="indikatorPertanyaan" --}} class="row" style="width:100%; height:100%; margin:0px;">
                        @foreach ($produk as $p)
                            <a href="indexproduk/{{ $p->id_Produk }}">
                                <div class="col-lg-4"
                                    style="display: flex;
                            height: 50%;
                            margin-top: 30px;
                            flex-direction: column;
                            align-items: center;
                            justify-content: center;">
                                    <div
                                        style="box-shadow:0px 0px 10px 0px rgb(203, 203, 203) ;border-radius:10px; height:100%; width:100%; overflow:hidden">
                                        <div style="overflow:hidden; height:75%; background-size:contain">
                                            @foreach ($fotoproduk as $fp)
                                                @if ($fp->idProdukInovasi == $p->id_Produk)
                                                    <img src="{{ asset('img/ProdukImage/' . $fp->nama_foto) }}"
                                                        alt="" style="">
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                    <div style="padding: 10px">
                                        <h4 style="color: #00465f"><a>{{ $p->judul }}</a>
                                        </h4>
                                        <h6 style="padding-top: 5px; color:#00465f">
                                            @foreach ($users as $u)
                                                @if ($p->id_mahasiswa == $u->id)
                                                    {{ $u->name }}
                                                @endif
                                            @endforeach
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
                
            </div>
            <div style="display: flex; justify-content:center">
                {{ $produk->links() }}
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

<script>
    const head = document.getElementById('indikatorPertanyaan');
    var markup = '';
    var i = 0;
    var j = 0;

    //var text = idKategori.options[idKategori.selectedIndex].text;
    fetch('http://127.0.0.1:8000/api/produk')
        .then(res => {
            return res.json();
        })
        .then(data => {
            console.log(data);

            data.forEach(produk => {
                i++;

                if (i % 3 == 0) {
                    markup = '</div>';
                    // markup = '<div class=row>';

                    head.innerHTML += markup;
                } else {
                    markup = `<div class="col-lg-4"
                            style="display: flex;
                            height: 50%;
                            flex-direction: column;
                            align-items: center;
                            justify-content: center;">
                            <div
                                style="box-shadow:0px 0px 10px 0px rgb(203, 203, 203) ;border-radius:10px; height:100%; width:100%; overflow:hidden">
                                <div style="overflow:hidden; height:75%; background-size:cover"><img
                                        src="{{ asset('img/ProdukImage/1679309146433-kantor.jpg') }}"
                                        alt=""> </div>
                                <div style="padding: 10px">
                                    <h4 style="color: #00465f; text-overflow:elipsis;white-space: nowrap;
  overflow: hidden;"><a href="/indexproduk/${produk.id_Produk}">${produk.judul}</a>
                                    </h4>
                                    <h6 style="padding-top: 5px; color:#00465f">Rizka Faradilla </h6>
                                </div>
                            </div>
                        </div>`;
                    head.innerHTML += markup;
                }


            });
        })
        .catch(error => console.log(error));
</script>
</body>

</html>
