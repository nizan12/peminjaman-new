@extends('layouts.dashboard')


@section('title')
Edit Jadwal Matakuliah
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
                            <form action="{{ $searchMatakuliah ? route('schedule.update', $item->id). '?course=' . $searchMatakuliah : route('schedule.update', $item->id) ; }}" method="POST" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <div class="row">



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Jenis Jadwal <b class="text-danger">*</b></label>
                                            <select name="schedule_type" class="form-control default-select @error('schedule_type') is-invalid @enderror">
                                                <option value="">- Pilih Jenis -</option>
                                                @foreach ($JENIS_JADWAL as $key => $value)
                                                <option value="{{ $value['id'] }}" @if( old('schedule_type', $item->schedule_type) == $value['id'] ) selected @endif>{{ $value['name'] }} | {{ $value['name_long'] }}</option>
                                                @endforeach
                                            </select>


                                            @error('schedule_type')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Matakuliah <b class="text-danger">*</b></label>
                                            <select name="courses_id" class="form-control default-select @error('courses_id') is-invalid @enderror">
                                                <option value="">- Pilih Matakuliah -</option>

                                                @foreach ($matakuliah as $prodi => $matakuliahByProdi)
                                                <optgroup label="{{ $prodi }}">
                                                    @foreach ($matakuliahByProdi as $matkul)
                                                    <option value="{{ $matkul->id }}" @if ( old('courses_id', $item->courses_id) == $matkul->id) selected @endif>{{ $matkul->code }} | {{ $matkul->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>

                                            @error('courses_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jenis Pembelajaran <b class="text-danger">*</b></label>
                                            <select name="course_type" class="form-control default-select @error('course_type') is-invalid @enderror">
                                                <option value="">- Pilih Jenis Pembelajaran -</option>
                                                <option value="Teori" @if ( old('course_type', $item->course_type) == 'Teori') selected @endif>Teori</option>
                                                <option value="Praktikum" @if ( old('courses_id', $item->course_type) == 'Praktikum') selected @endif>Praktikum</option>

                                            </select>

                                            @error('course_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dosen <b class="text-danger">*</b></label>
                                            <select name="lecturers_id" class="form-control default-select @error('lecturers_id') is-invalid @enderror">
                                                <option value="">- Pilih Dosen -</option>


                                                @foreach ($dosen as $data)
                                                <option value="{{ $data->id }}" @if ( old('lecturers_id', $item->lecturers_id) == $data->id) selected @endif>{{ $data->code }} | {{ $data->name }}</option>
                                                @endforeach

                                            </select>

                                            @error('lecturers_id') <div class="invalid-feedback">{{ $message }}</div> @enderror

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tahun Ajaran <b class="text-danger">*</b></label>
                                            <select name="school_year" class="form-control default-select @error('school_year') is-invalid @enderror">
                                                <option value="">- Pilih Tahun Ajaran -</option>
                                                @foreach ($TAHUN_AJARAN as $key => $value)
                                                <option value="{{ $key }}" @if( old('school_year', $item->school_year) == $key ) selected @endif>{{ $key }}</option>
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
                                            <input name="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" 
                                            placeholder="Contoh : IF2A / IF2AK" value="{{ old('kelas', $item->student_class) }}" />

                                            @error('kelas')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                    <hr>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Hari <b class="text-danger">*</b></label>
                                            <select name="day" class="form-control default-select @error('day') is-invalid @enderror">
                                                <option value="">- Pilih Hari -</option>
                                                @foreach ($HARI as $key => $value)
                                                <option value="{{ $value['id'] }}" @if( old('day', $item->day ) == $value['id'] ) selected @endif>{{ $value['_id'] }}</option>
                                                @endforeach
                                            </select>


                                            @error('day')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ruangan <b class="text-danger">*</b></label>
                                            <select name="rooms" class="form-control default-select @error('rooms') is-invalid @enderror">
                                                <option value="">- Pilih Ruangan -</option>
                                                @foreach ($rooms as $building => $buildingRooms)
                                                <optgroup label="{{ $building }}">
                                                    @foreach ($buildingRooms as $room)
                                                    <option value="{{ $room->id }}" @if( old('rooms', $item->rooms_id) == $room->id ) selected @endif>{{ $room->code }} - {{ $room->name }}</option>
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
                                            <select name="start_time" class="form-control default-select @error('start_time') is-invalid @enderror">
                                                <option value="">- Pilih Jam -</option>

                                                @foreach ($START_TIME as $value)
                                                <option value="{{ $value }}" @if( old('start_time', date('H.i', strtotime($item->start_time)) ) == $value ) selected @endif>{{ $value }}</option>
                                                @endforeach
                                                
                                            </select>

                                            @error('start_time')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jam Selesai <b class="text-danger">*</b></label>
                                            <select name="end_time" class="form-control default-select @error('end_time') is-invalid @enderror">
                                                <option value="">- Pilih Jam -</option>
                                                @foreach ($END_TIME as $value )
                                                <option value="{{ $value }}" @if( old('end_time',  date('H.i', strtotime($item->end_time)) ) == $value ) selected @endif>{{ $value }}</option>
                                                @endforeach
                                                
                                            </select>

                                            @error('end_time')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-danger px-5" onclick="window.location = '{{ $searchMatakuliah ? '/schedule?course=' . $searchMatakuliah : url('/schedule') }}' ">
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
