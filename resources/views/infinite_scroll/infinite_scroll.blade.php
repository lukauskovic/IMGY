    @foreach($images as $image)
    <div  class="article" style="padding: 30px;">
        <div class="text-center">
            <a  href="{{url('/image' , $image->id)}}">
                <img class="img-thumbnail" alt="" src="http://localhost/IMGY/public/{{$image->url}}" width="40%" height="60%" />
            </a>
        </div>
    </div>
    @endforeach
