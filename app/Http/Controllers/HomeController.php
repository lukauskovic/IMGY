<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\image;
use App\User;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = image::orderBy('created_at','desc')->paginate(8);
        return view('home')->withImages($images);
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
