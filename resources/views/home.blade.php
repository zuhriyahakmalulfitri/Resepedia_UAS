@extends('layouts.main')

@section('container')

  <div class="text-center big-logo">
    <img src="img/logoutama.png" alt="">
    <p>Berbagi Resep Makanan Nusantara dan Internasional<br>Kreasikan Resep Makanan Anda Sendiri</p>
  </div>

  <div class="container-cari">
    <img src="img/cari.png" alt="">
    <div class="input-cari justify-content-center"> 
      <form action="/">
        <input type="text" name="keyword" id="cari-resep" placeholder=" Cari Resep" autocomplete="off" value="{{ request('keyword') }}">
        <button type="submit">Search</button>
      </form>
    </div>
  </div>

  @if($posts->count())
    @foreach($categories as $category)
      <?php $adaResep = false; ?>

      @foreach($posts as $post)
        @if($post->category_id == $category->id)
          <?php $adaResep = true; ?>
        @endif
      @endforeach

      @if($adaResep)
        <div class="container-1 mt-5 show-category">{{ $category->name }}</div>  
      @endif

      <section class="regular slider">
        @foreach($posts as $post)
          @if($post->category_id == $category->id)
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
      </section>
    @endforeach   
  @else
    <p class="text-center fs-5 mt-5 tidak-ada-resep">Tidak ada resep yang sesuai dengan keyword tersebut
    <br>Kami akan dengan senang hati jika anda menuliskan resep makanan yang anda maksud.</p>
  @endif

@endsection
