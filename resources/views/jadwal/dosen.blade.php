@extends('layouts.home')

@section('title')
Jadwal Dosen
@endsection

@section('content')
<!-- Tambahkan link ke Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Jadwal Perkuliahan per Dosen</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="#">Jadwal Perkuliahan</a></li>
                <li>Dosen</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs Section -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <div class="col-lg-12">

            <div class="form-group">
                <select class="form-control" id="dosen" name="dosen" onchange="showLectureSchedule(this.value)">
                    <option value="">- Pilih Dosen -</option>

                    @forelse ( $dosen as $key => $value )
                    <option value="{{ $value->code }}">({{ $value->code }}) | {{ $value->name }}</option>

                    @empty
                    <option value="">Tidak ada data dosen !</option>
                    @endforelse


                </select>
            </div>

            <hr>
        </div>

        <div id="disini" style="visibility:hidden"></div>


    </div>
</section><!-- End Portfolio Details Section -->




</main>
@endsection

@push('addon-scripts')

<script type="text/javascript">
    function sleep(min, max) {
        var delay = Math.floor(Math.random() * (max - min + 1)) + min;
        return new Promise(resolve => setTimeout(resolve, delay));
    }

    function showLectureSchedule(value) {
        var currentUrl = window.location.href;
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('#disini').css('visibility', 'visible');
        $('#disini').html('Sedang mencari data...');
        $('#disini').addClass('animate__animated animate__fadeIn'); // Tambahkan animasi fadeIn




        // Menunda selama 0,5 detik (500 milidetik) sebelum melakukan permintaan AJAX
        sleep(500, 1000).then(() => {

            if (value === '') {
                $('#disini').html('<b>Silahkan pilih dosen terlebih dahulu !</b>');
                return; // Keluar dari fungsi jika value kosong
            }


            $.ajax({
                url: '{!! url()->current() !!}'
                , type: 'GET'
                , data: {
                    search: value
                }
                , success: function(response) {
                    $('#disini').removeClass('animate__animated animate__fadeIn');
                    $('#disini').html(response);
                }
                , error: function(response, xhr, status, error) {
                    $('#disini').removeClass('animate__animated animate__fadeIn');
                    $('#disini').html(response.responseText);
                }
            });
        });
    }

</script>

@endpush
