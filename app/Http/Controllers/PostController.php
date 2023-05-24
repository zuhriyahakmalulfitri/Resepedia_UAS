<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {   
        return view('home', [
            'title' => 'Home',
            'categories' => Category::all(),
            'posts' => Post::latest()->filter(request(['keyword']))->get(),
            'users' => User::all()
        ]);

    }

    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Resep',
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'title' => 'required|max:255|unique:posts',
            'picture' => 'required|image',
            'ingredient' => 'required|max:3000',
            'step' => 'required|max:3000',
            'category_id' => 'required'
        ]);
        $validatedData['picture'] = $request->file('picture')->store('post-pictures');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::slug($validatedData['title']);
        
        Post::create($validatedData);
        return redirect('/account');
    }

    public function destroy(Post $post)
    {   
        if(auth()->user()->isAdmin || $post->user_id == auth()->user()->id){
            Storage::delete($post->picture);
            Post::destroy($post->id);
            
            return redirect('/account');
        } else{
                abort(403);
        }  
    }

    public function edit(Post $post)
    {   
        if(auth()->user()->isAdmin || $post->user_id == auth()->user()->id){
            return view('edit-recipe', [
                'title' => 'Edit Recipe',
                "post" => $post,
                'categories' => Category::all()
            ]);
        } else{
                abort(403);
        }
    }
        

    public function update(Request $request, Post $post)
    {     

        $validatedData = $request->validate([
            'picture' => 'image',
            'ingredient' => 'required|max:3000',
            'step' => 'required|max:3000',
            'category_id' => 'required'
        ]);

        $newTitle = $request['title'];
        if($request['title'] = $post->title) {          
            $validatedData['title'] = $newTitle;            
        } else{
            $validatedDataTitle = $request->validate([
                'title' => 'required|max:255|unique:posts',
            ]);
            $validatedData['title'] = $validatedDataTitle['title'];
        }

        if($request['picture']){
            Storage::delete($post->picture);
            $validatedData['picture'] = $request->file('picture')->store('post-pictures');
        } else{
            $validatedData['picture'] = $post->picture;
        }
        
        $validatedData['user_id'] = $post->user_id;
        $validatedData['slug'] = Str::slug($validatedData['title']);

        Post::where('id', $post->id)
            ->update($validatedData);
        
        return redirect('/account');
    }
}