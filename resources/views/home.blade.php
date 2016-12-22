@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-5">

            <a href="upload"><button class="btn-lg">UPLOAD IMAGE</button></a>

        </div>

        <div class="col-md-12">
            @foreach($images as $image)

                <img class="img-thumbnail" width="350px" height="400"px" src="{{$image->url}}" alt="">

            @endforeach
        </div>

    </div>
</div>
@endsection
