@extends('layouts.app')

@section('content')
    <style>

        html, body {

            background-size: cover;


        }


    </style>
    <body background="{{ URL::to('/') }}/images/keyboard.jpeg">
    <div style="width: 100%">

        @include('includes.admin')
        <div class="container" style="float: right; width: 85%; ">

            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <h1>Employee Details </h1>

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
                                <td><?php echo ($employee['skill1']); ?>&nbsp&nbsp <?php echo ($employee['skill2']); ?> &nbsp &nbsp<?php echo ($employee['skill3']); ?>
                                    &nbsp&nbsp <?php echo ($employee['skill4']); ?>&nbsp&nbsp <?php echo ($employee['skill5']); ?>&nbsp &nbsp <?php echo ($employee['skill6']); ?>
                                    <?php echo ($employee['skill7']); ?>&nbsp &nbsp<?php echo ($employee['skill8']); ?></td>
                            </tr>

                            <tr>
                                <td>Rating- Labeler</td>
                                <td><?php echo ($employee['rating']); ?></td>
                            </tr>

                            </tbody>
                        </table>
                        <a href="{{url('/addemployee')}}" class="btn btn-primary" style=" width: 150px; height: 30px;">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop