@extends('layouts.app')

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
                        <div style="text-align: center"><h3>{{ 'Schedule Details' }}</h3></div>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection