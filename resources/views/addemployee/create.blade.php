@extends('layouts.app')

@section('content')
    <style>

        html, body {

            background-size: cover;


        }


    </style>
    <body background="{{ URL::to('/') }}/images/straw.jpg">

    <div style="width: 100%">

        @include('includes.admin')
        <div class="container" style="float: right; width: 85%; ">

            <div class="row" >
                <div class="col-md-8 col-md-offset-1">



                    <h1>Add an employee</h1>

                    {!! Form::open(['url' => 'addemployee']) !!}
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
                        <input type="radio" name="positiontype" <?php if (isset($positiontype) && $positiontype=="Full-time") echo "checked";?> value="Full-time">Full-time
                        &nbsp
                        <input type="radio" name="positiontype" <?php if (isset($positiontype) && $positiontype=="Part-time") echo "checked";?> value="Part-time">Part-time
                    </div>

                    <div class="form-group">
                        {!! Form::label('experience', 'Experience:') !!}
                        <input type="radio" name="experience" <?php if (isset($experience) && $experience=="Trained") echo "checked";?> value="Trained">Trained
                        &nbsp&nbsp&nbsp
                        <input type="radio" name="experience" <?php if (isset($experience) && $experience=="Untrained") echo "checked";?> value="Untrained">Untrained
                    </div>

                    <div class="form-group">
                        {!! Form::label('language', 'Language:') !!}
                        &nbsp&nbsp&nbsp
                        <input type="radio" name="language" <?php if (isset($language) && $language=="English") echo "checked";?> value="English">English
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="language" <?php if (isset($language) && $language=="Spanish") echo "checked";?> value="Spanish">Spanish
                    </div>

                    <div class="form-group">
                        {!! Form::label('skill', 'Skill:') !!}
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill1">
                        <input type="checkbox" name="skill1" <?php if (isset($skill1) && $skill1=="Icer") echo "checked";?> value="Icer">Icer
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill2">
                        <input type="checkbox" name="skill2" <?php if (isset($skill2) && $skill2=="Labeler") echo "checked";?> value="Labeler">Labeler
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill3">
                        <input type="checkbox" name="skill3" <?php if (isset($skill3) && $skill3=="Mezzanine") echo "checked";?> value="Mezzanine">Mezzanine
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill4">
                        <input type="checkbox" name="skill4" <?php if (isset($skill4) && $skill4=="Stocker") echo "checked";?> value="Stocker">Stocker
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill5">
                        <input type="checkbox" name="skill5" <?php if (isset($skill5) && $skill5=="Runner") echo "checked";?> value="Runner">Runner
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill6">
                        <input type="checkbox" name="skill6" <?php if (isset($skill6) && $skill6=="QC") echo "checked";?> value="QC">QC
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill7">
                        <input type="checkbox" name="skill7" <?php if (isset($skill7) && $skill7=="Cleaner") echo "checked";?> value="Cleaner">Cleaner
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill8">
                        <input type="checkbox" name="skill8" <?php if (isset($skill8) && $skill8=="GiftBox") echo "checked";?> value="GiftBox">Gift Box
                    </div>
                    <div class="form-group">
                        {!! Form::label('rating', 'Rating- Labeler:') !!}
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="rating" <?php if (isset($rating) && $rating=="1") echo "checked";?> value="1">1
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="rating" <?php if (isset($rating) && $rating=="2") echo "checked";?> value="2">2
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="rating" <?php if (isset($rating) && $rating=="3") echo "checked";?> value="3">3
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="rating" <?php if (isset($rating) && $rating=="4") echo "checked";?> value="4">4
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="rating" <?php if (isset($rating) && $rating=="5") echo "checked";?> value="5">5

                    </div>

                    <div class="form-group" style="text-align: left">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary', 'style'=> "width: 150px; height: 30px;"]) !!}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ url('/addemployee') }}"class="btn btn-primary" style="width: 150px; height: 30px;"> Back </a></ul>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@stop