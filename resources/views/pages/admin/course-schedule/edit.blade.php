@extends('layouts.dashboard')


@section('title')
Edit Matakuliah
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
                            <form action="{{ route('course.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Kode Matakuliah <b class="text-danger">*</b></label>
                                            <input type="text" name="code" value="{{ old('code', $item->code) }}"
                                                placeholder="Contoh : RKS214"
                                                class="form-control @error('code') is-invalid @enderror">

                                            @error('code')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Matakuliah <b class="text-danger">*</b></label>
                                            <input type="text" name="name" value="{{ old('name', $item->name) }}"
                                                placeholder="Contoh : Sistem Operasi"
                                                class="form-control @error('name') is-invalid @enderror">

                                            @error('name')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Program Studi <b class="text-danger">*</b></label>
                                            <select name="prodi"
                                                class="form-control default-select @error('prodi') is-invalid @enderror">
                                                <option value="{{ $item->prodi }}">{{ $item->prodi }}</option>
                                                <option value="">- Pilih Program Studi-</option>
                                                @foreach ($JURUSAN_PRODI as $jurusan => $prodi)
                                                <optgroup label="{{ $jurusan }}">
                                                    @foreach ($prodi as $p)
                                                    <option value="{{ $p }}">{{ $p }}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>


                                            @error('prodi')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-danger px-5"
                                            onclick="window.location = '/course' ">
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