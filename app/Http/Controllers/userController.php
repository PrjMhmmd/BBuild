<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    public function index_profile(){
        $user = Auth::user();
        return view('profile', compact('user'),[
            "gambar"=>"../img/default.jpeg"
        ]);
    }

    public function updateProfile(Request $request, User $user)
    {
        $userId = Auth::id();
        $user = User::find($userId);

        $update=([
            'username' => 'string',
            'email' => 'email|unique:users,email,',
            'hp' => 'string',
            'image' => 'image|mimes:jpeg,png|max:2048',
        ]);

        $updateData=$request->validate($update);

        if ($request->file('image')) {

            $updateData['image']=$request->file('image')->store('user-images');

            if ($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }
        }

        $user->update($updateData);

        return redirect('/profile');
    }


}
