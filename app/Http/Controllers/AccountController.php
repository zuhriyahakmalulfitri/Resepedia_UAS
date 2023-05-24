<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index()
    {
        return view('account', [
            'title' => 'Account',
            'posts' => Post::where('user_id', auth()->user()->id)->latest()->filter(request(['keyword']))->get(),
            'users' => User::where('id', auth()->user()->id)->get()
        ]);
    }

    public function indexuser(User $user)
    {
        return view('account', [
            'title' => 'User Posts',
            'posts' => Post::where('user_id', $user->id)->latest()->filter(request(['keyword']))->get(),
            'users' => User::where('id', $user->id)->get()
        ]);
    }
    
    public function editAkun(User $user)
    {
        if(auth()->guest() || $user->id !== auth()->user()->id){
            abort(403);
        }

        return view('edit-akun', [
            'title' => 'Account',
            "user" => $user,
        ]);
    }

    public function updateAkun(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'photo' => 'image',
            'name' => 'required|max:225',
            'about' => 'required|max:225'
        ]);

        $newUsername = $request['username'];
        if($request['username'] = $user->username) {          
            $validatedData['username'] = $newUsername;            
        } else{
            $validatedDataUsername= $request->validate([
                'username' => 'required|unique:users',
            ]);
            $validatedData['username'] = $validatedDataUsername['username'];
        }

        if($request['photo']){
            if($user->photo !== 'user-photos/chef.png'){
                Storage::delete($user->photo);          
            }

            $validatedData['photo'] = $request->file('photo')->store('user-photos');
        } else{
            $validatedData['photo'] = $user->photo;
        }

        $validatedData['email'] = auth()->user()->email;
        $validatedData['password'] = auth()->user()->password;
        User::where('id', $user->id)
            ->update($validatedData);
        
        return redirect('/account');
    }

    public function verified(User $user)
    {   
        $data['photo'] = $user->photo;
        $data['name'] = $user->name;
        $data['username'] = $user->username;
        $data['email'] = $user->email;
        $data['password'] = $user->password;
        $data['about'] = $user->about;
        $data['isAdmin'] = $user->isAdmin;
        $data['isVerified'] = 1;

        User::where('id', $user->id)
             ->update($data);     

        return redirect("/user/$user->username");
        
    }
}
