<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class SearchController extends Controller
{
    public function index()
    {   
        return view('search', [
            'title' => 'Search', 
            'categoriesAll' => Category::all(), 
            'categories' => Category::filter(request(['category']))->get(),
            'keyword2' => request('category'),
            'posts' => Post::latest()->filter(request(['title']))->get(),
            'users' => User::latest()->filter(request(['user']))->get()
        ]);

    }
}
