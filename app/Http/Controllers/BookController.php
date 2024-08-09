<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function index()
    {
        $categories = Category::all();
        $booksFree = Book::where('price', 0)->get();
        $books = Book::orderByDesc('id')->paginate(15);
        return view('client.home', [
            'booksFree' => $booksFree,
            'books' => $books,
            'categories' => $categories
        ]);
    }
    function detail()
    {
        $categories = Category::all();
        $book = Book::with(['author', 'category', 'publishing_company'])
            ->where('books.id', request()->id)
            ->first();
        $rating = Comment::where('book_id', request()->id)->avg('rating');
        $countRating = Comment::where('book_id', request()->id)->count();
        $book->rating = $rating;
        $book->countRating = $countRating;
        $comments = Comment::where('book_id', request()->id)
            ->get();
        return view('client.detail-book', [
            'book' => $book,
            'categories' => $categories,
            'comments' => $comments
        ]);
    }
}
