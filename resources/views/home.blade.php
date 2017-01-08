@extends('layouts.app')

@section('content')
<div  class="container">
    <div class="row">

        <div class="col-md-12 col-md-offset-5">

            <h1>Gallery</h1>

        </div>

    </div>

    <div class="row">

            @foreach($images as $image)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a  href="{{url('/image' , $image->id)}}">
                    <div class="img-thumbnail">
                        <img alt="" src="http://localhost/IMGY/public/{{$image->url}}" width="250px" height="200px" />
                    </div>
                </a>
            </div>


            @endforeach

        </div>


</div>
@endsection
