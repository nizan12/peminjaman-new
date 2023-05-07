@extends('layouts.dashboard')


@section('title')
Detail Ruangan
@endsection

{{-- Content --}}
@section('content')

<div class="section-content section-dashboard-home">
    <div class="container-fluid">
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kode Ruangan <small class="text-danger">*</small></label>

                                        <input type="text" required name="code" value="{{ old('code', $item->code ) }}"
                                            placeholder="Contoh : TA.XI.4a"
                                            class="form-control @error('code') is-invalid @enderror">

                                        @error('code')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Ruangan <small class="text-danger">*</small></label>

                                        <input type="text" required name="name" value="{{ old('name', $item->name ) }}"
                                            placeholder="Contoh : Workspace Data Security and Privacy"
                                            class="form-control @error('name') is-invalid @enderror">


                                        @error('name')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gedung <small class="text-danger">*</small></label>

                                        <select name="building" required class="form-control default-select">
                                            <option value="{{ $item->building }}" selected>{{ $item->building }}
                                            </option>
                                            <option value="" disabled>Pilih Gedung</option>
                                            @foreach(\App\Models\Room::BUILDINGS as $key => $values)
                                            <option value="{{ $key }}">{{ $values }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kapasitas <small class="text-danger">*</small></label>

                                        <div class="input-group mb-2">
                                            <input type="number" required min="0" name="capacity"
                                                value="{{ old('capacity', $item->capacity) }}" class="form-control">


                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Orang</span>
                                            </div>
                                        </div>


                                        @error('capacity')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>List Perlengkapan Ruangan</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover scroll-horizontal-vertical w-100"
                                                id="crudTable">
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
@endpush