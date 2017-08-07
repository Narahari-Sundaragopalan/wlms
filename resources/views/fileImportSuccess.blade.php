@extends('layouts.userlayout')

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Your file has been imported</div>
                    <div class="panel-body">
                        <a href="{{ url('/addemployee/') }}"class="btn btn-success"><i class="fa fa-btn fa-list"></i> Employees </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection