<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\BannerRequest;
use Yajra\DataTables\DataTables;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Banner::query();
            return DataTables::of($query)
                ->addcolumn('action', function($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                        type="button"
                                        data-toggle="dropdown">
                                        Aksi
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="' . route('banner.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="'. route('banner.destroy', $item->id) .'" method="POST">
                                        ' . method_field('delete') . csrf_field() .'    
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                })

                ->editColumn('photo', function ($item){
                    return $item->photo ? '<img src="'. Storage::url($item->photo) .'" style="max-height: 40px;" />' : '';
                })
                ->rawColumns(['action','photo'])
                ->make();
        }

        return view('pages.admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        $data = $request->all();
        
        $data['photo'] = $request->file('photo')->store('assets/banner','public');
        $data['is_show'] = $request->has('is_show');

        Banner::create($data);

        return redirect()->route('banner.index');
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
        $item = Banner::findOrFail($id);
        return view('pages.admin.banner.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        if ($request->file('photo')){
            $data['photo'] = $request->file('photo')->store('assets/banner','public');
        }
        
        $data['is_show'] = 0;    
        if ($request->has('is_show'))
        {
            $data['is_show'] = $request->is_show;    
        }

        $item = Banner::findOrFail($id);

        $item->update($data);

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Banner::findOrFail($id);


        $item->delete();

        return redirect()->route('banner.index');
    }
}
