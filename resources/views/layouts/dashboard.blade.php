<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <link href="/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <meta name="description" content="Some description for the page" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="http://test-peminjaman.test/images/favicon.png">
    <link href="{{ asset('/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet" type="text/css" />

    {{-- CSS untuk Sweetalert 2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <style type="text/css">

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
            border-color : #F3F4F7;
            height: 55px;
            /* Ubah sesuai kebutuhan tinggi yang diinginkan */
            line-height: 50px;
            font-size: 14px;
            /* Ubah sesuai kebutuhan ukuran font yang diinginkan */
            padding: 0 10px;

            border-radius: 15px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            border-color : #F3F4F7;
            
            height: 55px;
            /* Ubah sesuai kebutuhan tinggi yang diinginkan */

            border-radius: 15px;

        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            border-color : #F3F4F7;
            
            line-height: 55px;
            /* Ubah sesuai kebutuhan tinggi yang diinginkan */

            border-radius: 15px;

        }

    </style>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ route('home') }}" aria-label="Application Logo and Link to Dashboard" class="brand-logo">
                <img class="logo-abbr" src="/images/logo.png" alt="">
                <img class="logo-compact" src="/images/logo-text.png" alt="">
                <img class="brand-title" src="/images/logo-text.png" alt="">

            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        @include('elements.header')
        @include('elements.sidebar')
        <div class="content-body">
            <!-- row -->
            @yield('content')
        </div>

        @include('elements.footer')
    </div>

    @include('elements.footer-scripts')
    @stack('addon-scripts')

    {{-- JS Sweetalert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

    <script>
        function delete_confirm(event) {
            event.preventDefault();

            return new Promise((resolve) => {
                swal.fire({
                    title: 'Konfirmasi Hapus'
                    , text: 'Anda yakin ingin menghapus data?'
                    , icon: 'question'
                    , showCancelButton: true
                    , confirmButtonColor: "#DD6B55"
                    , confirmButtonText: "Ya, hapus data!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        resolve(true);
                    } else {
                        resolve(false);
                    }
                });
            }).then((shouldSubmit) => {
                if (shouldSubmit) {
                    event.target.submit();
                }
            });
        }

    </script>
</body>
</html>
