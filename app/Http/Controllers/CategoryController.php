<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {   
        return view('categories',[
            'title' => 'Categories',
            'categories' => Category::all(),
            'edit' => 'no'
        ]);
    }

    public function create()
    {
        return view('categories', [
            'title' => 'Categories',
            'show' => true,
            'edit' => 'no',
            'categories' => Category::all()
        ]);
        return redirect('/categories');
    }

    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories'
        ]);
        $validatedData['slug'] = Str::slug($validatedData['name']);
        
        Category::create($validatedData);
        return redirect('/categories');
    }

    public function destroy(Category $category)
    {   
        Category::destroy($category->id);
        
        return redirect('/categories');
    }

    public function edit(Category $category)
    {   
        return view('categories', [
            'title' => 'Categories',
            'edit' => $category,
            'categories' => Category::all()
        ]);
        return redirect('/categories');
    }

    public function update(Request $request, Category $category)
    {   
        $newName = $request['name'];
        if($request['name'] = $category->name) { 
            $validatedData['name'] = $newName;                  
        } else {
            $validatedDataName = $request->validate([
                'name' => 'required|max:255|unique:categories',
            ]);
            $validatedData['name'] = $validatedDataName['name'];
        }
        
        $validatedData['slug'] = Str::slug($validatedData['name']);
        
        Category::where('id', $category->id)
            ->update($validatedData);
        
        return redirect('/categories');
    }
}
