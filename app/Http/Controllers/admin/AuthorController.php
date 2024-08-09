<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthor;
use App\Http\Requests\StoreCategory;
use App\Models\Author;
use App\Models\Category;

class AuthorController extends Controller
{
    function index()
    {
        $q = request()->query('q');
        $list = Author::where('name', 'like', "%$q%")
            ->orderByDesc('id')->paginate(8);
        // return $list;
        return view('admin.authors', [
            'list' => $list
        ]);
    }
    function create()
    {
        return view('admin.form-author');
    }

    function store(StoreAuthor $request)
    {
        $data = $request->all();
        $data['avatar'] = $request->file('avatar')->store('images', 'public');
        Author::create($data);
        return redirect()->route('admin.authors')->with('success', 'Authors added successfully');
    }

    function edit($id)
    {
        $author = Author::find($id);
        return view('admin.form-author', [
            'data' => $author,
        ]);
    }

    function update(StoreCategory $request, $id)
    {
        $author = Author::find($id);
        $data = $request->all();
        $author->update($data);
        return redirect()->route('admin.authors')->with('success', 'Authors updated successfully');
    }

    function destroy($id)
    {
        try {
            Author::destroy($id);
            return redirect()->route('admin.authors')->with('success', 'Categories deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('admin.authors')->with('error', 'Categories deleted fail');
        }
    }
}

