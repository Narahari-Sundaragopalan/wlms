@extends('layouts.userlayout')

<!-- Main Content -->
@section('content')
    @include('includes.admin')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading" style="color: firebrick; font-size: 18px">No Schedules to display. Please
                        generate a Schedule
                    </div>
                    <div class="panel-body">
                        <a href="{{ url('schedule/createSchedule') }}" style="font-size: 15px">Click here to Create a
                            Schedule</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection