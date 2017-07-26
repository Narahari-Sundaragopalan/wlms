@extends('layouts.userlayout')

@section('content')

    <style>
        th {
            background: forestgreen;
            color: whitesmoke;
            text-align: center;
        }
        tr {
            font-size: medium;
            text-align: center;
        }
        .bld {
            font-weight: bold;
            color: whitesmoke;
            background-color: grey;
        }

    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <a href="{{ url('/schedule/createSchedule') }}"class="btn btn-info"><i class="fa fa-btn fa-backward"></i> Back </a>
                        </div>
                        <br>
                        <div style="text-align: center"><h3>{{ $heading }}</h3></div>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($id ,['method' => 'PATCH','route'=>['schedule.update', $id]]) !!}
                        <h3 style="text-align: center">Conveyor Lines</h3>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <th>Line Number</th>
                                <th>Labeler</th>
                                <th>Icer</th>
                                </thead>
                                <tbody>
                                @if (Session::has('message'))
                                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                                @endif
                                @foreach($schedule_array as $i => $value)
                                    <tr class="bg-info">
                                    <tr>
                                        <td>
                                            <select class="form-control" name="conveyor_lines[]">

                                                <option value="" selected class="bld">
                                                    <?php echo ($schedule_array[$i]['line_number']); ?>
                                                </option>
                                                <optgroup label="Line #">
                                                    @foreach($conveyorLines as $conveyorLine)
                                                        <option>
                                                            <?php echo ($conveyorLine); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="labeler_conveyor[]" id="employees[]">

                                                    <option value="<?php echo ($schedule_array[$i]['labeler']); ?>" selected class="bld">
                                                        <?php echo ($schedule_array[$i]['labeler']); ?>
                                                    </option>
                                                <optgroup label="Labelers">
                                                    @foreach($empLabelers as $empLabeler)
                                                        <option value="<?php echo ($empLabeler) ?>">
                                                            <?php echo ($empLabeler); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Non-Labelers">
                                                    @foreach($empNonLabelers as $empNonLabeler)
                                                        <option value="<?php echo ($empNonLabeler) ?>">
                                                            <?php echo ($empNonLabeler); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <option><?php echo 'Temp' ?></option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="icer_conveyor[]" id="employees[]">
                                                <option value="<?php echo ($schedule_array[$i]['icer']); ?>" selected class="bld">
                                                    <?php echo ($schedule_array[$i]['icer']); ?>
                                                </option>
                                                <optgroup label="Icers">
                                                    @foreach($empIcers as $empIcer)
                                                        <option value="<?php echo ($empIcer) ?>">
                                                            <?php echo ($empIcer); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Non-Icers">
                                                    @foreach($empNonIcers as $empNonIcer)
                                                        <option value="<?php echo ($empNonIcer) ?>">
                                                            <?php echo ($empNonIcer); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <option><?php echo 'Temp' ?></option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <h3 style="text-align: center">Support Lines</h3>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <th>Line Number</th>
                                <th>Labeler</th>
                                <th>Stocker</th>
                                <th>Icer</th>
                                </thead>
                                <tbody>
                                @foreach($schedule_array_2 as $j => $value)
                                    <tr class="bg-info">
                                    <tr>
                                        <td>
                                            <select class="form-control" name="support_lines[]">

                                                <option value="" selected class="bld">
                                                    <?php echo ($schedule_array_2[$j]['line_number']); ?>
                                                </option>
                                                <optgroup label="Line #">
                                                    @foreach($supportLines as $supportLine)
                                                        <option>
                                                            <?php echo ($supportLine); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="labeler_support[]" id="employees[]">
                                                <option value="<?php echo ($schedule_array_2[$j]['labeler']); ?>" selected class="bld">
                                                    <?php echo ($schedule_array_2[$j]['labeler']); ?>
                                                </option>
                                                <optgroup label="Labelers">
                                                    @foreach($empLabelers as $empLabeler)
                                                        <option value="<?php echo ($empLabeler) ?>">
                                                            <?php echo ($empLabeler); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Non-Labelers">
                                                    @foreach($empNonLabelers as $empNonLabeler)
                                                        <option value="<?php echo ($empNonLabeler) ?>">
                                                            <?php echo ($empNonLabeler); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <option><?php echo 'Temp' ?></option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="stocker_support[]" id="employees[]">
                                                <option value="<?php echo ($schedule_array_2[$j]['stocker']); ?>" selected class="bld">
                                                    <?php echo ($schedule_array_2[$j]['stocker']); ?>
                                                </option>
                                                <optgroup label="Stockers">
                                                    @foreach($empStockers as $empStocker)
                                                        <option value="<?php echo ($empStocker) ?>">
                                                            <?php echo ($empStocker); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Non-Stockers">
                                                    @foreach($empNonStockers as $empNonStocker)
                                                        <option value="<?php echo ($empNonStocker) ?>">
                                                            <?php echo ($empNonStocker); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <option><?php echo 'Temp' ?></option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="icer_support[]" id="employees[]">
                                                <option value="<?php echo ($schedule_array_2[$j]['icer']); ?>" selected class="bld">
                                                    <?php echo ($schedule_array_2[$j]['icer']); ?>
                                                </option>
                                                <optgroup label="Icers">
                                                    @foreach($empIcers as $empIcer)
                                                        <option value="<?php echo ($empIcer) ?>">
                                                            <?php echo ($empIcer); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Non-Icers">
                                                    @foreach($empNonIcers as $empNonIcer)
                                                        <option value="<?php echo ($empNonIcer) ?>">
                                                            <?php echo ($empNonIcer); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <option><?php echo 'Temp' ?></option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <h3 style="text-align: center">Mezzanines</h3>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <th>Lines</th>
                                <th>Assigned</th>
                                </thead>
                                <tbody>
                                @foreach($mezzanineArray as $i => $value)
                                    <tr class="bg-info">
                                    <tr>
                                        <td><?php echo ($mezzanineArray[$i]['lines']); ?></td>
                                        <td>
                                            <select class="form-control" name="mezzanine[]" id="employees[]">
                                                <option value="<?php echo ($mezzanineArray[$i]['name']); ?>" selected class="bld">
                                                    <?php echo ($mezzanineArray[$i]['name']); ?>
                                                </option>
                                                <optgroup label="Mezzanines">
                                                    @foreach($empMezzanines as $empMezzanine)
                                                        <option value="<?php echo ($empMezzanine) ?>">
                                                            <?php echo ($empMezzanine); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Non-Mezzanines">
                                                    @foreach($empNonMezzanines as $empNonMezzanine)
                                                        <option value="<?php echo ($empNonMezzanine) ?>">
                                                            <?php echo ($empNonMezzanine); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <option><?php echo 'Temp' ?></option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <h3 style="text-align: center">Runners</h3>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <th>Lines</th>
                                <th>Assigned</th>
                                </thead>
                                <tbody>
                                @foreach($runnerArray as $i => $value)
                                    <tr class="bg-info">
                                    <tr>
                                        <td><?php echo ($runnerArray[$i]['lines']); ?></td>
                                        <td>
                                            <select class="form-control" name="runner[]" id="employees[]">
                                                <option value="<?php echo ($runnerArray[$i]['name']); ?>" selected class="bld">
                                                    <?php echo ($runnerArray[$i]['name']); ?>
                                                </option>
                                                <optgroup label="Runners">
                                                    @foreach($empRunners as $empRunner)
                                                        <option value="<?php echo ($empRunner) ?>">
                                                            <?php echo ($empRunner); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Non-Runners">
                                                    @foreach($empNonRunners as $empNonRunner)
                                                        <option value="<?php echo ($empNonRunner) ?>">
                                                            <?php echo ($empNonRunner); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <option><?php echo 'Temp' ?></option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group" style="text-align: left">
                            <div class="col-md-6 col-md-offset-5">
                                {!! Form::button('Save', ['type' => 'submit','class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        // Disable selected name in other dropdown based on user selection
        var labeler_conveyor = $("select[name='labeler_conveyor[]']");
        var icer_conveyor = $("select[name='icer_conveyor[]']");
        var labeler_support = $("select[name='labeler_support[]']");
        var stocker_support = $("select[name='stocker_support[]']");
        var icer_support = $("select[name='icer_support[]']");
        var mezzanine = $("select[name='mezzanine[]']");
        var runner = $("select[name='runner[]']");

        var employees = $("select[id='employees[]']");


        employees.change(function() {
            var selectedDropDown = $(this).attr("name");
            if (selectedDropDown !== 'labeler_conveyor[]') {
                labeler_conveyor.find('option').prop("disabled", false);
            }
            if (selectedDropDown !== 'icer_conveyor[]') {
                icer_conveyor.find('option').prop("disabled", false);
            }
            if (selectedDropDown !== 'labeler_support[]') {
                labeler_support.find('option').prop("disabled", false);
            }
            if (selectedDropDown !== 'stocker_support[]') {
                stocker_support.find('option').prop("disabled", false);
            }
            if (selectedDropDown !== 'icer_support[]') {
                icer_support.find('option').prop("disabled", false);
            }
            if (selectedDropDown !== 'mezzanine[]') {
                mezzanine.find('option').prop("disabled", false);
            }
            if (selectedDropDown !== 'runner[]') {
                runner.find('option').prop("disabled", false);
            }

            var selectedItem = $(this).val();
            if (selectedItem) {

                if (selectedDropDown !== 'labeler_conveyor[]') {
                    labeler_conveyor.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                }
                if (selectedDropDown !== 'icer_conveyor[]') {
                    icer_conveyor.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                }
                if (selectedDropDown !== 'labeler_support[]') {
                    labeler_support.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                }
                if (selectedDropDown !== 'stocker_support[]') {
                    stocker_support.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                }
                if (selectedDropDown !== 'icer_support[]') {
                    icer_support.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                }
                if (selectedDropDown !== 'mezzanine[]') {
                    mezzanine.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                }
                if (selectedDropDown !== 'runner[]') {
                    runner.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                }
            }
        });

    </script>

@endsection

@section('footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    <script>
            $(document).ready(function($) {
                $("select[name='conveyor_lines[]']").select2({width: 100});
                $("select[name='support_lines[]']").select2({width: 100});
                $("select[name='labeler_conveyor[]']").select2({width: 275});
                $("select[name='icer_conveyor[]']").select2({width: 275});
                $("select[name='labeler_support[]']").select2({width: 180});
                $("select[name='stocker_support[]']").select2({width: 180});
                $("select[name='icer_support[]']").select2({width: 180});
                $("select[name='mezzanine[]']").select2({width: 600});
                $("select[name='runner[]']").select2({width: 600});

        });

    </script>

@endsection
