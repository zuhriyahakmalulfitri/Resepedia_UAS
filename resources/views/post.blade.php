@extends('layouts.main')

@section('container')
    @if($post->user_id !== $post->user->id && $post->user->isAdmin == false)
    <div class="container-post-atas">
        <a href="/edit/{{ $post->slug}}">
            <div class="edit">Edit</div>
        </a> 
        <a href="/delete/{{ $post->slug}}">
            <div class="delete">
                <i class="bi bi-trash-fill"> </i>Delete Recipe
            </div>
        </a>
    </div>
    @else
        <br><br>
    @endif
    
    <div class="container-post-bawah">
        <div class="post-title">
            <div class="picture-post">
                <img src="{{ asset('storage/' . $post->picture) }}" alt="">
            </div>  
            <p>{{ $post->title }}</p>       
        </div>

        <hr>
        <div class="isi">
            <div class="sub-isi">Bahan-bahan</div>
            <div class="text-sub-isi">{{ $post->ingredient }}</div>
        </div>

        <hr>
        <div class="isi" class="isi">
            <div class="sub-isi">Langkah-langkah</div>
            <div class="text-sub-isi">{{ $post->step }}</div>
        </div>

        <hr>
        <div class="text-center">
            <div class="post-user-photo">
                <img class="mb-4" src="{{ asset('storage/' . $post->user->photo) }}" top="50">
            </div>        
            <p>Published By</p>
            <div class="post-user-username">{{ $post->user->username }}
                @if($post->user->isVerified)
                    <i class="bi bi-patch-check-fill"></i>
                @endif
            </div>
            <div class="tanggal">{{ $post->updated_at->format('M, d Y') }}</div>
        </div>
    </div>
    
@endsection
