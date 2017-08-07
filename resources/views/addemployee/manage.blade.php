@extends('layouts.userlayout')

@section('content')


    <style>

        html, body {

            background-size: cover;
        }

        input[type="radio"] {
            margin: 0 5px 0 5px;
        }

        input[type='checkbox'] {
            margin: 0 5px 0 5px;
        }


    </style>
    <body>
    <div style="width: 100%">

        @include('includes.admin')
        <div class="container" style="float: right; width: 85%; ">

            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center">
                            <h4> {{ 'Manage Employees' }}</h4>
                        </div>
                        <div class="panel-body">
                            {!! Form::model(['class' => 'form-horizontal', 'method' => 'POST', 'action' => ['EmployeeController@modifyStatus']]) !!}

                            <div class="form-group">
                                {!! Form::label ('select', 'Select Employees', ['class' => 'control-label']) !!}
                                {!! Form::select('manageEmpList[]', $empList, null, ['class' => 'form-control employees cds-select', 'multiple']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label ('select', 'Select Status', ['class' => 'control-label']) !!}<br>
                                {{ Form::radio('status','Active') }} Active<br>
                                {{ Form::radio('status','Inactive') }} Inactive
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::button('<i class="fa fa-btn fa-hdd-o"></i>Save', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    @section('footer')
        <script>
            $(document).ready(function($) {
                $('select').select2();
            });
        </script>
        @endsection