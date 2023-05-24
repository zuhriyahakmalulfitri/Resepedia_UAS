@extends('layouts.main')

@section('container')

    <h2 class="text-center judul-hal">List Categories</h2>
        @foreach($categories as $category) 
            @if ($category == $edit)
                <div class="container-category">                                            
                    <form action="/categories/update/{{ $category->slug }}" method="post">
                        @csrf
                        <div class="update-category">
                            <button type="submit" name="submit" id="update-category">Update</button>
                        </div>
                        <a class="cancel-category" href="/categories">Cancel</a>
                        <input type="text" name="name" class="@error('name')is-invalid @enderror" id="edit-category"  autofocus required value="{{ $category->name }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror             
                    </form>              
                </div>
            @else
                <div class="container-category">          
                    <a href="/categories/delete/{{ $category->slug }}" onclick="return confirm('Yakin?');">Delete</a>
                    <a href="/categories/{{ $category->slug }}">Edit</a>      
                    <div class="category-nama">
                        <p>{{ $category->name }}</p>
                    </div>           
                </div>
            @endif  
        @endforeach
            
        @isset($show)
            <div class="container-category">
                <form action="/categories" method="post">
                    @csrf
                    <input class="@error('name')is-invalid @enderror" type="text" name="name" id="category-name" autocomplete="off" autofocus required value="{{ old('name') }}" placeholder="New Category">
                    @error('name')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror

                    <div class="text-center">
                        <button type="submit" name="submit" id="add-category">Add</button>
                    </div>
                </form>
            </div>
        @else
            <br>
            <a class="link-tambah-category"  href="/categories/new">
                <div id="tambah-category">
                    New Category
                </div> 
            </a>
        @endisset       
    </div>   
          
@endsection
