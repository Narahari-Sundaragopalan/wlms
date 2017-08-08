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
    <body background="images/keyboard.jpeg">
    <div style="width: 100%">
        @include('includes.admin')
        <div class="container" style="float: right; width: 85%; ">
            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="pull-right">
                                <a href="{{url('/user/create')}}" class="btn btn-success"><i
                                            class="fa fa-btn fa-file"></i>Add User</a>
                                <hr>
                            </div>
                            <h3 style="text-align: center; color: black">Users</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover cds-datatable">
                                    <thead>
                                    <tr class="bg-info">
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th style="text-align: center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ wordwrap($user->name,10,"\n",false) }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->getRoleName() }}</td>
                                            <td>
                                                <form action="{{ url('user/'.$user->id) }}" method="POST"
                                                      onsubmit="return ConfirmDelete();">{{ csrf_field() }}{{ method_field('DELETE') }}
                                                    @if($user->id == 1)
                                                        <button type="submit" id="delete-user-{{ $user->id }}"
                                                                class="btn btn-danger" disabled><i
                                                                    class="fa fa-btn fa-trash"></i>Delete
                                                        </button>
                                                    @else
                                                        <button type="submit" id="delete-user-{{ $user->id }}"
                                                                class="btn btn-danger"><i
                                                                    class="fa fa-btn fa-trash"></i>Delete
                                                        </button>
                                                    @endif
                                                </form>
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
    </div>
    </body>

@endsection
@section('footer')
    <style>
        .table td {
            border: 0px !important;
        }

        .tooltip-inner {
            white-space: pre-wrap;
            max-width: 400px;
        }
    </style>

    <script>
        $(document).ready(function () {
            $('table.cds-datatable').on('draw.dt', function () {
                $('tr').tooltip({html: true, placement: 'auto'});
            });
            $('tr').tooltip({html: true, placement: 'auto'});
        });
    </script>
@endsection
