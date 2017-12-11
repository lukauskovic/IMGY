@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-5">
            @if($user->email == Auth::user()->email)
                <h1>Your Images</h1>
            @else
                <h1>{{$user->firstname . ' ' . $user->lastname}}'s Images</h1>
            @endif
            </div>

        </div>

        <div class="row">

            @foreach($images as $image)
                @if($user->id == $image->user_id)
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <div class="img-thumbnail">
                                <img onclick="image_modal(this)" id="{{$image->id}}" src="<?php echo URL::to('/'); ?>/{{$image->url}}" style="cursor: pointer;" width="250px" height="200px" />
                                @if(Auth::user()->id == $user->id)
                                    <a onclick="return confirmAction()" href="{{url('/delete', $image->id)}}"><button style="position: absolute; top: 5px; right: 23px;" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a> 
                                @endif
                            </div>
                    </div>

                @endif
            @endforeach

        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="ImageModal" tabindex="-1" role="dialog" aria-labelledby="ImageModal">
        <div class="modal-dialog modal-lg" role="document">
            <div id="test" class="modal-content row">
                <div class="col-md-8">
                    <img class="img-thumbnail" id="imagePreview" style="max-height: 100vh"/>
                </div>
                <div class="col-md-4">
                    <a id="user_link"><h3 id="user_fullname"></h3></a>
                    <p id="description"></p>
                    <h4>Tags: </h4>
                    <ul id="tags">

                    </ul>
                </div>


            </div>
        </div>
    </div>

    <script>
            
            function confirmAction(){
            var confirmed = confirm("Are you sure? This will remove image forever.");
           return confirmed;
            }

    </script>
    <script src="<?php echo URL::to('/'); ?>/js/modal.js"></script>
@endsection

