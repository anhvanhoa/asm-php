<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Models\Category;

class CategoryController extends Controller
{
    function index()
    {
        $q = request()->query('q');
        $list = Category::where('name', 'like', "%$q%")
            ->orderByDesc('id')->paginate(8);
        // return $list;
        return view('admin.categories', [
            'list' => $list
        ]);
    }
    function create()
    {
        return view('admin.form-category');
    }

    function store(StoreCategory $request)
    {
        $data = $request->all();
        Category::create($data);
        return redirect()->route('admin.categories')->with('success', 'Category added successfully');
    }

    function edit($id)
    {
        $category = Category::find($id);
        return view('admin.form-category', [
            'data' => $category,
        ]);
    }

    function update(StoreCategory $request, $id)
    {
        $category = Category::find($id);
        $data = $request->all();
        $category->update($data);
        return redirect()->route('admin.categories')->with('success', 'Categories updated successfully');
    }

    function destroy($id)
    {
        try {
            Category::destroy($id);
            return redirect()->route('admin.categories')->with('success', 'Category deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('admin.categories')->with('error', 'Category deleted fail');
        }
    }
}
