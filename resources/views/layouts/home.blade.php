<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title', 'Home') | {{ config('app.name', 'Laravel') }}</title>

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
* Template Name: Vesperr
* Updated: Mar 10 2023 with Bootstrap v5.2.3
* Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->

    <link href="{{ asset('/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css" rel='stylesheet' /> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

</head>


<body>


    <style>
        .event-title {
            white-space: normal;
            padding: 5px;
        }

        .event-title-wrap {
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
            padding-bottom: 5px;
            /* Padding antara judul dan tanggal */
        }


        .fc-daygrid-event .fc-event-title {
            padding-top: 5px;
            /* Sesuaikan dengan nilai padding yang diinginkan */
        }


        .fc-daygrid-event .fc-event-time {
            display: block;
            /* color: #3A87AD; */

            white-space: normal;
        }


        .event-date {
            font-size: 10px;
            /* color: #888; */
        }

        .fc-event {
            cursor: pointer;
        }


        .select2-container--is-invalid .select2-selection--single,
        .select2-container--is-invalid .select2-selection--multiple {
            border-color: #dc3545 !important;
        }

        .select2-container--is-invalid .select2-selection__arrow {
            border-color: #dc3545 transparent transparent !important;
        }

        .select2-container--is-invalid .select2-selection__rendered {
            color: #dc3545 !important;
        }

        .is-invalid+.select2 .select2-selection {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 0.1rem rgba(220, 53, 69, 0.25) !important;
        }



        .select2-container .select2-selection--single {
            height: 55px;
            line-height: 50px;
            font-size: 14px;
            padding: 0 10px;
            border-radius: 15px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {            
            height: 55px;
            border-radius: 15px;

        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 55px;
            border-radius: 15px;
        }

    </style>


    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                {{-- <h1><a href="index.html">Vesperr</a></h1> --}}
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="/">
                    <img src="/images/logo.png" alt="" class="img-fluid">
                    <img src="/images/logo-text.png" alt="" class="img-fluid">
                </a>



            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="/#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="/#about">About</a></li>
                    <li><a class="nav-link scrollto" href="/list-ruangan">Ruangan</a></li>
                    <li><a class="nav-link scrollto " href="/#portfolio">Alat Praktikum</a></li>
                    <li class="dropdown"><a href="#"><span>Jadwal Perkuliahan</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/jadwal/dosen">Dosen</a></li>
                            <li><a href="/jadwal/kelas">Kelas</a></li>
                            <li><a href="/jadwal/ujian">Jadwal Ujian</a></li>
                            {{-- <li><a href="#">Drop Down 3</a></li> --}}
                            {{-- <li><a href="#">Drop Down 4</a></li> --}}
                        </ul>
                    </li>


                    @auth
                    <li><a class="getstarted scrollto" href="/home">Dashboard</a></li>
                    @else

                    @if (Route::has('register'))
                    <li><a class="nav-link scrollto" href="/register">Register</a></li>
                    @endif

                    <li><a class="getstarted scrollto" href="/login">Login</a></li>

                    @endauth



                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    @yield('content')
    @yield('footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

    @include('elements.footer-scripts')

    <!-- Library Moment.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <!-- File bahasa lokal Moment.js untuk bahasa Indonesia -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/id.min.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>



    @stack('addon-scripts')


</body>

</html>
