<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBook;
use App\Http\Requests\StoreBookUpdate;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\PublishingCompany;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function index()
    {
        $q = request()->query('q');
        $list = Book::with(['publishing_company', 'author', 'category'])
            ->where('title', 'like', "%$q%")
            ->orderByDesc('books.id')->paginate(8);
        // return $list;
        return view('admin.books', [
            'list' => $list
        ]);
    }
    function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        $publishingCompanies = PublishingCompany::all();
        return view('admin.form-book', [
            'categories' => $categories,
            'authors' => $authors,
            'publishingCompanies' => $publishingCompanies
        ]);
    }

    function store(StoreBook $request)
    {
        $data = $request->all();
        $data['thumbnail'] = $request->file('thumbnail')->store('images', 'public');
        Book::create($data);
        return redirect()->route('admin.books')->with('success', 'Book added successfully');
    }

    function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        $authors = Author::all();
        $publishingCompanies = PublishingCompany::all();
        // return $book->publish_date;
        $book->publish_date = trim(str_replace(' ', 'T', $book->publish_date));
        return view('admin.form-book', [
            'data' => $book,
            'categories' => $categories,
            'authors' => $authors,
            'publishingCompanies' => $publishingCompanies
        ]);
    }

    function update(StoreBookUpdate $request, $id)
    {
        $book = Book::find($id);
        $data = $request->all();
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('images', 'public');
        } else {
            $data['thumbnail'] = $book->thumbnail;
        }
        $book->update($data);
        return redirect()->route('admin.books')->with('success', 'Book updated successfully');
    }

    function destroy($id)
    {
        try {
            Book::destroy($id);
            return redirect()->route('admin.books')->with('success', 'Book deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('admin.books')->with('error', 'Book deleted fail');
        }
    }
}
