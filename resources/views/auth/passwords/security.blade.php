@extends('layouts.userlayout')

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if(empty($user))
                        <div class="panel-heading">Incorrect email ID. Please try again!!</div>
                    @else
                        <div class="panel-heading">Reset Password - Please answer the security questions below</div>
                    <div class="panel-body">`
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/passwordreset') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label"> Your email id: </label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo ($user['email']); ?>" readonly="true">
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('security_question1') ? ' has-error' : '' }}">
                                <label for="security_question1" class="col-md-4 control-label"><?php echo ($user['security_question1']); ?></label>

                                <div class="col-md-6">
                                    <input id="security_answer1" type="password" class="form-control" name="security_answer1" value="{{ old('security_answer1') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('security_question2') ? ' has-error' : '' }}">
                                <label for="security_question2" class="col-md-4 control-label"><?php echo ($user['security_question2']); ?></label>

                                <div class="col-md-6">
                                    <input id="security_answer2" type="password" class="form-control" name="security_answer2" value="{{ old('security_answer2') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" >
                                        Submit
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection