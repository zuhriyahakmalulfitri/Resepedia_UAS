@extends('layouts.main')

@section('container')

    <div class="container-edit-akun">
        <form action="/edit-akun/{{ $user->username }}" method="post" enctype="multipart/form-data">
            @csrf
            <ul>
                <li>
                    <div class="label-edit-photo">
                        <label for="photo" >
                            <img class="photo-preview" src="{{ asset('storage/' . $user->photo) }}"  alt="">
                        </label>                                       
                    </div>
                    <div class="input-edit-photo">
                        <input type="file" name="photo" id="photo" onchange="previewPhoto()">
                    </div>       
                </li>
                <li>
                    <label class="input-edit" for="name">Name</label><br>
                    <input type="text" name="name" class="@error('name')is-invalid @enderror" id="edit-name"  required value="{{ $user->name }}" autocomplete="off">
                    @error('name')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </li>
                <li>
                    <label class="input-edit bawah" for="username">Username</label><br>
                    <input type="text" id="edit-username" name="username" class=" @error('username')is-invalid @enderror" required value="{{ $user->username }}" autocomplete="off">
                    @error('username')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </li>
                <li>
                    <label class="input-edit bawah" for="about">About Your Recipe and Your Self</label><br>
                    <textarea type="text" name="about" id="edit-about" rows="5" cols="50" required value="{{ $user->about }}" autocomplete="off">{{ old('step', $user->about) }}</textarea>

                    @error('about')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </li>
                <li>
                    <div class="tombol-edit-akun">
                        <button type="submit" name="submit" id="edit-akun">Save Changes</button>
                        <a href="/account"> 
                            <div class="cancel">
                                Cancel Changes
                            </div>
                        </a>
                    </div>   
                </li>
            </ul>
        </form>
    </div>

    <script>
        function previewPhoto(){
            const photo = document.querySelector('#photo');
            const photoPreview = document.querySelector('.photo-preview');
        
            photoPreview.style.display = 'block';
        
            const oFReader = new FileReader();
            oFReader.readAsDataURL(photo.files[0]);
        
            oFReader.onload = function(oFREvent){
                photoPreview.src = oFREvent.target.result;
            }
        }           
    </script>
    
@endsection
