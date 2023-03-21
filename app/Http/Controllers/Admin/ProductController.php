<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Room;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Product::query();
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
                                    <a class="dropdown-item" href="' . route('product.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="'. route('product.destroy', $item->id) .'" method="POST">
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

                ->rawColumns(['action','photo'])
                ->make();
        }

        return view('pages.admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        $rooms = Room::all();

        return view('pages.admin.product.create', [
            'users' => $users,
            'categories' => $categories,
            'rooms' => $rooms,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data['nomor_bmn'] = $request->nomor_bmn;
        $data['name'] = $request->name;
        $data['users_id'] = $request->users_id;
        $data['categories_id'] = $request->categories_id;
        $data['rooms_id'] = $request->rooms_id;
        $data['description'] = $request->description;
        $data['stock'] = $request->stock;
        $data['location'] = $request->location;
        $data['slug'] = Str::slug($request->name);
        $data['condition'] = $request->condition;

        Product::create($data);

        return redirect()->route('product.index');
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
        $item = Product::findOrFail($id);
        return view('pages.admin.product.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $data['nomor_bmn'] = $request->nomor_bmn;
        $data['name'] = $request->name;
        $data['users_id'] = $request->users_id;
        $data['categories_id'] = $request->categories_id;
        $data['rooms_id'] = $request->rooms_id;
        $data['description'] = $request->description;
        $data['stock'] = $request->stock;
        $data['location'] = $request->location;
        $data['slug'] = Str::slug($request->name);
        $data['condition'] = $request->condition;

        $item = Product::findOrFail($id);

        $item->update($data);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Product::findOrFail($id);
        $item->delete();

        return redirect()->route('product.index');
    }
}
