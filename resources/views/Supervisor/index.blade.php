@extends('layouts.app')

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

                            <h2 style="text-align: center">Supervisor</h2>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">


                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                    <tr class="bg-info">
                                        <th>Supervisor ID</th>
                                        <th>Supervisor Name</th>
                                        <th>Position</th>


                                        <th colspan="3", style="text-align: center">Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($supervisor as $supervisor)
                                        <tr>
                                            <td>{{ $supervisor->supid }}</td>
                                            <td>{{ wordwrap($supervisor->supname,10,"\n",false) }}</td>
                                            <td>{{ $supervisor->position }}</td>




                                            <td><a href="{{url('Supervisor',$supervisor->id)}}" class="btn btn-primary">Show</a></td>
                                            <td><a href="{{route('Supervisor.edit',$supervisor->id)}}" class="btn btn-warning">Update</a></td>
                                            <script>

                                                function ConfirmDelete()
                                                {
                                                    var x = confirm("Are you sure you want to delete?");
                                                    if (x)
                                                        return true;
                                                    else
                                                        return false;
                                                }
                                            </script>

                                            <td>
                                                {!! Form::open(['method' => 'DELETE', 'route'=>['Supervisor.destroy', $supervisor->id],'onsubmit' => 'return ConfirmDelete()']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
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