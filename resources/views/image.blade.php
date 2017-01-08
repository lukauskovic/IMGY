@extends('layouts.app')

@section('content')

<div class="container">
		
	<div class='row'>
		

		 <img class="img-thumbnail" style="float: left" alt="" src="http://localhost/IMGY/public/{{$img->url}}" height="50%" width="50%" />

		

		 

		 <h2>Uploaded by <a href="{{url('/profile' , $user->id)}}">{{$user->name}}</a></h2>
		 <h2>Upload date : {{$img->created_at->format('d M Y')}}</h2>
		 @if(Auth::user()->id == $user->id)
		 	<a onclick="return confirmAction()"	href="{{url('/delete', $img->id)}}">Delete This Image</a>		 
		 @endif

		 <script>
		 	
		 	function confirmAction(){
    	    var confirmed = confirm("Are you sure? This will remove image forever.");
     	   return confirmed;
			}

		 </script>
		

	</div>

</div>

@endsection

