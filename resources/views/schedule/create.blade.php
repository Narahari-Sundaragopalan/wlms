@extends('layouts.userlayout')

@section('content')

    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    </head>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center">

                    <div class="pull-left">
                        <a href="{{ url('/schedule') }}"class="btn btn-info"><i class="fa fa-btn fa-backward"></i> Back </a>
                    </div>

                    <h3> {{ 'Create Schedule' }}</h3>

                </div>

                <div class="panel-body">
                    {!! Form::open(['url' => 'schedule/generate', 'class' => 'form-horizontal']) !!}
                    @include('includes.error')
                    @include('includes.flash')

                    <div class="form-group{{ $errors->has('coolers_shipped') ? ' has-error' : '' }}">
                        <div class="col-md-4">{!! Form::label('coolers_shipped', '*Coolers Shipped:') !!}</div>
                        <div class="col-md-6">{!! Form::text('coolers_shipped',null,['class'=>'form-control']) !!}</div>
                    </div>
                    <div class="form-group{{ $errors->has('schedule_date') ? ' has-error' : '' }}">
                        <div class="col-md-4">{!! Form::label('schedule_date', '*Schedule Date:') !!}</div>
                        <div class="col-md-6">{{ Form::text('schedule_date', null, array('id' => 'datepicker1'), ['class' => 'col-md-6 form-control', 'required']) }}</div>
                    </div>
                    <div class="form-group{{ $errors->has('schedule_time') ? ' has-error' : '' }}">
                        <div class="col-md-4">{!! Form::label('schedule_time', '*Schedule Time:') !!}</div>
                        <div class="col-md-6">{!! Form::text('schedule_time',null, array('id' => 'timepicker'), ['placeholder' => 'HH:MM','class'=>'form-control', 'required']) !!}</div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">{!! Form::label('select', 'Conveyer Lines:', ['class' => 'control-label']) !!}</div>
                        <div class="col-md-6">{!! Form::select('conveyor_line',$conveyorLines, null, ['placeholder' => 'Select Conveyer Lines','class'=>'form-control']) !!}</div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">{!! Form::label('select', 'Support Lines:', ['class' => 'control-label']) !!}</div>
                        <div class="col-md-6">{!! Form::select('support_line',$supportLines, null, ['placeholder' => 'Select Support Lines','class'=>'form-control']) !!}</div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-5">
                            {!! Form::button('<i class="fa fa-btn fa-table"></i>Create', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $( "#datepicker1" ).datepicker({minDate:0});
        });

        $(document).ready(function() {
            $( "#timepicker" ).timepicker({defaultTime : '05:30AM'});
        });


    </script>
@endsection