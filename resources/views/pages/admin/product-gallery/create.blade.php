@extends('layouts.dashboard')


@section('title')
Tambah Galeri Produk
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
                            <form action="{{ route('product-gallery.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Produk <b class="text-danger">*</b></label>
                                            <select name="products_id"
                                                class="form-control default-select @error('products_id') is-invalid @enderror">
                                                <option value="" selected disabled>- Pilih Produk -</option>
                                                @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }} | {{
                                                    $product->room->code. ' ' .$product->room->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('products_id')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Foto <b class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="photos" type="file"
                                                        accept="image/jpeg, image/jpg, image/png"
                                                        onchange="validateFile(this)"
                                                        class="custom-file-input @error('photos') is-invalid @enderror">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>

                                            @error('photos')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-danger px-5"
                                            onclick="window.location = '/product-gallery' ">
                                            Cancel
                                        </button>

                                        <button type="reset" class="btn btn-warning px-5">
                                            Reset
                                        </button>


                                        <button type="submit" class="btn btn-success px-5">
                                            Simpan
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

@push('addon-scripts')
<script>
    function validateFile(input) {
        // Maksimal ukuran file adalah 5 MB
        const maxSize = 5 * 1024 * 1024;

        // Mengecek apakah tipe file yang diunggah adalah jpg, jpeg, atau png
        const accept = input.getAttribute('accept');
        const allowedTypes = accept ? accept.split(',').map(type => type.trim()) : ['image/jpeg', 'image/jpg', 'image/png'];
        const fileType = input.files[0].type;
        if (!allowedTypes.includes(fileType)) {
            const allowedTypeNames = allowedTypes.map(type => type.split('/')[1].toUpperCase()).join(', ');
            alert(`Tipe file harus berupa ${allowedTypeNames}`);
            input.value = '';
            resetFileInput(input);
            return false;
        }

        // Mengecek apakah ukuran file melebihi batas maksimal
        if (input.files[0].size > maxSize) {
            alert('Ukuran file maksimal adalah 5 MB');
            input.value = '';
            resetFileInput(input);
            return false;
        }

    return true;
    }

</script>

@endpush