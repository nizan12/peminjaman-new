<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Banner;
use App\Models\Holiday;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\BannerRequest;
use App\Http\Requests\Admin\HolidayRequest;

class HolidayController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Holiday::orderBy('date', 'ASC');
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
                                    <a class="dropdown-item" href="' . route('holiday.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form onsubmit="delete_confirm(event)" action="' . route('holiday.destroy', $item->id) . '" method="POST">
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

                ->editColumn('date', function ($item) {
                    return Carbon::parse($item->date)->format('d M Y');
                })
                ->rawColumns(['action', 'date'])
                ->make();
        }

        return view('pages.admin.holiday.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.holiday.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HolidayRequest $request)
    {

        $data['title'] = $request->title;
        $data['date'] = $request->date;


        Holiday::create($data);

        return redirect()->route('holiday.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Holiday::findOrFail($id);
        return view('pages.admin.holiday.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HolidayRequest $request, $id)
    {

        $item = Holiday::findOrFail($id);

        $data['title'] = $request->title;
        $data['date'] = $request->date;

        $item->update($data);

        return redirect()->route('holiday.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Holiday::findOrFail($id);

        $item->delete();

        return redirect()->route('holiday.index');
    }
}
