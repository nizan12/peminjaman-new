<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Requests\Admin\CourseRequest;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Course::query();
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
                                    <a class="dropdown-item" href="' . route('course.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="'. route('course.destroy', $item->id) .'" method="POST">
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

                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.course.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.admin.course.create', ['JURUSAN_PRODI' => Course::JURUSAN_PRODI]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $data['code'] = $request->code;
        $data['name'] = $request->name;
        $data['prodi'] = $request->prodi;

        Course::create($data);

        return redirect()->route('course.index');
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
        $item = Course::findOrFail($id);
        return view('pages.admin.course.edit', [
            'item' => $item,
            'JURUSAN_PRODI' => Course::JURUSAN_PRODI
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, string $id)
    {
        $data['code'] = $request->code;
        $data['name'] = $request->name;
        $data['prodi'] = $request->prodi;

        $item = Course::findOrFail($id);

        $item->update($data);

        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Course::findOrFail($id);
        $item->delete();

        return redirect()->route('course.index');
    }
}
