<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follows;


class UsersController extends Controller
{
    public function profile($id)
    {
        $user = User::where('id',$id)->first();
        $images = Image::all();
        $user_following = Follows::where('user_id', Auth::user()->id)
                                 ->where('following_user_id', $id)
                                 ->exists();
        $following =Follows::where('user_id',$id)->count();
        $followers =Follows::where('following_user_id',$id)->count();
        return view('profile')->withUser($user)->withImages($images)->withFollowing($following)->withFollowers($followers)->withUserFollowing($user_following);
    }

    public function image($id)
    {
        $img = Image::where('id',$id)->first();
        $user = User::where('id',$img->user_id)->first();

        return view('image')->withUser($user)->withImg($img);
    }

    public function follow_handler($user_id){

    $follow_exists= Follows::where('following_user_id', $user_id)
                            ->where('user_id', Auth::user()->id)
                            ->exists();
    if(!$follow_exists){
        $follow = new Follows();
        $follow->user_id = Auth::user()->id;
        $follow->following_user_id = $user_id;
        $follow->save();
    }
    else{
        $existing_follow = Follows::where('user_id', Auth::user()->id)
                                    ->where('following_user_id', $user_id)
                                    ->first();
        $existing_follow->delete();
    }
    return [
        'follow_exists' => $follow_exists
    ];
    }
}
