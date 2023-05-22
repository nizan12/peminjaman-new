@extends('layouts.dashboard')


@section('title')
    Jadwal Matakuliah
@endsection

@section('content')
    <div
        class="section-content section-dashboard-home"
        >
        <div class="container-fluid">
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="#" class="float-left btn btn-primary mb-3" data-toggle="modal" data-target="#basicModal"><i class="flaticon-381-funnel mr-1"></i> Filter</a>

                                <div class="modal fade" id="basicModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Modal body text goes here.</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ $searchMatakuliah ? '/schedule/create?course=' . $searchMatakuliah : url('/schedule/create') }}" class="float-right btn btn-primary mb-3">
                                + Tambah</a>
                                <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Nama</th>
                                            <th>Prodi</th>
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
            url: '{!! url()->current() !!}'
        },
        columns: [
            {data: 'id', name:'id'},
            {data: 'code', name:'code'},
            {data: 'name', name:'name'},
            {data: 'prodi', name:'prodi'},
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