@extends('layouts.dashboard')


@section('title')
Edit Banner
@endsection

{{-- Content --}}
@section('content')

<div
    class="section-content section-dashboard-home"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Banner</h2>
            <p class="dashboard-subtitle">
                Edit Banner
            </p>
        </div>
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
                            <form action="{{ route('banner.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input name="is_show" class="form-check-input" type="checkbox" @if ($item->is_show) checked='true' @endif>
                                                <label class="form-check-label">
                                                    Tampilkan Gambar
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button class="btn btn-success px-5">
                                            Save now
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