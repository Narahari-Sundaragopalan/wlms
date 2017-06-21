@extends('layouts.app')

@section('content')
    <style>

        html, body {

            background-size: cover;


        }


    </style>
    <body>
    <div style="width: 100%">

        @include('includes.admin')
        <div class="container" style="float: right; width: 85%; ">

            <div class="row">
                <div class="col-md-8 col-md-offset-1">

                    <h1>Update Supervisor Details </h1>
                    {!! Form::model($supervisor,['method' => 'PATCH','route'=>['Supervisor.update',$supervisor->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('supid', 'Supervisor ID ') !!}
                        {!! Form::text('supid',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('supname', 'Supervisor Name') !!}
                        {!! Form::text('supname',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('position', 'Position') !!}
                        {!! Form::text('position',null,['class'=>'form-control']) !!}
                    </div>


                    <div class="form-group" style="text-align: left">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary ','style'=> "width: 150px; height: 30px;"]) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@stop