<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\PublishingCompany;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index () {
        $countBook = Book::count();
        $countAuthor = Author::count();
        $countCategory = Category::count();
        $countPublishingCompany = PublishingCompany::count();
        $countUser = User::count();
        $counts = [
            [
                'name' => 'Books',
                'count' => $countBook
            ],
            [
                'name' => 'Authors',
                'count' => $countAuthor
            ],
            [
                'name' => 'Categories',
                'count' => $countCategory
            ],
            [
                'name' => 'Publishing Companies',
                'count' => $countPublishingCompany
            ],
            [
                'name' => 'Users',
                'count' => $countUser
            ]
        ];
        return view('admin.dashboard', [
            'counts' => $counts
        ]);
    }
}
