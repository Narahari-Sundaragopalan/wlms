@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Profile</div>
                    <div>
                        <a class="submit" href ="{{ url('/changepassword') }}">
                            <div style="text-align: center"><img src="{{URL::asset('/images/icon.png')}}" width="90" height="90" />Change Password </div>
                            <!-- <img src="public/images/Changepassword.png" width="90" height="50" alt="submit" />-->
                        </a>
                        &nbsp;&nbsp;
                        <a class="submit" href ="{{ url('/securityques') }}">
                            <div style="text-align: center"><img src="{{URL::asset('/images/Security.png')}}" width="90" height="90" /> Security Questions </div>
                            <!-- <img src="public/images/Changepassword.png" width="90" height="50" alt="submit" />-->
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection