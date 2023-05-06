@extends('layouts.dashboard')


@section('title')
    Produk
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
                            <a href="{{ route('product.create') }}" class="float-right btn btn-primary mb-3">
                            + Tambah</a>
                            <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nomor BMN</th>
                                        <th>Deskripsi</th>
                                        <th>Stok</th>
                                        <th>Lokasi</th>
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
            {data: 'nomor_bmn', name:'nomor_bmn'},
            {data: 'description', name:'description'},
            {data: 'stock', name:'stock'},
            {data: 'location', name:'location'},
            {data: 'condition', name:'condition'},
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