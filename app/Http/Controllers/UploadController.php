<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\image;



class UploadController extends Controller
{
    public function upload()
    {
            // checking file is valid.
            if (Input::file('file')->guessClientExtension() =='jpeg') {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('file')->guessClientExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('file')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                $img = new image();
                $img->user_id = Auth::user()->id;
                $img->url = 'uploads/'.$fileName;
                $img->save();


                Session::flash('success', 'Upload successfully');
                return Redirect::to('home');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('upload');
            }

    }

    public function show(){


    }

}
