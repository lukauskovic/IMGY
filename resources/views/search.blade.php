@extends('layouts.app')

@section('content')

	<div class="container">

	  	<div class="panel panel-default">
			 <table class="table table-bordered table-hover" >
	            <thead>
	                <th>Name</th>
	            </thead>
	            <tbody>
	            	@if($users->isEmpty())
	            	<td>No Results</td>
	            	@else
	                @foreach($users as $user)
	                <tr>
	                   <td> <a href="{{url('/profile', $user->id)}}">{{ $user->firstname . ' ' .$user->lastname }}</a></td>
	                </tr>
	                @endforeach
	                @endif
	            </tbody>
	        </table>
	    </div>

		@foreach($images as $image)
				<div class="col-lg-3 col-md-4 col-xs-6 thumb">
					<div class="img-thumbnail">
						<img onclick="image_modal(this)" id="{{$image->id}}" src="<?php echo URL::to('/'); ?>/{{$image->url}}" style="cursor: pointer;" width="250px" height="200px" />
					</div>
				</div>

		@endforeach



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
    <script src="<?php echo URL::to('/'); ?>/js/modal.js"></script>

@endsection