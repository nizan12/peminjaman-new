@extends('layouts.dashboard')


@section('title')
Tambah Jadwal Matakuliah
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
                            <form action="{{ route('course-schedule.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Matakuliah <b class="text-danger">*</b></label>
                                            <select name="matakuliah" class="form-control default-select @error('prodi') is-invalid @enderror">
                                                <option value="">- Pilih Matakuliah -</option>

                                                @foreach ($matakuliah as $prodi => $matakuliahByProdi)
                                                <optgroup label="{{ $prodi }}">
                                                    @foreach ($matakuliahByProdi as $matkul)
                                                    <option value="{{ $matkul->id }}" @if ($selectedMatakuliah && $selectedMatakuliah->code === $matkul->code) selected @endif>{{ $matkul->code }} | {{ $matkul->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dosen <b class="text-danger">*</b></label>
                                            <select name="lecture" class="form-control default-select @error('lecture') is-invalid @enderror">
                                                <option value="">- Pilih Dosen -</option>


                                                @foreach ($dosen as $data)
                                                <option value="{{ $data->id }}" @if ( old('lecture')===$data->id) selected @endif>{{ $data->code }} | {{ $data->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tahun Ajaran <b class="text-danger">*</b></label>
                                            <select name="school_year" class="form-control default-select @error('school_year') is-invalid @enderror">
                                                <option value="">- Pilih Tahun Ajaran -</option>
                                                @foreach ($TAHUN_AJARAN as $item)
                                                <option value="{{ $item }}" @if( old('school_year')==$item ) selected @endif>{{ $item }}</option>
                                                @endforeach
                                            </select>


                                            @error('school_year')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kelas <b class="text-danger">*</b></label>
                                            <input type="text" class="form-control @error('kelas') is-invalid @enderror" placeholder="Contoh : IF2A-Pagi" name="kelas"/>

                                            @error('kelas')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Hari <b class="text-danger">*</b></label>
                                            <select name="study_day" class="form-control default-select @error('study_day') is-invalid @enderror">
                                                <option value="">- Pilih Hari -</option>
                                                @foreach ($HARI as $item)
                                                <option value="{{ $item['id'] }}" @if( old('study_day')==$item['_id'] ) selected @endif>{{ $item['_id'] }}</option>
                                                @endforeach
                                            </select>


                                            @error('study_day')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Ruangan <b class="text-danger">*</b></label>
                                            <select name="rooms" class="form-control default-select @error('rooms') is-invalid @enderror">
                                                <option value="" selected disabled>- Pilih Ruangan -</option>
                                                @foreach ($rooms as $building => $buildingRooms)
                                                <optgroup label="{{ $building }}">
                                                    @foreach ($buildingRooms as $room)
                                                    <option value="{{ $room->id }}" @if( old('rooms')===$room->id ) selected @endif>{{ $room->code }} - {{ $room->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>

                                            @error('rooms')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jam Mulai <b class="text-danger">*</b></label>
                                            <select name="clock_start" class="form-control default-select @error('clock_start') is-invalid @enderror">
                                                <option value="" selected disabled>- Pilih Jam Mulai -</option>
                                                <option value="07.50">07.50</option>
                                                <option value="08.40">08.40</option>
                                                <option value="09.30">09.30</option>
                                                <option value="10.20">10.20</option>
                                                <option value="11.10">11.10</option>
                                                <option value="12.00">12.00</option>
                                                <option value="12.50">12.50</option>
                                                <option value="13.40">13.40</option>
                                                <option value="14.30">14.30</option>
                                                <option value="15.20">15.20</option>
                                                <option value="16.10">16.10</option>
                                                <option value="17.00">17.00</option>
                                                <option value="18.00">18.00</option>
                                                <option value="18.50">18.50</option>
                                                <option value="19.40">19.40</option>
                                                <option value="20.30">20.30</option>
                                                <option value="21.20">21.20</option>
                                                <option value="22.10">22.10</option>
                                                <option value="23.00">23.00</option>
                                            </select>

                                            @error('rooms')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jam Selesai <b class="text-danger">*</b></label>
                                            <select name="clock_start" class="form-control default-select @error('clock_start') is-invalid @enderror">
                                                <option value="" selected disabled>- Pilih Jam Selesai -</option>
                                                <option value="08.40">08.40</option>
                                                <option value="09.30">09.30</option>
                                                <option value="10.20">10.20</option>
                                                <option value="11.10">11.10</option>
                                                <option value="12.00">12.00</option>
                                                <option value="12.50">12.50</option>
                                                <option value="13.40">13.40</option>
                                                <option value="14.30">14.30</option>
                                                <option value="15.20">15.20</option>
                                                <option value="16.10">16.10</option>
                                                <option value="17.00">17.00</option>
                                                <option value="18.00">18.00</option>
                                                <option value="18.50">18.50</option>
                                                <option value="19.40">19.40</option>
                                                <option value="20.30">20.30</option>
                                                <option value="21.20">21.20</option>
                                                <option value="22.10">22.10</option>
                                                <option value="23.00">23.00</option>
                                            </select>

                                            @error('rooms')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-danger px-5" onclick="window.location = '{{ $searchMatakuliah ? '/course-schedule?course=' . $searchMatakuliah : url('/course-schedule') }}' ">
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
