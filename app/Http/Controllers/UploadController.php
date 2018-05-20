<?php

namespace App\Http\Controllers;

use Cloudinary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Image;
use App\Tag;
use App\User;
use Illuminate\View\View;

class UploadController extends Controller
{
    public function index(){
        $tags =  Tag::all();
        return view('upload')->withTags($tags);
    }
    public function configCloudinary(){
        Cloudinary::config(array(
            "cloud_name" => "djul74lwz",
            "api_key" => "999472721123925",
            "api_secret" => "fj56U3FNImsVM3SCt0TvgpjIf6s"
        ));
    }
    public function upload() {
        $this->configCloudinary();
        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required|max:1000000'); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return $this->index();
        }
        else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $description = $_POST['description'];
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999); // image name
                $cloudinaryId = "imgy/" . $fileName;
                Cloudinary\Uploader::upload(Input::file('image'), array(
                    "public_id" => $cloudinaryId,
                    "format" => $extension
                    ));
                //DB
                $img = new Image();
                $img->url = cloudinary_url($cloudinaryId);
                $img->cloudinary_id = $cloudinaryId;
                $img->user_id = Auth::user()->id;
                $img->description = $description;
                $img->save();
                $this->tags($img);
                // sending back with message
                Session::flash('success', 'Upload successfully');
                return Redirect::to('home');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('upload');
            }
        }    
    }

    public function tags($img){
        $tags = $_POST["tag"];
        foreach ($tags as $post_tag){
            $flag = false;
            foreach (Tag::all() as $tag){
                if($post_tag == $tag->name && $post_tag != ""){
                $tag->images()->attach($img->id);
                $flag= true;
                break;
                }
            }
            if(!$flag && $post_tag != ""){
                $tag = new Tag();
                $tag->name = $post_tag;
                $tag->save();
                $tag->images()->attach($img->id);
                $flag = false;
            }
        }
    }

    public function delete($id){
       $this->configCloudinary();
       $img = Image::find($id);
       if($img->user_id == Auth::user()->id)
       {
         Cloudinary\Uploader::destroy($img->cloudinary_id);
         $img->delete();
       }
       return redirect()->back();
    }

}
