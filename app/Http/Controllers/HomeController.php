<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Image;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Tag;
use App\Follows;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return array
     */
    public function index(Request $request)
    {
        $followed_users_id = Follows::where('user_id', Auth::user()->id)
                                      ->pluck('following_user_id');
        if($followed_users_id->isEmpty()) $followed_users_id = array();
        $images = Image::whereIn('user_id', $followed_users_id)
                         ->orwhere('user_id', Auth::user()->id)
                         ->orderBy('created_at','desc')
                         ->paginate(4);
        $images_count= Image::whereIn('user_id', $followed_users_id)
                       ->orwhere('user_id', Auth::user()->id)
                       ->count();
        if($request->ajax() and $images_count>4) {
            return [
                'images' => view('infinite_scroll.infinite_scroll')->with(compact('images'))->render(),
                'next_page' => $images->nextPageUrl()
            ];
        }

        return view('home')->withImages($images);
    }

    public function modal_content($modal_image_id){
        $img = Image::where('id',$modal_image_id)->first();
        $user = User::where('id',$img->user_id)->first();
        $tags = Image::find($img->id)->tags()->get();
        $tag_names = array();
        $user_id = $user->id;
        foreach ($tags as $tag){
            array_push($tag_names, $tag->name);
        }
        $user_fullname = $user->firstname .' '. $user->lastname;
        return [
            'user_fullname' => $user_fullname,
            'image_description' => $img->description,
            'image_tags' => $tag_names,
            'image_user_id' => $user_id
        ];
    }

    public function search()
    {
        
             $search = \Request::get('search');
             $users = User::where('firstname','like','%'.$search.'%')
                            ->orWhere('lastname','like','%'.$search.'%')
                            ->orderBy('firstname')
                            ->paginate(5);

            $tags = Tag::where('name','like','%'.$search.'%')
                        ->pluck('id');
            if(!$tags->isEmpty()) $images = Tag::find($tags)->images()->get();
            else $images = array();

 
    return view('search')->withUsers($users)->withImages($images);
    }


}
