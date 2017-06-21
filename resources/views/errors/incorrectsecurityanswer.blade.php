@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">You have entered wrong answer. Please try again</div>
                        <div class="panel-body">
                            <a href="{{ url('/password/reset') }}" style="font-size: 15px" >Click here Try Again</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
