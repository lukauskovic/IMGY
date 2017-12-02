<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Image;
use App\User;
use App\Tag;
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
        $images = Image::orderBy('created_at','desc')->paginate(4);

        if($request->ajax()) {
            return [
                'images' => view('infinite_scroll.infinite_scroll')->with(compact('images'))->render(),
                'next_page' => $images->nextPageUrl()
            ];
        }

        return view('home')->withImages($images);
    }

    public function modal_content($modal_image_id){
        //$modal_image_src = htmlspecialchars($_GET["src"]);
        $img = Image::where('id',$modal_image_id)->first();
        $user = User::where('id',$img->user_id)->first();
        $tags = Image::find($img->id)->tags()->get();
        $tag_names = array();
        foreach ($tags as $tag){
            array_push($tag_names, $tag->name);
        }
        $user_fullname = $user->firstname .' '. $user->lastname;
        return [
            'user_fullname' => $user_fullname,
            'image_description' => $img->description,
            'image_tags' => $tag_names
        ];
    }

    public function search()
    {
        
            $search = \Request::get('search');
             $users = User::where('name','like','%'.$search.'%')
            ->orderBy('name')
            ->paginate(5);

            function emptyObj($users) {
            foreach ($users as $k) {
                return false;
            }
            return true;
            }

            $empty = emptyObj($users);            
 
    return view('search')->withUsers($users)->withEmpty($empty);
    }


}
