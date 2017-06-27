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
                                <a href="{{url('/addemployee/create')}}" class="btn btn-success">Add Employee</a>
                                <hr>
                                 </div>
                                 

                                 <form action="/search" method="POST" role="search">
                                  {{ csrf_field() }}
                                   <div class="input-group">
                                    <input type="text" class="form-control" name="q"
                                     placeholder="Search users"> <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                   </span>
                                      </div>
                                     </form>


                            <h2 style="text-align: center">Employees</h2>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">


                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                        <tr class="bg-info">
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Position</th>
                            <th>Experience</th>
                            <th>Language</th>
                            <th colspan="3", style="text-align: center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->empid }}</td>
                                <td>{{ wordwrap($employee->empname,10,"\n",false) }}</td>
                                <td>{{ $employee->positiontype }}</td>
                                <td>{{ $employee->experience }}</td>
                                <td>{{ $employee->language }}</td>

                                <td><a href="{{url('addemployee',$employee->id)}}" class="btn btn-primary">Show</a></td>
                                <td><a href="{{route('addemployee.edit',$employee->id)}}" class="btn btn-warning">Update</a></td>
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
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['addemployee.destroy', $employee->id],'onsubmit' => 'return ConfirmDelete()']) !!}
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