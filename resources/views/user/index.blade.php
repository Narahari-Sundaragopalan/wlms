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


<a href="{{url('/user/create')}}" class="btn btn-success">Add a user</a>
 <hr>
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                        <tr class="bg-info">
                            <th>User Name</th>
                            <th>Role</th>
                            <th>E-mail</th>
                            <th colspan="3", style="text-align: center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->email }}</td>
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
@endsection
