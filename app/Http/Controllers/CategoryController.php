<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PublishingCompany;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();
        $category = $categories->find(request()->id);
        $books = Category::join('category_books', 'categories.id', '=', 'category_books.category_id')
            ->join('books', 'category_books.book_id', '=', 'books.id')
            ->select('books.*')->where('categories.id', request()->id)
            ->paginate(12);
        $authors = Category::all();
        $publishingCompanies = PublishingCompany::all();
        return view('client.books', [
            'categories' => $categories,
            'books' => $books,
            'category' => $category,
            'authors' => $authors,
            'publishingCompanies' => $publishingCompanies
        ]);
    }
}
