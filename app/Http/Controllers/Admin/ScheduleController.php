<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Product;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ProductGalleryRequest;

class ScheduleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchMatakuliah = $request->input('course') ?? null;
        $selectedMatakuliah = $searchMatakuliah ? Course::findOrFail($searchMatakuliah) : null;

        if (request()->ajax()) {

            if ($searchMatakuliah) {
                $query = Schedule::where(['courses_id' => $searchMatakuliah]);
            } else {
                $query = Schedule::all();
            }

            return DataTables::of($query)

                ->addColumn('course', function ($item) {
                    return $item->course->code . ' | ' . $item->course->name;
                })

                ->addColumn('student_class', function ($item) {
                    return $item->student_class;
                })

                ->addColumn('room', function ($item) {
                    return $item->room->code . ' | ' . $item->room->name;
                })

                ->addColumn('session_time', function ($item) {
                    return Carbon::createFromFormat('H:i:s', $item->start_time )->format('H:i'). ' | ' . Carbon::createFromFormat('H:i:s', $item->end_time )->format('H:i');
                })


                ->addcolumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                        type="button"
                                        data-toggle="dropdown">
                                        Aksi
                                </button>
                                <div class="dropdown-menu">

                                <a class="dropdown-item" href="' . route('schedule.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form onsubmit="delete_confirm(event)" action="' . route('schedule.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '    
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                })

                ->rawColumns(['action'])
                ->make();
        }

        $course = Course::all();

        return view('pages.admin.schedule.index', [
            'searchMatakuliah' => $searchMatakuliah,
            'course' => $course,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $products = Product::all();
        $matakuliah = Course::all()->groupBy('prodi');
        $START_TIME = Schedule::START_TIME;
        $END_TIME = Schedule::END_TIME;
        $JURUSAN_PRODI = Course::JURUSAN_PRODI;
        $HARI = Schedule::HARI;

        $dosen = Lecture::orderBy('code')->get();

        $rooms = Room::all()->groupBy('building');

        $TAHUN_AJARAN = Schedule::TAHUN_AJARAN;

        $searchMatakuliah = $request->input('course') ?? null;
        $selectedMatakuliah = $searchMatakuliah ? Course::find($searchMatakuliah)->first() : null;

        return view('pages.admin.schedule.create', [
            'TAHUN_AJARAN' => $TAHUN_AJARAN,
            'START_TIME' => $START_TIME,
            'END_TIME' => $END_TIME,

            'products' => $products,
            'matakuliah' => $matakuliah,
            'dosen' => $dosen,
            'rooms' => $rooms,

            'JURUSAN_PRODI' => $JURUSAN_PRODI,
            'HARI' => $HARI,

            'searchMatakuliah' => $searchMatakuliah,
            'selectedMatakuliah' => $selectedMatakuliah,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'courses_id' => 'required|exists:courses,id',
            'lecturers_id' => 'required|exists:lectures,id',
            'school_year' => 'required',
            'kelas' => 'required',
            'day' => 'required',
            'rooms' => 'required|exists:rooms,id',
            'start_time' => 'required',
            'end_time' => 'required',
        ], [
            'courses_id.required' => 'Kolom Matakuliah tidak boleh kosong !',
            'courses_id.exists' => 'Matakuliah tidak terdaftar !',

            'lecturers_id.required' => 'Kolom Dosen tidak boleh kosong !',
            'lecturers_id.exists' => 'Dosen tidak terdaftar !',

            'school_year.required' => 'Kolom Tahun Ajaran tidak boleh kosong !',

            'kelas.required' => 'Kolom Kelas tidak boleh kosong !',

            'day.required' => 'Kolom Hari tidak boleh kosong !',

            'rooms.required' => 'Kolom Ruangan tidak boleh kosong !',
            'rooms.exists' => 'Ruaangan tidak terdaftar !',

            'start_time.required' => 'Kolom Jam Mulai tidak boleh kosong !',
            'end_time.required' => 'Kolom Jam Selesai tidak boleh kosong !',

        ]);

        $startTime = Carbon::createFromFormat('H.i', $request->start_time)->format('H:i:s');
        $endTime = Carbon::createFromFormat('H.i', $request->end_time)->format('H:i:s');

        $jadwal = new Schedule;

        $jadwal->day = $request->day;
        $jadwal->start_time = $startTime;
        $jadwal->end_time = $endTime;
        $jadwal->courses_id = $request->courses_id;
        $jadwal->rooms_id = $request->rooms;
        $jadwal->lecturers_id = $request->end_time;
        $jadwal->school_year = $request->school_year;
        $jadwal->student_class = $request->kelas;

        $jadwal->save();

        $searchMatakuliah = $request->input('course') ?? null;

        if ( $searchMatakuliah ) {
            return redirect()->route('schedule.index', ['course' => $searchMatakuliah]);
        } else {
            return redirect()->route('schedule.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ProductGallery::findOrFail($id);

        $photos = $item->photos;

        // hapus file dari direktori public
        $public_path = public_path(Storage::url($item->photos));
        if (!empty($photos) && file_exists($public_path)) {
            unlink($public_path);
        }

        $item->delete();

        return redirect()->route('schedule.index');
    }
}
