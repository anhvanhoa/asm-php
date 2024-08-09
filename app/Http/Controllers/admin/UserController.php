<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBook;
use App\Http\Requests\StoreBookUpdate;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\PublishingCompany;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $q = request()->query('q');
        $list = User::where('name', 'like', "%$q%")
            ->orderByDesc('users.id')->paginate(8);
        // return $list;
        return view('admin.users', [
            'list' => $list
        ]);
    }
    function create(Request $request)
    {
        return view('admin.form-user');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $data = $request->only('name', 'email', 'password');
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('admin.users')->with('success', 'User added successfully');
    }

    function edit($id)
    {
        $book = User::find($id);
        return view('admin.form-user', [
            'data' => $book,
        ]);
    }

    function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $user = Book::find($id);
        $data = $request->all();
        $user->update($data);
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    function destroy($id)
    {
        try {
            User::destroy($id);
            return redirect()->route('admin.users')->with('success', 'User deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('admin.users')->with('error', 'User deleted fail');
        }
    }
}
