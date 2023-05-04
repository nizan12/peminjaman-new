@extends('layouts.dashboard')


@section('title')
Tambah Banner
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
                            <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Foto Banner <b class="text-danger">*</b></label>
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <div class="form-group">
                                            <label>Tampilkan</label>
                                            <input type="checkbox" name="is_show" class="form-control">
                                        </div> --}}

                                        <div class="form-group">
                                            <div class="form-check">
                                                <input name="is_show" class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    Tampilkan Gambar
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-danger px-5"
                                            onclick="window.location = '/banner' ">
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