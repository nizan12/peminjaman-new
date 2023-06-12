<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Product;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomRequest;
use App\Models\Holiday;
use App\Models\Schedule;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class RoomController extends Controller
{

    public function detail_ruangan($id) {

        $item = Room::findOrFail($id);


        if (request()->ajax()) {
            $query = Product::where(['rooms_id' => $id]);
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
                                    <a class="dropdown-item" href="' . route('product.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('product.destroy', $item->id) . '" method="POST">
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

                ->rawColumns(['action', 'photo'])
                ->make();
        }

        // Data Jadwal di Ruangan
        $terjadwal = Schedule::where('rooms_id', $id)->get();
        $holiday = Holiday::orderBy('date')->get();

        return view('detail-ruangan', [
            'item' => $item,
            'terjadwal' => $terjadwal,
            'holiday'   => $holiday,
        ]);

    }

    public function list_ruangan(Request $request) {

        $building = $request->input('building');

        $query = Room::query();
    
        if ($building && $building != 'Semua Gedung') {
            $query->where('building', $building);
        }
    
        $ruangan = $query->simplePaginate(10);


        $buildingOptions = Room::BUILDINGS;
        
        return view('list-ruangan', ['ruangan' => $ruangan, 'buildingOptions' => $buildingOptions]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Room::query();
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

                                <a class="dropdown-item text-info" href="' . route('room.show', $item->id) . '">
                                        Detail
                                    </a>

                                    <a class="dropdown-item" href="' . route('room.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('room.destroy', $item->id) . '" method="POST">
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

                ->rawColumns(['action', 'photo'])
                ->make();
        }

        return view('pages.admin.room.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {

        $data['code'] = $request->code;
        $data['name'] = $request->name;
        $data['building'] = $request->building;
        $data['capacity'] = $request->capacity;

        Room::create($data);

        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $item = Room::findOrFail($id);


        if (request()->ajax()) {
            $query = Product::where(['rooms_id' => $id]);
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
                                    <a class="dropdown-item" href="' . route('product.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('product.destroy', $item->id) . '" method="POST">
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

                ->rawColumns(['action', 'photo'])
                ->make();
        }




        return view('pages.admin.room.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Room::findOrFail($id);


        return view('pages.admin.room.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, string $id)
    {
        $data['code'] = $request->code;
        $data['name'] = $request->name;
        $data['building'] = $request->building;
        $data['capacity'] = $request->capacity;

        $item = Room::findOrFail($id);

        $item->update($data);

        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Room::findOrFail($id);
        $item->delete();

        return redirect()->route('room.index');
    }
}
