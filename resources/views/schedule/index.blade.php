@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 style="text-align: center">Schedule</h3></div>
                    <div class="panel-body">
                        <form action="{{ url('/schedule/create') }}" method="GET">{{ csrf_field() }}
                            <button type="submit"   id="data-viz" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create Schedule</button>
                        </form>
                        </br>
                        <form action="{{ url('/schedule/history') }}" method="GET">{{ csrf_field() }}
                            <button type="submit" id="bed-data-viz" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>View Old Schedule</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection