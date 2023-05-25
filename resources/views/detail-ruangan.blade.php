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
            firstDay : 1,
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

            // Hari Libur untuk Sabtu
            {
            title: 'Hari Libur - Sabtu',
            daysOfWeek: [6], //Sundays and saturdays
            rendering:"background",
            backgroundColor: 'red', // Warna latar belakang event hari libur
            borderColor: 'red', // Warna garis tepi (border) event hari libur
            overLap: false,
            allDay: true,
            display: 'background', // Menampilkan event sebagai latar belakang tanpa judul
            extendedProps: {
                type: 'holiday', 
                holidayId: '1', // Menyimpan ID jadwal ke dalam extendedProps
                courseName: 'Harap mengajukan borang ke Manajemen',
                notes: 'Harap mengajukan borang ke Manajemen',
                // Tambahkan properti lain yang ingin Anda tampilkan di modal
                }
            },

            // Hari Libur untuk Sabtu
            {
                title: 'Hari Libur - Minggu',
                daysOfWeek: [0], //Sundays and saturdays
                rendering:"background",
                backgroundColor: 'red', // Warna latar belakang event hari libur
                borderColor: 'red', // Warna garis tepi (border) event hari libur
                overLap: false,
                allDay: true,
                display: 'background', // Menampilkan event sebagai latar belakang tanpa judul
                extendedProps: {
                    type: 'holiday', 
                    holidayId: '1', // Menyimpan ID jadwal ke dalam extendedProps
                    courseName: 'Harap mengajukan borang ke Manajemen',
                    notes: 'Harap mengajukan borang ke Manajemen',
                    // Tambahkan properti lain yang ingin Anda tampilkan di modal
                    }
            },


            // Event Hari Libur / Hari Besar
            {
                    title: 'Hari Raya Idul Fitri 1445H',
                    start: '2023-05-30', // Tanggal hari libur
                    allDay: true, // Menandakan bahwa event berlangsung sepanjang hari
                    backgroundColor: 'red', // Warna latar belakang event hari libur
                    borderColor: 'red', // Warna garis tepi (border) event hari libur
                    display: 'background', // Menampilkan event sebagai latar belakang tanpa judul

                    extendedProps: {
                        type: 'holiday', 
                        holidayId: '1', // Menyimpan ID jadwal ke dalam extendedProps
                        courseName: 'Hari Raya Idul Fitri 1445H',
                        notes: 'Harap mengajukan borang ke Manajemen',
                        // Tambahkan properti lain yang ingin Anda tampilkan di modal
                    }
                },

                

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
                    // startRecur: '{{ $start_date }}', // Tanggal pertama jadwal berulang (di hari Senin)
                    // endRecur: '{{ $end_date }}', // Tanggal terakhir jadwal berulang (di hari Senin)
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
                var event = info.event;
                var eventType = event.extendedProps.type;
                var notes = event.extendedProps.notes;

                if (eventType === 'TERJADWAL') {
                    var courseName = event.extendedProps.courseName;
                    var studentClass = event.extendedProps.studentClass;
                    var startTime = event.extendedProps.startTime;
                    var endTime = event.extendedProps.endTime;
                    var lecturerName = event.extendedProps.lecturerName;

                    var message = 'Detail Kegiatan\n' +
                        'Matakuliah: ' + courseName + '\n' +
                        'Kelas: ' + studentClass + '\n' +
                        'Waktu Mulai: ' + startTime + '\n' +
                        'Waktu Selesai: ' + endTime + '\n' +
                        'Dosen: ' + lecturerName + '\n';
                } else if (eventType === 'holiday') {
                    var courseName = event.title;

                    var message = 'Hari Libur\n' + courseName + '\n' + 'Notes: ' + notes ;
                } else {
                    var courseName = event.extendedProps.courseName;

                    var message = 'Borang Peminjaman\n' +
                        'Nama Event: ' + courseName + '\n';
                }

                alert(message);
            },

            eventRender: function(info) {
                // Membuat elemen judul wrap
                var titleWrapEl = document.createElement('div');
                titleWrapEl.className = 'event-title-wrap';
                titleWrapEl.textContent = info.event.title;

                // Membuat elemen tanggal
                var dateEl = document.createElement('div');
                dateEl.className = 'event-date';
                dateEl.textContent = info.event.start.getDate();

                // Menghapus judul asli dari elemen event
                info.el.querySelector('.fc-title').innerHTML = '';

                // Menambahkan elemen judul wrap dan elemen tanggal ke dalam elemen event
                info.el.appendChild(titleWrapEl);
                info.el.appendChild(dateEl);
            },





        });
        calendar.render();

        $('#fc-license-message').hide();
    });

</script>
@endpush
