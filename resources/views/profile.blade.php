@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-md-offset-5">
            @if($user->name == Auth::user()->name)
                <h1>Your Images</h1>
            @else
                <h1>{{$user->name}}'s Images</h1>
            @endif
            </div>

        </div>

        <div class="row">

            @foreach($images as $image)
                @if($user->id == $image->user_id)
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a  href="/IMGY/public/image/{{$image->id}}">
                            <div class="img-thumbnail">
                                <img alt="" src="http://localhost/IMGY/public/{{$image->url}}" width="250px" height="200px" />
                            </div>
                        </a>
                    </div>

                @endif
            @endforeach

        </div>
    </div>
@endsection