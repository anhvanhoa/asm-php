<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    function author()
    {
        $categories = Category::all();
        $author = Author::where('id', request()->id)
            ->first();
        return view('client.author', [
            'categories' => $categories,
            'author' => $author
        ]);
    }
}
