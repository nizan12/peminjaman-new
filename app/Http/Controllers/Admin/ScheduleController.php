<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ProductGallery;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
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
    public function index( Request $request )
    {

        $searchMatakuliah = $request->input('course') ?? null;
        $selectedMatakuliah = $searchMatakuliah ? Course::findOrFail($searchMatakuliah ) : null;

        if (request()->ajax()) {
            $query = Schedule::where(['courses_id' => $selectedMatakuliah]);

            return DataTables::of($query)
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
                                    <form action="' . route('product-gallery.destroy', $item->id) . '" method="POST">
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

        return view('pages.admin.schedule.index', [
            'searchMatakuliah' => $searchMatakuliah, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request )
    {
        $products = Product::all();
        $matakuliah = Course::all()->groupBy('prodi');
        $JURUSAN_PRODI = Course::JURUSAN_PRODI;
        $HARI = Schedule::HARI;

        $dosen = Lecture::all();

        $rooms = Room::all()->groupBy('building');

        $TAHUN_AJARAN = Schedule::TAHUN_AJARAN;

        $searchMatakuliah = $request->input('course') ?? null;
        $selectedMatakuliah = $searchMatakuliah ? Course::find($searchMatakuliah )->first() : null;

        return view('pages.admin.schedule.create', [
            'TAHUN_AJARAN' => $TAHUN_AJARAN,
            
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
        return redirect()->route('schedule.index');
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
