@extends('layouts.dashboard')


@section('title')
Tambah Hari Libur
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

                            
                            <form action="{{ route('holiday.store') }}" method="POST" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Hari Libur <small class="text-danger">*</small></label>
                                            <input type="text" name="title" value="{{ old('title') }}"
                                                placeholder="Contoh : Dies Natalis Polibatam"
                                                class="form-control @error('title') is-invalid @enderror">

                                            @error('title')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tanggal Libur <small class="text-danger">*</small></label>
                                            <input type="date" name="date"  value="{{ old('date') }}"
                                                
                                                class="form-control @error('date') is-invalid @enderror">


                                            @error('date')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col text-right">
                                        {{-- <button type="button" class="btn btn-danger px-5"
                                            onclick="window.location = '/holiday' ">
                                            Cancel
                                        </button>

                                        <button type="reset" class="btn btn-warning px-5">
                                            Reset
                                        </button> --}}


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