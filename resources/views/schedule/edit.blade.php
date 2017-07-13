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
                        <div class="pull-left">
                            <a href="{{ url('/schedule/create') }}"class="btn btn-info"><i class="fa fa-btn fa-backward"></i> Back </a>
                        </div>
                        <br>
                        <div style="text-align: center"><h2>{{ 'Schedule Details' }}</h2></div>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($id ,['method' => 'PATCH','route'=>['schedule.update', $id]]) !!}
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
                                        <td>
                                            <select class="form-control" name="labeler_conveyor[]">
                                                <option value="" selected><?php echo ($schedule_array[$i]['labeler']); ?></option>
                                                @foreach($employees as $employee)
                                                    <option><?php echo ($employee); ?></option>
                                                @endforeach
                                            </select>
                                        </td>
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
                                @if (Session::has('message'))
                                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                                @endif
                                @foreach($schedule_array_2 as $j => $value)
                                    <tr class="bg-info">
                                    <tr>
                                        <td><?php echo ($schedule_array_2[$j]['line_number']); ?></td>
                                        <td>
                                            <select class="form-control" name="labeler_master[]">
                                                <option value="" selected><?php echo ($schedule_array_2[$j]['labeler']); ?></option>
                                                @foreach($employees as $employee)
                                                    <option><?php echo ($employee); ?></option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="stocker_master[]">
                                                <option value="" selected data-default><?php echo ($schedule_array_2[$j]['stocker']); ?></option>
                                                @foreach($employees as $employee)
                                                    <option><?php echo ($employee); ?></option>
                                                @endforeach
                                            </select>
                                        </td>
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
                                        <td>
                                            <select class="form-control" name="mezzanine[]">
                                                <option value="" selected data-default><?php echo ($mezzanineArray[$i]['name']); ?></option>
                                                @foreach($employees as $employee)
                                                    <option><?php echo ($employee); ?></option>
                                                @endforeach
                                            </select>
                                        </td>
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
                                        <td>
                                            <select class="form-control" name="runner[]">
                                                <option value="" selected data-default><?php echo ($runnerArray[$i]['name']); ?></option>
                                                @foreach($employees as $employee)
                                                    <option><?php echo ($employee); ?></option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group" style="text-align: left">
                            <div class="col-md-6 col-md-offset-5">
                                {!! Form::button('Save', ['type' => 'submit','class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
