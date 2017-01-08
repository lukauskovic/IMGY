@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">

                <div class="about-section">
                    <div class="text-content">
                        <div class="span7 offset1">
                            @if(Session::has('success'))
                                <div class="alert-box success">
                                    <h2>{!! Session::get('success') !!}</h2>
                                </div>
                            @endif
                            <div class="secure">Upload Your Image</div>
                            {!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}
                            <div class="control-group" onchange="loadFile(event)">
                                <div class="controls">
                                    {!! Form::file('image') !!}
                                    <p class="errors">{!!$errors->first('image')!!}</p>
                                    @if(Session::has('error'))
                                        <p class="errors">{!! Session::get('error') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div id="success"> </div>
                            {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>               
                </div>
            </div>

            <div >
                      
                        <script>
                          var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                          };
                        </script> 
                        
                        <img width="50%" height="50%" id="output"/>
                        
            </div>   

        </div>
    </div>
@endsection