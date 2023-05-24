@extends('layouts.main')

@section('container')

    <div class="container-recipe">
        <form action="/account" method="post" enctype="multipart/form-data">
            @csrf
            <ul>
                <li>                 
                    <label for="picture"></label>
                    <div class="picture-default">
                        <img src="../img/picture.png" class="img-preview">
                    </div>
                    <div class="picture-preview">
                        <input class="@error('picture')is-invalid @enderror" type="file" name="picture" id="picture" required onchange="previewImage()">
                    </div>
                    @error('picture')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </li>
                <li>
                    <label class="label-write" for="title">Judul :</label>
                    <input class="@error('title')is-invalid @enderror" type="text" name="title" id="title" autocomplete="off" required value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </li>
                <li>
                    <label class="label-write" for="ingredient">Bahan-bahan</label><br>
                    <textarea type="text" name="ingredient" id="ingredient" rows="5" cols="50" required autocomplete="off">{{ old('ingredient') }}</textarea>
                </li>
                <li>
                    <label class="label-write" for="step">Langkah-langkah</label><br>
                    <textarea type="text" name="step" id="step" rows="5" cols="50" required autocomplete="off">{{ old('step') }}</textarea>
                </li>
                <li>
                    <label class="label-write" for="category_id">Kategori : </label>
                    <select id="category_id" name="category_id">
                        @foreach ($categories as $category)
                            @if(old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </li>
                <li>
                    <div class="submit-recipe">
                        <button type="submit" name="submit" id="upload-resep">Upload Recipe</button>
                    </div>         
                </li>
            </ul>
        </form>

@endsection
