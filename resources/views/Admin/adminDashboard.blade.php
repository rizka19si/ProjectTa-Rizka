<!DOCTYPE html>
<html lang="en">
{{-- @php
    if (session()->has('email') != null) {
    } else {
        echo `<script>
            location.href = '/adminlogin ';
        </script>`;
    }
@endphp --}}
@foreach ($user as $p)

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projek TA</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
        <!-- Custom styles -->
        <link rel="stylesheet" href="./css/style.min.css">
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
        <style>
            #kategoriChart {
                width: 100%;
                height: 500px;
            }

            #jenisChart {
                width: 100%;
                height: 500px;
            }
        </style>
    </head>

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
                                <span class="sidebar-user__title">{{ $p->name }}</span>
                                <span class="sidebar-user__subtitle">
                                    @if ($p->role == 1)
                                        Admin Super
                                    @elseif ($p->role == 2)
                                        Mahasiswa
                                    @endif
                                </span>
                            </div>
                        </a>
                        <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                            <span class="sr-only">Toggle menu</span>
                            <span class="icon menu-toggle" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="sidebar-body">
                        <ul class="sidebar-body-menu">
                            <li>
                                <a class="active" href="/dashboard"><span class="icon home"
                                        aria-hidden="true"></span>Dashboard</a>
                            </li>
                            <li>
                                <a class="show-cat-btn" href="##">
                                    <span class="icon document" aria-hidden="true"></span>Produk Inovasi
                                    <span class="category__btn transparent-btn" title="Open list">
                                        <span class="sr-only">Open list</span>
                                        <span class="icon arrow-down" aria-hidden="true"></span>
                                    </span>
                                </a>
                                <ul class="cat-sub-menu">
                                    <li>
                                        <a href="/produk">Produk</a>
                                    </li>
                                    <li>
                                        <a href="/kategori">Kategori</a>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                        <span class="system-menu__title"></span>
                        <ul class="sidebar-body-menu">

                            <li>
                                <a href="/adminlogin/logout"><svg style="margin-right: 10px"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"
                                        aria-hidden="true">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>Logout</a>
                            </li>
                        </ul>
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
                            <div class="notification-wrapper">
                                <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
                                    <span class="sr-only">To messages</span>
                                    <span class="icon notification active" aria-hidden="true"></span>
                                </button>
                                <ul class="users-item-dropdown notification-dropdown dropdown">
                                    @foreach ($produkBaru as $item)
                                                    
                                               
                                    <li>
                                        <a href="/produk">
                                            <div class="notification-dropdown-icon danger">
                                                <i data-feather="info" aria-hidden="true"></i>
                                            </div>
                                            <div class="notification-dropdown-text">
                                                <span class="notification-dropdown__title">Produk Baru</span>
                                                <span class="notification-dropdown__subtitle"> {{ $item->judul }}</span>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                   
                                </ul>
                            </div>

                        </div>
                    </div>
                </nav>
                <!-- ! Main -->
                <main class="main users chart-page" id="skip-target">
                    <div class="container" style="width:100%; margin:0px">
                        <h2 class="main-title">Dashboard</h2>

                        <div class="container">
                            <div class="row">

                                <div class="col-5"
                                    style="background-color: white; border-radius:10px; display:flex; flex-direction:row; align-items:center; padding:30px; margin:20px">
                                    <div
                                        style="display:flex; align-items:center; flex-direction:column; margin-right:5%">
                                        <div><img src="./img/avatar/avatar-illustrated-01.png" alt="Lala"
                                                width="130" style="border-radius: 50%;"> </div>
                                        <div>
                                            <h3 style="color:cornflowerblue">{{ $p->name }}</h3>
                                        </div>
                                    </div>
                                    <div style="display:flex; flex-direction:column;">
                                        <label>nama lengkap</label>
                                        <div>
                                            <h3 style="color:cornflowerblue; margin-bottom:20px;">
                                                {{ $p->name }}
                                            </h3>
                                        </div>

                                        <label>email</label>
                                        <div>
                                            <h3 style="color:cornflowerblue; margin-bottom:20px;">
                                                {{ $p->email }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-5"
                                    style="background-color: white; border-radius:10px; display:flex; flex-direction:row; align-items:center; padding:30px; margin:20px">
                                    <div id="kategoriChart"> </div>
                                </div>
                                <div class="col-5"
                                    style="background-color: white; border-radius:10px; display:flex; flex-direction:row; align-items:center; padding:30px; margin:20px">
                                    <div id="jenisChart"> </div>
                                </div>
                            </div>
                           
                            <div class="row" style="width:100%; margin:0px">
                                <div class="col-12">
                                    <div class="users-table table-wrapper">
                                        <table class="posts-table">
                                            <thead>
                                                <tr class="users-table-info">
                                                    <th>
                                                        no
                                                    </th>
                                                    <th>Title</th>
                                                    <th>Katagori</th>
                                                    <th>TKT</th>
                                                    <th>Segmen Customer</th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($produk as $item)
                                                    <tr>
                                                        <td>
                                                            {{ $item->id_Produk }}
                                                        </td>
                                                        <td>
                                                            {{ $item->judul }}
                                                        </td>
                                                        <td>
                                                            @foreach ($kategori as $k)
                                                                @if ($item->id_Kategori == $k->idKategoriProduk)
                                                                    {{ $k->nama_kategori }}
                                                                @endif
                                                            @endforeach

                                                        </td>
                                                        <td> {{ $item->nilai_tkt }}</td>
                                                        <td> {{ $item->segmen_customer }}</td>
                                                        <td>
                                                            <a href="produk/{{ $item->id_Produk }}">
                                                                < View>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
        <script>
            am5.ready(function() {

                // Create root element
                // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                var root = am5.Root.new("kategoriChart");


                // Set themes
                // https://www.amcharts.com/docs/v5/concepts/themes/
                root.setThemes([
                    am5themes_Animated.new(root)
                ]);


                // Create chart
                // https://www.amcharts.com/docs/v5/charts/xy-chart/
                var chart = root.container.children.push(am5xy.XYChart.new(root, {
                    panX: true,
                    panY: true,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    pinchZoomX: true
                }));

                // Add cursor
                // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
                var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
                cursor.lineY.set("visible", false);


                // Create axes
                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                var xRenderer = am5xy.AxisRendererX.new(root, {
                    minGridDistance: 30
                });
                xRenderer.labels.template.setAll({
                    rotation: -90,
                    centerY: am5.p50,
                    centerX: am5.p100,
                    paddingRight: 15
                });

                xRenderer.grid.template.setAll({
                    location: 1
                })

                var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                    maxDeviation: 0.3,
                    categoryField: "country",
                    renderer: xRenderer,
                    tooltip: am5.Tooltip.new(root, {})
                }));

                var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                    maxDeviation: 0.3,
                    renderer: am5xy.AxisRendererY.new(root, {
                        strokeOpacity: 0.1
                    })
                }));


                // Create series
                // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
                var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                    name: "Series 1",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "value",
                    sequencedInterpolation: true,
                    categoryXField: "country",
                    tooltip: am5.Tooltip.new(root, {
                        labelText: "{valueY}"
                    })
                }));

                series.columns.template.setAll({
                    cornerRadiusTL: 5,
                    cornerRadiusTR: 5,
                    strokeOpacity: 0
                });
                series.columns.template.adapters.add("fill", function(fill, target) {
                    return chart.get("colors").getIndex(series.columns.indexOf(target));
                });

                series.columns.template.adapters.add("stroke", function(stroke, target) {
                    return chart.get("colors").getIndex(series.columns.indexOf(target));
                });


                // Set data
                var data = [
                @foreach($perKategori as $kateg)    
                {
                    country: @foreach($kategori as $k) @if($k->idKategoriProduk == $kateg->id_Kategori) "{{$k->nama_kategori}}" @endif @endforeach,
                    value: {{$kateg->jumlah}}
                },
            @endforeach
         ];

                xAxis.data.setAll(data);
                series.data.setAll(data);


                // Make stuff animate on load
                // https://www.amcharts.com/docs/v5/concepts/animations/
                series.appear(1000);
                chart.appear(1000, 100);

            }); // end am5.ready()
        </script>


<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("jenisChart");
    
    
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
    
    
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(am5percent.PieChart.new(root, {
      layout: root.verticalLayout
    }));
    
    
    // Create series
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
    var series = chart.series.push(am5percent.PieSeries.new(root, {
      valueField: "value",
      categoryField: "category"
    }));
    
    
    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    series.data.setAll([
      @foreach($perJenis as $jen)
      { value: {{$jen->jumlah}}, category: "{{$jen->jenis}}" },
      @endforeach
    ]);
    
    
    // Play initial series animation
    // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
    series.appear(1000, 100);
    
    }); // end am5.ready()
    </script>
        <!-- Chart library -->
        <script src="./plugins/chart.min.js"></script>
        <!-- Icons library -->
        <script src="plugins/feather.min.js"></script>
        <!-- Custom scripts -->
        <script src="js/script.js"></script>
    </body>
@endforeach

</html>
