@extends('layouts.dashboard')


@section('title')
    Jadwal Matakuliah
@endsection

@section('content')

<div class="modal fade" id="basicModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span>
                </button>
            </div>
            <form action="{!! url()->current() !!}" method="GET">
            <div class="modal-body">
                <div class="form-group">
                    <label id="course">Matakuliah <b class="text-danger">*</b></label>
                    <select class="form-control default-select" id="course" name="course" >
                        <option value="">- Pilih Matakuliah</option>

                        @foreach ( $course as $key => $value )
                            <option value="{{ $value->id }}" @if( $searchMatakuliah && old('course', $searchMatakuliah) == $value->id ) selected @endif >{{ $value->code }} | {{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Terapkan</button>
            </div>
            </form>
        </div>
    </div>
</div>

    <div class="section-content section-dashboard-home">
        <div class="container-fluid">
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="#" class="float-left btn btn-primary mb-3" data-toggle="modal" data-target="#basicModal"><i class="flaticon-381-funnel mr-1"></i> Filter</a>



                                <a href="{{ $searchMatakuliah ? '/schedule/create?course=' . $searchMatakuliah : url('/schedule/create') }}" class="float-right btn btn-primary mb-3">
                                + Tambah</a>
                                <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Matakuliah</th>
                                            <th>Kelas</th>
                                            <th>Ruangan</th>
                                            <th>Jam Sesi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('addon-scripts')
<script>
    var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: window.location.href
        },
        columns: [
            {data: 'id', name:'id'},
            {data: 'course', name:'course'},
            {data: 'student_class', name:'kelas'},
            {data: 'room', name:'room'},
            {data: 'session_time', name:'session_time'},
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searcable: false,
                width: '15%'
            },
        ]
    })
</script>

@endpush