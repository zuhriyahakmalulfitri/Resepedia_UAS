@extends('layouts.main')

@section('container')

    <div class="container-akun-atas">
        @foreach($users as $user)
            @if($posts->count())
                @if(auth()->user()->isAdmin && $posts[0]->user['id'] !== auth()->user()->id && $posts[0]->user['isVerified'] == false) 
                    <a href="/verified/{{ $user->username }}" onclick="return confirm('Apakah user ini akan diverifikasi?');">
                        <div class="tombol-verifikasi">
                            <i class="bi bi-patch-check-fill"></i>Verifikasi
                        </div>
                    </a> 
                @endif
                @if($posts[0]->user['id'] == auth()->user()->id)             
                    <a href="/edit-akun/{{ $user->username}}"><div class="edit-akun-button">Edit</div></a>               
                @endif
            @else
                @if(auth()->user()->id)
                    <a href="/edit-akun/{{ $user->username}}"><div class="edit-akun-button">Edit</div></a>
                @endif
            @endif
            <div class="profil mb-2">
                <div class="user-photo">
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="">      
                </div>
                <div>
                    <div class="user-username">
                        {{ '@' . $user->username }}
                        @if($user->isVerified)
                            <i class="bi bi-patch-check-fill"></i>
                        @endif
                    </div>
                    <div class="user-name">
                        {{ $user->name }}
                    </div>
                </div>                  
            </div>
            <div class="mb-4 user-about">{{ $user->about}}</div>
        @endforeach

        <span>MyRecipe</span>         
    </div>

    <div class="container-akun-cari">
        <div class="input-cari-resep-anda">
          <img src="../img/cari.png" alt="">
          @if($title == 'Account')
            <form action="/account">
          @else
            <form action="/user/{{ $user->username }}">
          @endif        
            @csrf
            <input type="text" name="keyword" id="cari-resep-anda" placeholder=" Cari Resep" autocomplete="off" value="{{ request('keyword') }}">
            <button type="submit" name="cari-resep-anda">Search</button>
          </form>
        </div>
        <p>{{ count($posts) }} Recipe</p>
    </div>


    @if($posts->count())
        @foreach($posts as $post)
            <div class="container-akun-bawah">
                <div  class="post-picture">
                    <img src="{{ asset('storage/' . $post->picture) }}" alt="">
                </div>
                <div class="crud">
                    <ul>
                        <li><a href="\{{ $post->slug }}">Lihat</a></li>
                        @if($post->user_id == auth()->user()->id || auth()->user()->isAdmin)
                        <li><a href="/edit/{{ $post->slug }}">Edit</a></li>
                        <li><a href="/delete/{{ $post->slug }}" onclick="return confirm('Apakah anda ingin menghapus resep ini?');">Delete</a></li>
                        @endif                      
                    </ul>                
                </div>

                <div class="post-isi">
                    <div class="title">{{ $post->title }}</div>             
                    <div class="ingredient">{{ $post->ingredient }}</div>
                </div>                             
            </div>

        @endforeach
    @endif
    
@endsection
