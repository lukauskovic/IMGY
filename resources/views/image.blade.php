@extends('layouts.app')

@section('content')

<div class="container">
		
	<div class='row'>
		

		 <img class="img-thumbnail" style="float: left" alt="" src="http://localhost/IMGY/public/{{$img->url}}" height="50%" width="50%" />

		

		 

		 <h2>Uploaded by <a href="/IMGY/public/profile/{{$user->id}}">{{$user->name}}</a></h2>
		 <h2>Upload date : {{$img->created_at->format('d M Y')}}</h2>

		

	</div>

</div>


@endsection