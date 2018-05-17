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
                            <img onclick="image_modal(this)" id="{{$image->id}}" class="img-thumbnail" alt="" src="<?php echo URL::to('/'); ?>/{{$image->url}}" style="cursor: pointer;" width="40%" height="60%" />
                        </div>
                    </div>
                @endforeach
            </section>

    <div class="modal fade bs-example-modal-lg" id="ImageModal" tabindex="-1" role="dialog" aria-labelledby="ImageModal">
        <div class="modal-dialog modal-lg" role="document">
            <div id="test" class="modal-content row">
                <div class="col-md-8">
                    <img class="img-thumbnail" id="imagePreview" style="max-height: 100vh"/>
                </div>
                <div class="col-md-4">
                   <a id="user_link"><h3 id="user_fullname"></h3></a>
                    <p id="description"></p>
                    <h4 id="tags_title">Tags: </h4>
                    <ul id="tags"></ul>
                    <div>
                        <button id="niceButton" onclick="nice(this)">Nice!</button>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script src="<?php echo URL::to('/'); ?>/js/infinite_scroll.js"></script>
    <script src="<?php echo URL::to('/'); ?>/js/modal.js"></script>

@endsection