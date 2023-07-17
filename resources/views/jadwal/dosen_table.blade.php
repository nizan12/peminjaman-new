@php
use App\Models\Schedule;
use Carbon\Carbon;
@endphp
<div class="row my-4">
    <div class="col-md-12">


        <h4>Jadwal Kelas Reguler dan Karyawan Hari Ini</h4>
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Mata Kuliah</th>
                    <th>Kelas</th>
                    <th>Room</th>
                </tr>
            </thead>


            <tbody>

                @forelse ( $jadwal_sekarang as $key => $value )
                <tr>
                    <td>{{ Schedule::HARI['id'][$value->day] ?? 'Senin' }}</td>
                    <td>{{ Carbon::createFromFormat('H:i:s', $value->start_time)->format('H:i') }} - {{ Carbon::createFromFormat('H:i:s', $value->end_time)->format('H:i') }}</td>
                    <td>{{ $value->course->code }} | {{ $value->course->name }}</td>
                    <td>{{ $value->student_class }}</td>
                    <td>{{ $value->room->code }} | {{ $value->room->name }}</td>

                </tr>
                @empty
                <tr>
                    <td colspan="100%">Tidak ada data yang ditemukan !</td>
                </tr>
                @endforelse

            </tbody>
        </table>

        <br>

        <h4>Jadwal Kelas Reguler dan Karyawan per Minggu</h4>


        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Mata Kuliah</th>
                    <th>Kelas</th>
                    <th>Room</th>
                </tr>
            </thead>


            <tbody>

                @forelse ( $jadwal as $key => $value )
                <tr>
                    <td>{{ collect(Schedule::HARI)->where('id', $value->day)->first()['_id'] ?? $value->day }}</td>
                    <td>{{ Carbon::createFromFormat('H:i:s', $value->start_time)->format('H:i') }} - {{ Carbon::createFromFormat('H:i:s', $value->end_time)->format('H:i') }}</td>
                    <td>{{ $value->course->code }} | {{ $value->course->name }}</td>
                    <td>{{ $value->student_class }}</td>
                    <td>{{ $value->room->code }} | {{ $value->room->name }}</td>

                </tr>
                @empty
                <tr>
                    <td colspan="100%">Tidak ada data yang ditemukan !</td>
                </tr>
                @endforelse

            </tbody>
        </table>




    </div>
</div>
