@extends('layouts.main')

@section('container')

  <div class="container-in">
    <a href="/" class="text-center back-home">
      <div class="bi bi-house-fill"> Back to Home</div>     
    </a>
    <br><br>

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
      </div>
    @endif

    @if(session()->has('loginError'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
      </div>
    @endif

    <div class="text-center">
      <img src="img/logoutama.png" width="200" top="50">
    </div>
    
    <div class="container">
      <form class="form-container" action="/login" method="post">
        @csrf
        <div class="textJudul">Log in</div>
        <div class="textsubjudul">Find your favorite recipe!</div>

        <div class="input-group mb-3">             
          <input type="text" name="email" class="@error('email')is-invalid @enderror" id="email" placeholder="E-mail" autofocus required value="{{ old('email') }}" autocomplete="off">
          <label for="email" class="form-label textForm"></label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="input-group border-pass">       
          <input type="password" name="password" id="password" placeholder="Password" required autocomplete="off">
          <label for="password">
            <div class="show-hide" onclick="showHide();" >
              <i class="bi bi-eye-slash" id="toggle"></i>
            </div>
          </label>
        </div>     

        <div class="d-grid at-2 text-center">
          <p class="at-1"></p>
          <button type="submit" class="btn btn-primary">Log in</button> 
          <span>Don't have an account?
            <a href="\register" class="text-decoration-none text-theme">Sign Up</a>
          </span>
        </div>
      </form>
    </div>
  </div>

  <script type="text/javascript">
    const password = document.getElementById('password');
    const toggle = document.getElementById('toggle');
      
    function showHide(){
      if(password.type === 'password'){
        password.setAttribute('type', 'text');
        toggle.classList.remove('bi-eye-slash')
        toggle.classList.add('bi-eye-fill')
      } else{
        password.setAttribute('type', 'password');
        toggle.classList.remove('bi-eye-fill')
        toggle.classList.add('bi-eye-slash')
      }
    }
  </script>
 
@endsection
