@extends('layouts.userlayout')

@section('content')

    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    </head>

    <style>

        html, body {

            background-size: cover;

        }

        input[type="radio"] {
            margin: 0 5px 0 5px;
        }

        input[type='checkbox'] {
            margin: 0 5px 0 5px;
        }

    </style>
    <body>

    <div style="width: 100%">

        @include('includes.admin')
        <div class="container" style="float: right; width: 85%; ">

            <div class="row" >
                <div class="col-md-8 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center">

                            <div class="pull-left">
                                <a href="{{ url('/Supervisor') }}"class="btn btn-info"><i class="fa fa-btn fa-backward"></i> Back </a>
                            </div>

                            <h4>Add Supervisor</h4>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['url' => 'Supervisor']) !!}

                            @include('includes.error')
                            @include('includes.flash')

                            <div class="form-group{{ $errors->has('supid') ? ' has-error' : '' }}">
                                {!! Form::label('supid', 'Supervisor ID ') !!}
                                {!! Form::text('supid',null,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group{{ $errors->has('supname') ? ' has-error' : '' }}">
                                {!! Form::label('supname', 'Supervisor Name') !!}
                                {!! Form::text('supname',null,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                {!! Form::label('position', 'Position') !!}
                                {!! Form::text('position',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group" style="text-align: left">
                                <div class="col-md-6 col-md-offset-5">
                                    {!! Form::submit('Save', ['class' => 'btn btn-primary', 'style'=> "width: 100px; height: 30px;"]) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('footer')
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
@endsection