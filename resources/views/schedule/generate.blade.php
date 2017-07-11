@extends('layouts.userlayout')

@section('content')
    <style>
        th {
            background: green;
            color: white;
            text-align: center;
        }
        tr {
            font-size: medium;
            text-align: center;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/downloadReport/xls') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" class="btn btn-success" style="background-color: #2ca02c;">Download Schedule</button>
                            </form>
                        </div>
                        <br>
                        <div style="text-align: center"><h2>{{ 'Schedule Details' }}</h2></div>
                    </div>
                    <div class="panel-body">
                        <h3 style="text-align: center">Conveyor Lines</h3>
                        <br>
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

                      <h3 style="text-align: center">Mastered Lines</h3>
                        <br>
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

                        <h3 style="text-align: center">Mezzanine Responsible</h3>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <th>Lines</th>
                                <th>Incharge</th>
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

                        <h3 style="text-align: center">Runner</h3>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <th>Lines</th>
                                <th>Incharge</th>
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
                </div>
            </div>
        </div>
    </div>
@endsection