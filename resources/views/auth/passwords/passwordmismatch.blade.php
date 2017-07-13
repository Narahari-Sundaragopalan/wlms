@extends('layouts.userlayout')

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Password mismatch!!</div>
                        <div class="panel-body">
                            <a href="{{ url('/changepassword') }}" style="font-size: 15px" >Click here to Try Again</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection