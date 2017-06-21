@extends('layouts.app')

@section('content')
    <style>

        html, body {

            background-size: cover;


        }


    </style>
    <body >
    <div style="width: 100%">

        @include('includes.admin')
        <div class="container" style="float: right; width: 85%; ">

            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 style="text-align: center">Supervisor Details </h1>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div class="container">
                                        <table class="table table-striped table-bordered table-hover" style="height: 100px;width: 600px;">
                                            <tbody>
                                            <tr class="bg-info">
                                            <tr>
                                                <td>Supervisor ID</td>
                                                <td><?php echo ($supervisor['supid']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Supervisor Name</td>
                                                <td><?php echo ($supervisor['supname']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Position</td>
                                                <td><?php echo ($supervisor['position']); ?></td>
                                            </tr>


                                            </tbody>
                                        </table>

                                        <div>
                                            <tr>
                                                <td> <a href="{{url('/Supervisor')}}" class="btn btn-primary" style=" width: 100px; height: 30px;">Close</a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="{{route('Supervisor.edit',$supervisor->id)}}" class="btn btn-warning" style=" width: 100px; height: 30px;">Update</a>

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

                                                    {!! Form::open(['method' => 'DELETE', 'route'=>['Supervisor.destroy', $supervisor->id],'onsubmit' => 'return ConfirmDelete()']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}</td>
                                            </tr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop