@extends('layouts.dashboard')


@section('title')
Kelas
@endsection

@section('content')
<div class="section-content section-dashboard-home">
    <div class="container-fluid">
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('class.create') }}" class="float-right btn btn-primary mb-3">
                                + Tambah</a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Angkatan</th>
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
                data: 'code'
                , name: 'code'
            }
            , {
                data: 'name'
                , name: 'name'
            }
            , {
                data: 'prodi'
                , name: 'prodi'
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

@endpush
