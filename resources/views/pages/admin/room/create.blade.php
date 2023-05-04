@extends('layouts.dashboard')


@section('title')
Tambah Ruangan
@endsection

{{-- Content --}}
@section('content')

<div class="section-content section-dashboard-home">
    <div class="container-fluid">
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('room.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Kode Ruangan <small class="text-danger">*</small></label>
                                            <input type="text" name="code" required value="{{ old('code') }}"
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
                                            <input type="text" name="name" required value="{{ old('name') }}"
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
                                            <select name="building" required class="form-control default-select @error('building') is-invalid @enderror">
                                                <option value="" selected disabled>- Pilih Gedung -</option>
                                                @foreach(\App\Models\Room::BUILDINGS as $key => $values)
                                                    <option value="{{ $key }}">{{ $values }}</option>
                                                @endforeach
                                            </select>

                                            @error('building')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kapasitas Ruangan</label>

                                            <div class="input-group mb-2">
                                                <input type="number" min="0" name="capacity" required
                                                    value="{{ old('capacity') }}" placeholder="Contoh : 60"
                                                    class="form-control @error('capacity') is-invalid @enderror">


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
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-danger px-5"
                                            onclick="window.location = '/room' ">
                                            Cancel
                                        </button>

                                        <button type="reset" class="btn btn-warning px-5">
                                            Reset
                                        </button>


                                        <button type="submit" class="btn btn-success px-5">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection