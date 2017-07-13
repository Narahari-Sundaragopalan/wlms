@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Please answer the security questions below</div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/securityques') }}">
                            {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('security_question1') ? ' has-error' : '' }}" style="text-align: center">
                        <label>
                        {!!  Form::select('security_question1', ['In what city or town were you born?' => 'In what city or town were you born?', 'What was the make and model of your first car?' => 'What was the make and model of your first car?','In what town was your first job?' => 'In what town was your first job?'], null, ['placeholder' => 'Security Questions...']) !!}
                        </label>
                    </div>
                     <div class="form-group {{ $errors->has('security_answer1') ? ' has-error' : '' }}" style="text-align: center">
                         <label>
                        {!! Form::text('security_answer1',null,['class'=>'form-control']) !!}
                        </label>
                    </div>

                        <div class="form-group {{ $errors->has('security_question2') ? ' has-error' : '' }}" style="text-align: center" >
                            <label>
                                {!!  Form::select('security_question2', ['In what town or city was your first full time job?' => 'In what town or city was your first full time job?', 'What is your favorite movie?' => 'What is your favorite movie?','What primary school did you attend?' => 'What primary school did you attend?'], null, ['placeholder' => 'Security Questions...']) !!}
                            </label>
                        </div>

                        <div class="form-group {{ $errors->has('security_answer2') ? ' has-error' : '' }}" style="text-align: Center">
                            <label>
                                {!! Form::text('security_answer2',null,['class'=>'form-control']) !!}
                            </label>
                        </div>

                       <!-- <a href="{{ url('/buttons') }}" class="btn btn-primary" class="fa fa-btn fa-save"  ><i class="fa fa-btn fa-save"></i>Save</a> -->
                            <div style="text-align: center">
                                <button type="submit" class="btn btn-primary" ><i class="fa fa-btn fa-save"></i>Save</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection