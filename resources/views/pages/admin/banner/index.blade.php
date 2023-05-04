@extends('layouts.dashboard')

@section('title')
    Banner
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
                            <a href="{{ route('banner.create') }}" class="float-right btn btn-primary mb-3">
                            + Tambah Banner Baru</a>
                            <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Foto</th>
                                        <th>Tampilkan</th>
                                        <th>Slug</th>
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
            {data: 'photo', name:'name'},
            {data: 'photo', name:'photo'},
            {data: 'photo', name:'slug'},
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