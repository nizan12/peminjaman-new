<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CourseSchedule;
use App\Models\ProductGallery;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ProductGalleryRequest;

class CourseScheduleController extends Controller
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
        if (request()->ajax()) {
            $query = ProductGallery::query();
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

                ->editColumn('photos', function ($item) {
                    return $item->photos ? '<img src="' . Storage::url($item->photos) . '" style="max-height: 50px;" />' : '';
                })
                ->rawColumns(['action', 'photos'])
                ->make();
        }

        $searchMatakuliah = $request->input('course') ?? null;

        return view('pages.admin.course-schedule.index', [
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
        $HARI = CourseSchedule::HARI;

        $dosen = Lecture::all();

        $rooms = Room::all()->groupBy('building');

        $TAHUN_AJARAN = CourseSchedule::TAHUN_AJARAN;

        $searchMatakuliah = $request->input('course') ?? null;
        $selectedMatakuliah = $searchMatakuliah ? Course::find($searchMatakuliah )->first() : null;

        return view('pages.admin.course-schedule.create', [
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
    public function store(ProductGalleryRequest $request)
    {
        $data['products_id'] = $request->products_id;
        $data['photos'] = $request->file('photos')->store('assets/gallery', 'public');

        ProductGallery::create($data);

        return redirect()->route('product-gallery.index');
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

        return redirect()->route('product-gallery.index');
    }
}
