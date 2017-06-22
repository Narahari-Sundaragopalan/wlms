@extends('layouts.app')

@section('content')
    <style>

        html, body {

            background-size: cover;


        }


    </style>
    <body>
    <div style="width: 100%">

        @include('includes.admin')
        <div class="container" style="float: right; width: 85%; ">

            <div class="row">
                <div class="col-md-8 col-md-offset-1">

                    <h1>Update Employee Details </h1>
    {!! Form::model($employee,['method' => 'PATCH','route'=>['addemployee.update',$employee->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('empid', 'Employee ID: ') !!}
                        {!! Form::text('empid',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('empname', 'Employee Name:') !!}
                        {!! Form::text('empname',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('positiontype', 'Position:') !!}
                        &nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="positiontype" <?php if (isset($positiontype) && $positiontype=="Full-time") echo "checked";?> value="Full-time"{{$employee->positiontype == 'Full-time' ? 'checked' : ''}}>Full-time
                        &nbsp
                        <input type="radio" name="positiontype" <?php if (isset($positiontype) && $positiontype=="Part-time") echo "checked";?> value="Part-time" {{$employee->positiontype == 'Part-time' ? 'checked' : ''}}>Part-time
                    </div>

                    <div class="form-group">
                        {!! Form::label('experience', 'Experience:') !!}
                        <input type="radio" name="experience" <?php if (isset($experience) && $experience=="Trained") echo "checked";?> value="Trained"{{$employee->experience == 'Trained' ? 'checked' : ''}}>Trained
                        &nbsp&nbsp&nbsp
                        <input type="radio" name="experience" <?php if (isset($experience) && $experience=="Untrained") echo "checked";?> value="Untrained"{{$employee->experience == 'Untrained' ? 'checked' : ''}}>Untrained
                    </div>

                    <div class="form-group">
                        {!! Form::label('language', 'Language:') !!}
                        &nbsp&nbsp&nbsp
                        <input type="radio" name="language" <?php if (isset($language) && $language=="English") echo "checked";?> value="English"{{$employee->language == 'English' ? 'checked' : ''}}>English
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="language" <?php if (isset($language) && $language=="Spanish") echo "checked";?> value="Spanish"{{$employee->language == 'Spanish' ? 'checked' : ''}}>Spanish
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="language" <?php if (isset($language) && $language=="Bilingual") echo "checked";?> value="Bilingual"{{$employee->language == 'Bilingual' ? 'checked' : ''}}>Bilingual
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="language" <?php if (isset($language) && $language=="Others") echo "checked";?> value="Others"{{$employee->language == 'Others' ? 'checked' : ''}}>Others
                    </div>

                    <div class="form-group">
                        {!! Form::label('Skills:') !!}
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="icer">
                        <input type="checkbox" name="icer" <?php if (isset($icer) && $icer=="1") echo "checked";?> value="1"{{$employee->icer == '1' ? 'checked' : ''}}>Icer
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="labeler">
                        <input type="checkbox" name="labeler" <?php if (isset($labeler) && $labeler=="1") echo "checked";?> value="1"{{$employee->labeler == '1' ? 'checked' : ''}}>Labeler
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="mezzanine">
                        <input type="checkbox" name="mezzanine" <?php if (isset($mezzanine) && $mezzanine=="1") echo "checked";?> value="1"{{$employee->labeler == '1' ? 'checked' : ''}}>Mezzanine
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="stocker">
                        <input type="checkbox" name="stocker" <?php if (isset($stocker) && $stocker=="1") echo "checked";?> value="1" {{$employee->stocker == '1' ? 'checked' : ''}}>Stocker
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="runner">
                        <input type="checkbox" name="runner" <?php if (isset($runner) && $runner=="1") echo "checked";?> value="1"{{$employee->runner == '1' ? 'checked' : ''}}>Runner
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="qc">
                        <input type="checkbox" name="qc" <?php if (isset($qc) && $qc=="1") echo "checked";?> value="1"{{$employee->qc == '1' ? 'checked' : ''}}>QC
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="cleaner">
                        <input type="checkbox" name="cleaner" <?php if (isset($cleaner) && $cleaner=="1") echo "checked";?> value="1"{{$employee->cleaner == '1' ? 'checked' : ''}}>Cleaner
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="gift_box">
                        <input type="checkbox" name="gift_box" <?php if (isset($gift_box) && $gift_box=="1") echo "checked";?> value="1"{{$employee->gift_box == '1' ? 'checked' : ''}}>Gift Box
                    </div>
                    <div class="form-group">
                        {!! Form::label('labeler_rating', 'Labeler Rating:') !!}
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="labeler_rating" <?php if (isset($labeler_rating) && $labeler_rating=="1") echo "checked";?> value="1"{{$employee->labeler_rating == '1' ? 'checked' : ''}}>1
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="labeler_rating" <?php if (isset($labeler_rating) && $labeler_rating=="2") echo "checked";?> value="2"{{$employee->labeler_rating == '2' ? 'checked' : ''}}>2
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="labeler_rating" <?php if (isset($labeler_rating) && $labeler_rating=="3") echo "checked";?> value="3"{{$employee->labeler_rating == '3' ? 'checked' : ''}}>3
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="labeler_rating" <?php if (isset($labeler_rating) && $labeler_rating=="4") echo "checked";?> value="4"{{$employee->labeler_rating == '4' ? 'checked' : ''}}>4
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="labeler_rating" <?php if (isset($labeler_rating) && $labeler_rating=="5") echo "checked";?> value="5"{{$employee->labeler_rating == '5' ? 'checked' : ''}}>5
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="labeler_rating" <?php if (isset($labeler_rating) && $labeler_rating=="NA") echo "checked";?> value="NA"{{$employee->labeler_rating == 'NA' ? 'checked' : ''}}>NA

                    </div>
                    <div class="form-group">
                        {!! Form::label('stocker_rating', 'Stocker Rating:') !!}
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="stocker_rating" <?php if (isset($stocker_rating) && $stocker_rating=="1") echo "checked";?> value="1"{{$employee->stocker_rating == '1' ? 'checked' : ''}}>1
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="stocker_rating" <?php if (isset($stocker_rating) && $stocker_rating=="2") echo "checked";?> value="2"{{$employee->stocker_rating == '2' ? 'checked' : ''}}>2
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="stocker_rating" <?php if (isset($stocker_rating) && $stocker_rating=="3") echo "checked";?> value="3"{{$employee->stocker_rating == '3' ? 'checked' : ''}}>3
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="stocker_rating" <?php if (isset($stocker_rating) && $stocker_rating=="4") echo "checked";?> value="4"{{$employee->stocker_rating == '4' ? 'checked' : ''}}>4
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="stocker_rating" <?php if (isset($stocker_rating) && $stocker_rating=="5") echo "checked";?> value="5"{{$employee->stocker_rating == '5' ? 'checked' : ''}}>5
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="stocker_rating" <?php if (isset($stocker_rating) && $stocker_rating=="NA") echo "checked";?> value="NA"{{$employee->stocker_rating == 'NA' ? 'checked' : ''}}>NA

                    </div>
                    <div class="form-group">
                        {!! Form::label('comment', 'Comments:') !!}
                        {!! Form::text('comment',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group" style="text-align: left">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary ','style'=> "width: 150px; height: 30px;"]) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@stop