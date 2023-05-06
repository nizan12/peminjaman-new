@extends('layouts.dashboard')


@section('title')
    Edit Produk
@endsection

{{-- Content --}}
@section('content')

<div
    class="section-content section-dashboard-home"
    >
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
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nomor BMN <b class="text-danger">*</b></label>
                                            <input type="text" name="nomor_bmn" value="{{ old('nomor_bmn', $item->nomor_bmn) }}"
                                                placeholder="Contoh : 3.05.02.01.002.2536"
                                                class="form-control @error('nomor_bmn') is-invalid @enderror">

                                            @error('nomor_bmn')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Barang <b class="text-danger">*</b></label>
                                            <input type="text" name="name" value="{{ old('name', $item->name ) }}"
                                                placeholder="Contoh : Meja Kantor Hitam"
                                                class="form-control @error('name') is-invalid @enderror">

                                            @error('name')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>User <b class="text-danger">*</b></label>
                                            <select name="users_id"
                                                class="form-control default-select @error('users_id') is-invalid @enderror">
                                                <option value="{{ $item->users_id }}" selected>{{ $item->user->name }}</option>

                                                <option value="" disabled>- Pilih User -</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('users_id')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kategori <b class="text-danger">*</b></label>
                                            <select name="categories_id"
                                                class="form-control default-select @error('categories_id') is-invalid @enderror">
                                                <option value="{{ $item->categories_id }}" selected>{{ $item->category->name }}</option>
                                                
                                                <option value="" disabled>- Pilih Kategori -</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('categories_id')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    


                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ruangan <b class="text-danger">*</b></label>
                                            <select name="rooms_id"
                                                class="form-control default-select @error('rooms_id') is-invalid @enderror">
                                                
                                                <option value="" selected disabled>- Pilih Ruangan -</option>
                                                @foreach ($rooms as $building => $buildingRooms)
                                                <optgroup label="{{ $building }}">
                                                    @foreach ($buildingRooms as $room)
                                                    <option value="{{ $room->id }}">{{ $room->code }} - {{ $room->name
                                                        }}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>

                                            @error('rooms_id')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div> --}}



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ruangan</label>
                                            <select name="rooms_id" class="form-control default-select">
                                                <option value="{{ $item->rooms_id }}" selected>{{ $item->room->code }} - {{ $item->room->name }}</option>
                                                <option value="" disabled>Pilih Ruangan</option>

                                                @foreach ($rooms as $building => $buildingRooms)
                                                <optgroup label="{{ $building }}">
                                                    @foreach ($buildingRooms as $room)
                                                    <option value="{{ $room->id }}">{{ $room->code }} - {{ $room->name
                                                        }}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <input type="text" name="description" value="{{ $item->description }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Stock</label>
                                            <input type="text" name="stock" value="{{ $item->stock }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <input type="text" name="location" value="{{ $item->location }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Kondisi</label>
                                            <select name="condition" class="form-control default-select">
                                                <option value="{{ $item->condition }}" selected>{{ $item->condition }}</option>
                                                <option value="" disabled>Pilih Kondisi</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Rusak">Rusak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-danger px-5"
                                            onclick="window.location = '/product' ">
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