@extends('layouts.userlayout')

@section('content')
    <style>
        th {
            background: forestgreen;
            color: white;
            text-align: center;

        }
        tr {
            font-size: medium;
            text-align: center;

        }
    </style>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/downloadReport/xls', $id) }}" method="GET">{{ csrf_field() }}
                                <button type="submit" class="btn btn-success" style="background-color: #2ca02c;">Download Schedule</button>
                            </form>
                        </div>
                        <div class="pull-left">
                            <a href="{{ url('/schedule/createSchedule') }}"class="btn btn-info"><i class="fa fa-btn fa-backward"></i> Back </a>
                        </div>
                        <div style="text-align: center;"><h4>{{ $heading }}</h4></div>
                    </div>
                   <div class="panel-body">
                     <div class="col-xs-6">
                        <h3 style="text-align: center">Conveyor Lines</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <th>Line Number</th>
                                <th>Labeler</th>
                                <th>Icer</th>
                                </thead>
                                <tbody>
                                @foreach($schedule_array as $i => $value)
                                <tr class="bg-info">
                                <tr>
                                    <td><?php echo ($schedule_array[$i]['line_number']); ?></td>
                                    <td><?php echo ($schedule_array[$i]['labeler']); ?></td>
                                    <td><?php echo ($schedule_array[$i]['icer']); ?></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                         <div class="col-xs-6">
                      <h3 style="text-align: center">Support Lines</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <th>Line Number</th>
                                <th>Labeler</th>
                                <th>Stocker</th>
                                <th>Icer</th>
                                </thead>
                                <tbody>
                                @foreach($schedule_array_2 as $j => $value)
                                    <tr class="bg-info">
                                    <tr>
                                        <td><?php echo ($schedule_array_2[$j]['line_number']); ?></td>
                                        <td><?php echo ($schedule_array_2[$j]['labeler']); ?></td>
                                        <td><?php echo ($schedule_array_2[$j]['stocker']); ?></td>
                                        <td><?php echo ($schedule_array_2[$j]['icer']); ?></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                         
                         <div class="col-xs-3">
                        <h3 style="text-align: center">Mezzanine</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> 
                                <th>Lines</th>
                                <th>Assigned</th>
                                </thead>
                                <tbody>
                                @foreach($mezzanineArray as $i => $value)
                                    <tr class="bg-info">
                                    <tr>
                                        <td><?php echo ($mezzanineArray[$i]['lines']); ?></td>
                                        <td><?php echo ($mezzanineArray[$i]['name']); ?></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>

                        <div class="col-xs-3">
                        <h3 style="text-align: center">Runners</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <th>Lines</th>
                                <th>Assigned</th>
                                </thead>
                                <tbody>
                                @foreach($runnerArray as $i => $value)
                                    <tr class="bg-info">
                                    <tr>
                                        <td><?php echo ($runnerArray[$i]['lines']); ?></td>
                                        <td><?php echo ($runnerArray[$i]['name']); ?></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <div class="col-md-6 col-md-offset-5">
                        <a href="{{url('schedule/editSchedule', $id)}}" class="btn btn-primary">Update</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection