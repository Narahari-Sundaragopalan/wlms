@extends('layouts.userlayout')

@section('content')
    @include('includes.admin')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading"><h3 style="text-align: center; color: black">Schedule</h3></div>
                    <div class="panel-body text-center">
                   
                        <form action="{{ url('/schedule/createSchedule') }}" method="GET">{{ csrf_field() }}
                            <button  type="submit" class="btn btn-primary "><i class="fa fa-btn fa fa-plus"></i>Create Schedule</button>
                        </form>
                        </br>
                        <form action="{{ url('/schedule/requestSchedule') }}" method="GET">{{ csrf_field() }}
                            <button type="submit" class="btn btn-primary "><i class="fa fa-btn fa fa-eye"></i>View Old Schedule</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection