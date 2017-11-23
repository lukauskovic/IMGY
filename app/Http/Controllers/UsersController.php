<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Auth;
use App\User;


class UsersController extends Controller
{
    public function profile($id)
    {
        $user = User::where('id',$id)->first();
        $images = Image::all();
        return view('profile')->withUser($user)->withImages($images);
    }

    public function image($id)
    {
        $img = Image::where('id',$id)->first();
        $user = User::where('id',$img->user_id)->first();

        return view('image')->withUser($user)->withImg($img);
    }
}
