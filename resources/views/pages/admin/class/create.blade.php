@extends('layouts.dashboard')


@section('title')
Tambah Kelas
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
                            <form action="{{ route('class.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Program Studi <b class="text-danger">*</b></label>
                                            <select name="prodi"
                                                class="form-control default-select @error('prodi') is-invalid @enderror">
                                                <option value="">- Pilih Program Studi -</option>
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
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Angkatan <b class="text-danger">*</b></label>
                                            <input type="number" min="2000" max="2100" name="angkatan" value="{{ old('angkatan') }}"
                                                class="form-control @error('angkatan') is-invalid @enderror">

                                            @error('angkatan')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jenis Kelas <b class="text-danger">*</b></label>
                                            <select name="prodi"
                                                class="form-control default-select @error('prodi') is-invalid @enderror">
                                                <option value="">- Pilih Jenis Kelas -</option>
                                                <option value="REGULER MALAM">REGULER MALAM</option>
                                                <option value="REGULER PAGI">REGULER PAGI</option>

                                            </select>


                                            @error('prodi')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pembagian Kelas <b class="text-danger">*</b></label>
                                            <select name="prodi"
                                                class="form-control default-select @error('prodi') is-invalid @enderror">
                                                <option value="">- Pilih Pembagian Kelas -</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                                <option value="F">F</option>
                                                <option value="G">G</option>

                                            </select>


                                            @error('prodi')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>


                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Kelas <small class="text-sm">Opsional</small></label>
                                            <input type="text" name="name" value="{{ old('code') }}"
                                                placeholder="Contoh : IF2018-2AK"
                                                class="form-control @error('code') is-invalid @enderror">

                                            @error('name')
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