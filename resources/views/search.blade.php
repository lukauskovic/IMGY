@extends('layouts.app')

@section('content')

	<div class="container">

	  	<div class="panel panel-default">
			 <table class="table table-bordered table-hover" >
	            <thead>
	                <th>Name</th>
	            </thead>
	            <tbody>
	            	@if($empty == TRUE)
	            	<td>No Results</td>
	            	@else
	                @foreach($users as $user)
	                <tr>
	                   <td> <a href="{{url('/profile', $user->id)}}">{{ $user->name }}</a></td>                   
	                </tr>
	                @endforeach
	                @endif
	            </tbody>
	        </table>
	    </div>



	</div>

@endsection