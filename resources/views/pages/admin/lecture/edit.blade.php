@extends('layouts.dashboard')


@section('title')
Edit Dosen
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
                            <form action="{{ route('lecture.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kode Dosen <b class="text-danger">*</b></label>
                                            <input type="text" name="code" required placeholder="Contoh : HA"
                                                value="{{ old('code', $item->code ) }}"
                                                class="form-control @error('code') is-invalid @enderror">

                                            @error('code')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIK Dosen <b class="text-danger">*</b></label>
                                            <input type="text" name="nik" required placeholder="Contoh : 117175"
                                                value="{{ old('nik', $item->nik ) }}"
                                                class="form-control @error('nik') is-invalid @enderror">

                                            @error('nik')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Dosen <b class="text-danger">*</b></label>

                                            <input type="text" name="name" required
                                                placeholder="Contoh : Hamdani Arif, S.Pd., M.Sc"
                                                value="{{ old('name', $item->name) }}"
                                                class="form-control @error ('name') is-invalid @enderror">

                                            @error('name')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-danger px-5"
                                            onclick="window.location = '/lecture' ">
                                            Cancel
                                        </button>

                                        <button type="reset" class="btn btn-warning px-5">
                                            Reset
                                        </button>

                                        <button class="btn btn-success px-5">
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