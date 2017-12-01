@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-md-5">
                {!! Form::open(array('url'=>'apply/upload', 'class'=>'form-horizontal','method'=>'POST', 'files'=>true)) !!}

                <div class="form-group">
                    {{ Form::label('Description', null,array('class' => 'control-label')) }}
                    {!! Form::textarea('description', null , array('class'=>'form-control', 'rows'=>5, 'cols'=>45, 'style'=>"resize: none;", 'placeholder'=>"Tell us something about the picture", 'resize'=>"none")) !!}
                </div>

                <div class="form-group" id="tag_from_group">
                    {{ Form::label('Tag', null, array('class' => 'control-label')) }} <br>
                    {!! Form::text('tag[0]', null, array('class'=>'form-control', 'list'=>"tagsList", 'style'=>"width: 90%; float: left;", 'id'=>"tag", 'placeholder'=>"Set Tag")) !!}
                    <button onclick="addTagInput()" type="button" style= "display: inline; margin-left: 10px" class="btn btn-success">+</button>
                </div>

                <div class="form-group" onchange="loadFile(event)">
                    <span class="btn btn-default btn-file">
                        Browse
                    {!! Form::file('image') !!}
                    </span>
                    <p> {!!$errors->first('image')!!}</p>
                    @if(Session::has('error'))
                        <p class="errors">{!! Session::get('error') !!}</p>
                    @endif
                </div>

                <div class="form-group">
                {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
                </div>
                {!! Form::close() !!}

            </div>

            <div class="col-md-7">

                <div class="img-thumbnail" id="div" style="height: 500px;">
                    <img width="100%" height="100%" id="output"/>
                </div>

            </div>

        </div>

    </div>

    <datalist id="tagsList">
        <?php
        foreach($tags as $tag){
            echo "<option value=".$tag->name." />";
        }
        ?>
    </datalist>
    <script src="<?php echo URL::to('/'); ?>/js/upload_form.js"></script>
@endsection