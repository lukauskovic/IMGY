@foreach($images as $image)
    <div  class="article" style="padding: 30px;">
        <div class="text-center">
            <img onclick="image_modal(this)" id="{{$image->id}}" class="img-thumbnail" alt="" src="<?php echo URL::to('/'); ?>/{{$image->url}}" style="cursor: pointer;" width="40%" height="60%" />
        </div>
    </div>
@endforeach