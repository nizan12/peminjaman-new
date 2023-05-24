@extends('layouts.dashboard')


@section('title')
Tambah Kategori
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
                            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama <b class="text-danger">*</b></label>
                                            <input type="text" name="name" placeholder="Contoh : Mikrokontroller" class="form-control @error('name') is-invalid @enderror">

                                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Foto <b class="text-danger">*</b></label>
                                            <div class="input-group @error('photo') is-invalid @enderror">
                                                <div class="custom-file">
                                                    <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>

                                            @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-danger px-5" onclick="window.location = '/category' ">
                                            Cancel
                                        </button>

                                        <button type="reset" class="btn btn-warning px-5">
                                            Reset
                                        </button>

                                        <button class="btn btn-success px-5">
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
