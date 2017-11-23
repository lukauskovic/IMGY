@extends('layouts.app')

@section('content')
<div  class="container-fluid">
    <div class="row">

        <div class="text-center">

            <h1>Gallery</h1>

        </div>

    </div>

    <div class="container">

        <section class="images endless-pagination" data-next-page="{{ $images->nextPageUrl() }}">
            @foreach($images as $image)
                <div  class="article" style="padding: 30px;">
                        <div class="text-center">
                            <a  href="{{url('/image' , $image->id)}}">
                                <img class="img-thumbnail" alt="" src="http://localhost/IMGY/public/{{$image->url}}" width="40%" height="60%" />
                            </a>
                        </div>
                </div>
            @endforeach
        </section>

    <div class="text-center">
        {{--{!! $images -> render() !!}--}}
    </div>
        <script src="<?php echo URL::to('/'); ?>/js/infinite_scroll.js"></script>


@endsection
