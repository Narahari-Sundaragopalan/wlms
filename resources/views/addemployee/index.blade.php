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
    <body background="images/keyboard.jpeg">
    <div style="width: 100%">

        @include('includes.admin')
        <div class="container" style="float: right; width: 85%; ">

            <div class="row">
                <div class="col-md-8 col-md-offset-1">

                    <h1>Add an employee</h1>

                    <a href="{{url('/addemployee/create')}}" class="btn btn-success">Add an employee</a>
                    <hr>
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                        <tr class="bg-info">
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Position</th>
                            <th>Experience</th>
                            <th>Language</th>
                            <th colspan="8", style="text-align: center">Skill</th>
                            <th>Rating</th>
                            <th colspan="3", style="text-align: center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->empid }}</td>
                                <td>{{ $employee->empname }}</td>
                                <td>{{ $employee->positiontype }}</td>
                                <td>{{ $employee->experience }}</td>
                                <td>{{ $employee->language }}</td>
                                <!--<td>{ $employee->skill }}</td>-->
                                <td>{{ $employee->skill1 }}</td>
                                <td>{{ $employee->skill2 }}</td>
                                <td>{{ $employee->skill3 }}</td>
                                <td>{{ $employee->skill4 }}</td>
                                <td>{{ $employee->skill5 }}</td>
                                <td>{{ $employee->skill6 }}</td>
                                <td>{{ $employee->skill7 }}</td>
                                <td>{{ $employee->skill8 }}</td>
                                <td>{{ $employee->rating }}</td>


                                <td><a href="{{url('addemployee',$employee->id)}}" class="btn btn-primary">Show</a></td>
                                <td><a href="{{route('addemployee.edit',$employee->id)}}" class="btn btn-warning">Update</a></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['addemployee.destroy', $employee->id]]) !!}
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
@endsection