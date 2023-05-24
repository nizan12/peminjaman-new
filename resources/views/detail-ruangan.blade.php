@extends('layouts.home')

@section('title')
Detail Ruangan
@endsection

@section('content')

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Detail Ruangan</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="/list-ruangan">Ruangan</a></li>
                <li>Detail</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs Section -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-8">
                <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">

                        <div class="swiper-slide">
                            <img src="/images/room.jpg" alt="">
                        </div>


                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h3>Detail ruangan</h3>
                    <ul>
                        <li><strong>Lokasi Ruangan</strong>: {{ $item->building }}</li>
                        <li><strong>Kode Ruangan</strong>: {{ $item->code }}</li>
                        <li><strong>Kapasitas Ruangan</strong>: {{ $item->capacity }} Orang</li>
                    </ul>

                    <a href="/borang" class="btn btn-info btn-block text-white">Borang Ruangan !</a>

                </div>

            </div>

        </div>

        <div class="row my-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>List Perlengkapan Ruangan</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nomor BMN</th>
                                        <th>Deskripsi</th>
                                        <th>Stok</th>
                                        <th>Kondisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row my-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Penggunaan Ruangan</h3>
                    </div>

                    <div class="card-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section><!-- End Portfolio Details Section -->




</main>
@endsection

@push('addon-scripts')

<script>
    var datatable = $('#crudTable').DataTable({
        processing: true
        , serverSide: true
        , ordering: true
        , ajax: {
            url: '{!! url()->current() !!}'
        }
        , columns: [{
                data: 'id'
                , name: 'id'
            }
            , {
                data: 'nomor_bmn'
                , name: 'nomor_bmn'
            }
            , {
                data: 'description'
                , name: 'description'
            }
            , {
                data: 'stock'
                , name: 'stock'
            }
            , {
                data: 'condition'
                , name: 'condition'
            }
            , {
                data: 'action'
                , name: 'action'
                , orderable: false
                , searcable: false
                , width: '15%'
            }
        , ]
    })

</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {

            locale: 'id',
            initialView: 'dayGridMonth', 

            buttonText: {
                today: 'Hari ini' // Mengatur teks pada tombol "Today" menjadi "Hari ini"
            },
            headerToolbar: {
                left: 'prev,next today', 
                center: 'title', 
                right: 'timeGridWeek,listWeek,dayGridMonth'
            },


            events: [

                // Event Peminjaman
                {
                    title: 'Contoh PBL', 
                    start: '2023-05-23T10:00:00',
                    end: '2023-05-23T14:00:00', 
                    backgroundColor: 'red', // Ubah warna event di sini
                    extendedProps: {
                        type: 'BORANG', 
                        scheduleId: '1', // Menyimpan ID jadwal ke dalam extendedProps
                        courseName: 'Tes', 
                        studentClass: 'TRPL2BK',
                        // Tambahkan properti lain yang ingin Anda tampilkan di modal
                    }
                },

                @php
                use App\Models\Schedule;
                use Carbon\Carbon;
                @endphp

                @foreach($terjadwal as $key => $value)

                @php
                $tahun_ajaran = $value->school_year; // Ambil tahun ajaran dari data jadwal
                $start_date = Schedule::getStartTahun($tahun_ajaran);
                $end_date = Schedule::getEndTahun($tahun_ajaran);

                $start_time = Carbon::createFromFormat('H:i:s', $value->start_time)->format('H:i');
                $end_time = Carbon::createFromFormat('H:i:s', $value->end_time)->format('H:i');



                @endphp
                // Recurring
                {
                    title: '{{ $value->course->name }} | {{ $value->student_class }}',
                    daysOfWeek: [{{ $value->day ?? 0 }}], // Mengatur hari Senin (0: Minggu, 1: Senin, dst.)
                    startTime: '{{ $start_time }}', // Waktu mulai kegiatan
                    endTime: '{{ $end_time }}', // Waktu selesai kegiatan
                    startRecur: '{{ $start_date }}', // Tanggal pertama jadwal berulang (di hari Senin)
                    endRecur: '{{ $end_date }}', // Tanggal terakhir jadwal berulang (di hari Senin)
                    allDay: false, 
                    extendedProps: {
                        type: 'TERJADWAL', 
                        scheduleId: '{{ $value->id }}', // Menyimpan ID jadwal ke dalam extendedProps
                        courseName: '{{ $value->course->name }}',
                        studentClass: '{{ $value->student_class }}', 
                        startTime: '{{ $start_time }}', // Waktu mulai kegiatan
                        endTime: '{{ $end_time }}', // Waktu selesai kegiatan
                        lecturerName: '{{ $value->lecture->name }}',
                        // Tambahkan properti lain yang ingin Anda tampilkan di modal
                    }, 

                    backgroundColor: 'blue', // Ubah warna event di sini

                }, 
                
                @endforeach


            ], 

            eventContent: function(info) {
                var title = info.event.title;
                var wrapper = document.createElement('div');
                wrapper.classList.add('event-title');
                wrapper.textContent = title;
                return {
                    domNodes: [wrapper]
                };
            },

            eventClick: function(info) {


                console.log(info);

                var event = info.event;
                var courseName = event.extendedProps.courseName;
                var studentClass = event.extendedProps.studentClass;
                var startTime = event.extendedProps.startTime;
                var endTime = event.extendedProps.endTime;
                var lecturerName = event.extendedProps.lecturerName;

                var message = 'Detail Kegiatan:\n' +
                    'Matakuliah: ' + courseName + '\n' +
                    'Kelas: ' + studentClass + '\n' +
                    'Waktu Mulai: ' + startTime + '\n' +
                    'Waktu Selesai: ' + endTime + '\n' +
                    'Dosen: ' + lecturerName + '\n'

                alert(message);
            }


            // eventClick: function(info) {
            //     var scheduleId = info.event.extendedProps.scheduleId;
            //     var courseName = info.event.extendedProps.courseName;
            //     var studentClass = info.event.extendedProps.studentClass;
            //     // Mendapatkan properti lain yang Anda tambahkan

            //     // Tampilkan modal dengan detail kegiatan
            //     // Gantikan 'modalId' dengan ID modal yang ingin Anda tampilkan
            //     var modal = document.getElementById('modalId');
            //     // Gantikan 'courseNameElement' dengan elemen di dalam modal yang akan menampilkan nama mata kuliah
            //     var courseNameElement = modal.querySelector('.course-name');
            //     // Gantikan 'studentClassElement' dengan elemen di dalam modal yang akan menampilkan kelas mahasiswa
            //     var studentClassElement = modal.querySelector('.student-class');
            //     // Gantikan 'otherElement' dengan elemen di dalam modal yang akan menampilkan properti lain yang Anda tambahkan

            //     // Mengisi elemen modal dengan detail kegiatan
            //     courseNameElement.textContent = courseName;
            //     studentClassElement.textContent = studentClass;
            //     // Mengisi elemen lain dengan properti yang sesuai

            //     // Membuka modal
            //     // Gantikan 'modal' dengan objek modal yang Anda gunakan di aplikasi Anda
            //     // Anda dapat menggunakan library atau metode lain untuk membuka modal
            //     $('#modalId').show();
            // }
        });
        calendar.render();

        $('#fc-license-message').hide();
    });

</script>
@endpush
