@extends('layouts.userlayout')

@section('content')

    <style>

        html, body {

            background-size: cover;
        }

        table {
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }


    </style>
    <body>
    <div style="width: 100%">

        @include('includes.admin')
        <div class="container" style="float: right; width: 85%; ">
            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="pull-right">
                                <a href="{{url('/Supervisor/create')}}" class="btn btn-success">Add Supervisor</a>
                                <hr>
                            </div>

                            <h3 style="text-align: center">Supervisors</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable">
                                    <thead>
                                    <tr class="bg-info">
                                        <th>Supervisor ID</th>
                                        <th>Supervisor Name</th>
                                        <th>Position</th>
                                        <th style="text-align: center">Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($supervisor as $supervisor)
                                        <tr>
                                            <td>{{ $supervisor->supid }}</td>

                                            <td class="table-text">
                                                <div>
                                                    <a href="{{ url('Supervisor/'.$supervisor->id.'/edit') }}">{{ wordwrap($supervisor->supfname.' '. $supervisor->suplname, 10, "\n", false) }}</a>
                                                    
                                                </div>
                                            </td>

                                            <td>{{ $supervisor->position }}</td>
                                            <td><a href="{{url('Supervisor',$supervisor->id)}}" class="btn btn-primary">Details</a></td>
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
    </div>
@endsection

