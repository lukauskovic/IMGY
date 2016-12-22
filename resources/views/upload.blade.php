@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-5">

                {{ Form::open(array('url'=>'form-submit','files'=>true)) }}

                {{ Form::label('file','File',array('id'=>'','class'=>'')) }}
                {{ Form::file('file','',array('id'=>'','class'=>'')) }}
                <br/>
                <!-- submit buttons -->
                {{ Form::submit('Save') }}

            <!-- reset buttons -->
                {{ Form::reset('Reset') }}

                {{ Form::close() }}


            </div>
        </div>
    </div>
@endsection