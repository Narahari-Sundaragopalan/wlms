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
                    <h1 style="text-align: center">Employee Details </h1>

                            <div class="panel-body">
                                <div class="table-responsive">
                    <div class="container">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                            <tr class="bg-info">
                            <tr>
                                <td>Employee ID</td>
                                <td><?php echo ($employee['empid']); ?></td>
                            </tr>
                            <tr>
                                <td>Employee Name</td>
                                <td><?php echo ($employee['empname']); ?></td>
                            </tr>
                            <tr>
                                <td>Position</td>
                                <td><?php echo ($employee['positiontype']); ?></td>
                            </tr>
                            <tr>
                                <td>Experience</td>
                                <td><?php echo ($employee['experience']); ?></td>
                            </tr>
                            <tr>
                                <td>Language</td>
                                <td><?php echo ($employee['language']); ?></td>
                            </tr>
                            <tr>
                                <td>Skill</td>
                                <td><?php if ($employee['icer']) { echo 'Icer';}; ?>&nbsp&nbsp <?php if ($employee['labeler']) {echo 'Labeler';}; ?> &nbsp &nbsp<?php if ($employee['mezzanine']) {echo 'Mezzanine';}; ?>
                                    &nbsp&nbsp <?php if ($employee['stocker']) {echo 'Stocker';}; ?>&nbsp&nbsp <?php if ($employee['runner']) { echo 'Runner';}; ?>&nbsp &nbsp <?php if ($employee['qc']) {echo 'QC';}; ?>
                                    <?php if ($employee['cleaner']) { echo 'Cleaner';}; ?>&nbsp &nbsp<?php if ($employee['gift_box']) {echo 'Gift Box';}; ?></td>
                            </tr>

                            <tr>
                                <td>Rating- Labeler</td>
                                <td><?php echo ($employee['labeler_rating']); ?></td>
                            </tr>
                            <tr>
                                <td>Stocker Rating</td>
                                <td><?php echo ($employee['stocker_rating']); ?></td>
                            </tr>
                            <tr>
                                <td>Comments</td>
                                <td><?php echo ($employee['comment']); ?></td>
                            </tr>

                            </tbody>
                        </table>
                        
                        <div>
                       <tr>
                        <td> <a href="{{url('/addemployee')}}" class="btn btn-primary" style=" width: 100px; height: 30px;">Back</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{route('addemployee.edit',$employee->id)}}" class="btn btn-warning" style=" width: 100px; height: 30px;">Update</a>
                        
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

                        {!! Form::open(['method' => 'DELETE', 'route'=>['addemployee.destroy', $employee->id],'onsubmit' => 'return ConfirmDelete()']) !!}
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