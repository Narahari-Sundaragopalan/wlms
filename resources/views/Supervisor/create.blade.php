@extends('layouts.app')

@section('content')
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



                    <h1 style="text-align: center">Add Employee</h1>

                    @include('includes.error')
                    @include('includes.flash')


                    {!! Form::open(['url' => 'Supervisor']) !!}
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
                        {!! Form::submit('Save', ['class' => 'btn btn-primary', 'style'=> "width: 150px; height: 30px;"]) !!}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ url('/Supervisor') }}"class="btn btn-primary" style="width: 150px; height: 30px;"> Back </a></ul>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@stop