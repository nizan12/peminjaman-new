@extends('layouts.home')

@section('title')
Ruangan
@endsection

@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Ruangan</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Ruangan</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page">

    <!-- ======= More Services Section ======= -->
    <section id="more-services" class="more-services">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>List Ruangan</h2>
                <p>Berikut adalah list ruangan yang tersedia di Jurusan Informatika</p>
            </div>

            <div class="row">

                @forelse ( $ruangan as $index => $data )

                <div class="col-md-6 d-flex align-items-stretch mb-4">
                    <div class="card" 
                    style='background-image: url("/assets/img/more-services-1.jpg");'
                        data-aos="fade-up" data-aos-delay="100">
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">{{ $data->code }}</a></h5>
                            <h5 class="card-title"><a href="#">{{ $data->name }}</a></h5>
                            <p class="card-text">{{ $data->building }}</p>
                            <div class="read-more">
                                <a href="/ruangan-borang/{{ $data->id }}"><i class="bi bi-arrow-right"></i> Detail Ruangan</a>
                                <a href="/ruangan-borang/{{ $data->id }}"><i class="bi bi-arrow-right"></i> Borang Ruangan</a>
                            
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                Tidak ada data yang ditemukan !

                @endforelse
            </div>

        </div>
    </section><!-- End More Services Section -->


</section>

</main>
@endsection