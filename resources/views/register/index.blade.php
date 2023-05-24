@extends('layouts.main')

@section('container')

  <div class="container-in">
    <a href="/" class="text-center back-home">
      <div class="bi bi-house-fill"> Back to Home</div>     
    </a>
    <br><br>

    <div class="text-center">
      <img src="img/logoutama.png"width="200" top="50">
    </div>

    <div class="container">
      <form class="form-container" action="/register" method="post">
        @csrf
        <div class="textJudul">Sign Up</div>
        <div class="textsubjudul">Find your favorite recipe!</div>

        <div class="input-group mb-2">     
          <input type="text" name="name" class="@error('name')is-invalid @enderror" id="name" placeholder="Nama Lengkap" required value="{{ old('name') }}" autocomplete="off">
          <label for="name" class="form-label textForm"></label>
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="input-group mb-2">     
          <input type="text" name="username" class="@error('username')is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}" autocomplete="off">
          <label for="username" class="form-label textForm"></label>
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="input-group mb-2">  
          <input type="text" name="email" class="@error('email')is-invalid @enderror" id="email" placeholder="E-mail" required value="{{ old('email') }}" autocomplete="off">
          <label for="email" class="form-label textForm"></label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="input-group mb-2 border-pass">       
          <input type="password" name="password" class="@error('password')is-invalid @enderror" id="password" placeholder="Password" required>
          
          <label for="password">
            <div class="show-hide" onclick="showHide();" >
              <i class="bi bi-eye-slash" id="toggle"></i>
            </div>
          </label>
          @error('password')
            <div class="invalid-feedback alert-signup mt-5">
              {{ $message }}
              <?php $down = true ?>
            </div>
          @enderror
        </div>
        
        @isset($down)
            <br>
        @endisset

        <div class="input-group border-pass">       
          <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required >
          <label for="password_confirmation">
            <div class="show-hide" onclick="showHide2();" >
              <i class="bi bi-eye-slash" id="toggle2"></i>
            </div>
          </label>
        </div> 
        
        <div class="d-grid at-2 text-center">
          <p class="at-1"></p>
          <button type="submit"class="btn btn-primary bbb">Sign in</button> 
          <span>Do you have an account?
            <a href="\login" class="text-decoration-none text-theme">Login</a>
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

  <script type="text/javascript">
    const password_confirmation = document.getElementById('password_confirmation');
    const toggle2 = document.getElementById('toggle2');
    
    function showHide2(){
      if(password_confirmation.type === 'password'){
        password_confirmation.setAttribute('type', 'text');
        toggle2.classList.remove('bi-eye-slash')
        toggle2.classList.add('bi-eye-fill')
      } else{
        password_confirmation.setAttribute('type', 'password');
        toggle2.classList.remove('bi-eye-fill')
        toggle2.classList.add('bi-eye-slash')
      }
    }
  </script>

@endsection
