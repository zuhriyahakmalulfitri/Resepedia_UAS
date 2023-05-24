@extends('layouts.main')

@section('container')

  <div class="container-search">
    <div clas="text-center">
        <h1>Search Filter</h1>
    </div>
    <form action="/search">
      <label for="title">Judul :</label>
      <input type="text" name="title" id="keyword" placeholder="Cari Judul" autocomplete="off" value="{{ request('title') }}">

      <label for="category">Kategori : </label><br>
      <select id="keyword2" name="category">
          <option value="" selected> - </option>
          @foreach ($categoriesAll as $category)
            @if($keyword2 == $category->name)
              <option value="{{ $category->name}}" selected>{{ $category->name }}</option>
            @else
              <option value="{{ $category->name }}">{{ $category->name }}</option>
            @endif
          @endforeach
      </select>
      <br>

      <label for="user">User : </label>
      <input type="text" name="user" id="keyword3" placeholder="Cari User" autocomplete="off" value="{{ request('user') }}">

      <div class="text-center mt-2">    
          <button type="submit"><i class="bi bi-search"></i> Search</button>  
      </div>
    </form>
  </div>

  <?php $adaResep2 = false; ?>
    @foreach($categories as $category)
      <?php $adaResep = false;?>
      @foreach($posts as $post)
        @foreach($users as $user)
          @if($post->category_id == $category->id && $post->user_id == $user->id)
            <?php $adaResep = true ?>
          @endif
        @endforeach
      @endforeach

      @if($adaResep)
          <div class="container-1 mt-5 show-category">{{ $category->name }}</div>
          <?php $adaResep2 = true ?>
      @endif
          
      <section class="regular slider">
        @foreach($posts as $post)
          @foreach($users as $user)
            @if($post->category_id == $category->id && $post->user_id == $user->id)
            <div>
              <div class="resep">
                <div class="penulis-resep">
                  <div class="penulis-photo">
                    <a href="user\{{ $post->user->username }}"><img src="{{ asset('storage/' . $post->user->photo) }}" alt=""></a>                 
                  </div>
                  <a href="user\{{ $post->user->username }}">     
                    <div class="penulis-nama">
                        {{ $post->user->username }}
                        @if($post->user->isVerified)
                            <i class="bi bi-patch-check-fill"></i>
                        @endif
                    </div>
                  </a>        
                </div>

                <a href="\{{ $post->slug }}">
                  <div class="resep-picture">
                    <img src="{{ asset('storage/' . $post->picture) }}" alt="">
                  </div>
                </a> 

                <div class="deskripsi-resep">
                  <div class="judul-resep">
                    <a href="\{{ $post->slug }}">{{ $post->title }}</a>
                    @if((strlen( $post['slug'])) <= 26)
                      <div class="mt-2"></div>
                    @endif 
                  </div>          
                  <p>{{ $post->ingredient }}</p>
                </div>

              </div>
            </div>
            @endif
          @endforeach
        @endforeach
      </section>
    @endforeach
  
  @if($adaResep2 == false)
    <p class="text-center fs-5 tidak-ada-resep2">Tidak ada resep yang sesuai dengan keyword tersebut
      <br>Kami akan dengan senang hati jika anda menuliskan resep makanan yang anda maksud.</p>  
  @endif

@endsection
