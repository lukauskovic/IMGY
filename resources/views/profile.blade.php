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
                        <a  href="{{url('/image' , $image->id)}}">
                            <div class="img-thumbnail">
                                <img alt="" src="http://localhost/IMGY/public/{{$image->url}}" width="250px" height="200px" />
                                @if(Auth::user()->id == $user->id)
                                    <a onclick="return confirmAction()" href="{{url('/delete', $image->id)}}"><button style="position: absolute; top: 5px; right: 23px;" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a> 
                                @endif
                            </div>
                        </a>
                    </div>

                @endif
            @endforeach

        </div>
    </div>
    <script>
            
            function confirmAction(){
            var confirmed = confirm("Are you sure? This will remove image forever.");
           return confirmed;
            }

         </script>
@endsection

