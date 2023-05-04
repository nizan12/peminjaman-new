@extends('layouts.dashboard')


@section('title')
Edit Ruangan
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
                            <form action="{{ route('room.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
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
                                            Sunting
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