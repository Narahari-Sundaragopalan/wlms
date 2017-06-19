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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="pull-right">
                                <a href="{{url('/user/create')}}" class="btn btn-success">Create new User</a>
                                <hr>
                            </div>
                            <h2 style="text-align: center">Users</h2>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                <thead>
                                <tr class="bg-info">
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th colspan="3", style="text-align: center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->getRoleName() }}</td>
                                            <td>
                                            {!! Form::open(['method' => 'DELETE', 'route'=>['user.destroy', $user->id]]) !!}
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
