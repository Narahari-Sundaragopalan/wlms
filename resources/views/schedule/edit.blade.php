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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <a href="{{ url('/schedule/createSchedule') }}"class="btn btn-info"><i class="fa fa-btn fa-backward"></i> Back </a>
                        </div>
                        <div style="text-align: center"><h3>{{ $heading }}</h3></div>
                        <div>
                            <span id="first" style="font-weight: bold; text-align: left;">{{"Coolers Shipped - " . number_format($coolersShipped) }}</span>
                            <span id="second" style="font-weight: bold; float: right;">{{"Total Temps Needed : " . $Temps }}</span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-6">
                            {!! Form::model($id ,['method' => 'PATCH','route'=>['schedule.update', $id]]) !!}
                            <h3 style="text-align: center">Conveyor Lines</h3>
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
                                                    <option><?php echo 'NA' ?></option>
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
                                                    <option><?php echo 'NA' ?></option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <h3 style="text-align: center">Support Lines</h3>
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
                                                    <option><?php echo 'NA' ?></option>
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
                                                    <option><?php echo 'NA' ?></option>
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
                                                    <option><?php echo 'NA' ?></option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <h3 style="text-align: center">Mezzanines</h3>
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
                                                    <option><?php echo 'NA' ?></option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <h3 style="text-align: center">Runners</h3>
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
                                                    <option><?php echo 'NA' ?></option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <h3 style="text-align: center">Others</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable">
                                    <thead> <!-- Table Headings -->
                                    <th>Position</th>
                                    <th colspan="2">Assigned</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>QC</td>
                                        <td>
                                            <select class="form-control" name="qc[]" id="employees[]" multiple>
                                                @if(sizeof($qcArray))
                                                    @foreach($qcArray as $index => $qcCurrent)
                                                        <option value="<?php echo $qcCurrent; ?>" selected>
                                                            <?php echo $qcCurrent; ?>
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <?php echo ""; ?>
                                                @endif
                                                <optgroup label="QC">
                                                    @foreach($empQCs as $empQC)
                                                        <option value="<?php echo ($empQC); ?>">
                                                            <?php echo ($empQC); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Non-QC">
                                                    @foreach($empNonQCs as $empNonQC)
                                                        <option value="<?php echo ($empNonQC); ?>">
                                                            <?php echo ($empNonQC); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>KPMG</td>
                                        <td>
                                            <select class="form-control" name="kpmg[]" id="employees[]" multiple>
                                                @if(sizeof($kpmgArray))
                                                    @foreach($kpmgArray as $index => $kpmgCurrent)
                                                        <option value="<?php echo $kpmgCurrent;?>" selected>
                                                            <?php echo $kpmgCurrent;?>
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <?php echo ""; ?>
                                                @endif
                                                <optgroup label="KPMG">
                                                    @foreach($empKPMGs as $empKPMG)
                                                        <option value="<?php echo ($empKPMG); ?>">
                                                            <?php echo ($empKPMG); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Non-KPMG">
                                                    @foreach($empNonKPMGs as $empNonKPMG)
                                                        <option value="<?php echo ($empNonKPMG); ?>">
                                                            <?php echo ($empNonKPMG); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Clean</td>
                                        <td>
                                            <select class="form-control" name="cleaner[]" id="employees[]" multiple>
                                                @if(sizeof($cleanerArray))
                                                    @foreach($cleanerArray as $index => $cleanerCurrent)
                                                        <option value="<?php echo $cleanerCurrent;?>" selected>
                                                            <?php echo $cleanerCurrent;?>
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <?php echo ""; ?>
                                                @endif
                                                <optgroup label="Cleaners">
                                                    @foreach($empCleaners as $empCleaner)
                                                        <option value="<?php echo ($empCleaner); ?>">
                                                            <?php echo ($empCleaner); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Non-Cleaners">
                                                    @foreach($empNonCleaners as $empNonCleaner)
                                                        <option value="<?php echo ($empNonCleaner); ?>">
                                                            <?php echo ($empNonCleaner); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
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
                var cleaner = $("select[name='cleaner[]']");
                var qc = $("select[name='qc[]']");
                var kpmg = $("select[name='kpmg[]']");

                var employees = $("select[id='employees[]']");

                var oldSelectedItem = '';
                    employees.on('select2:selecting', function (evt) {
                        oldSelectedItem = $(this).val();
                 });

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
                    if (selectedDropDown !== 'cleaner[]') {
                        cleaner.find('option').prop("disabled", false);
                    }
                    if (selectedDropDown !== 'qc[]') {
                        qc.find('option').prop("disabled", false);
                    }
                    if (selectedDropDown !== 'kpmg[]') {
                        kpmg.find('option').prop("disabled", false);
                    }


                    var selectedItem = $(this).val();
                    if (selectedItem) {

                        if (selectedDropDown !== 'labeler_conveyor[]') {
                            labeler_conveyor.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                            labeler_conveyor.find('option[value="' + oldSelectedItem + '"]').prop("disabled", false);

                        }
                        window.setTimeout(0);
                        if (selectedDropDown !== 'icer_conveyor[]') {
                            icer_conveyor.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                            icer_conveyor.find('option[value="' + oldSelectedItem + '"]').prop("disabled", false);
                        }
                        if (selectedDropDown !== 'labeler_support[]') {
                            labeler_support.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                            labeler_support.find('option[value="' + oldSelectedItem + '"]').prop("disabled", false);
                        }
                        if (selectedDropDown !== 'stocker_support[]') {
                            stocker_support.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                            stocker_support.find('option[value="' + oldSelectedItem + '"]').prop("disabled", false);
                        }
                        if (selectedDropDown !== 'icer_support[]') {
                            icer_support.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                            icer_support.find('option[value="' + oldSelectedItem + '"]').prop("disabled", false);
                        }
                        if (selectedDropDown !== 'mezzanine[]') {
                            mezzanine.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                            mezzanine.find('option[value="' + oldSelectedItem + '"]').prop("disabled", false);
                        }
                        if (selectedDropDown !== 'runner[]') {
                            runner.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                            runner.find('option[value="' + oldSelectedItem + '"]').prop("disabled", false);
                        }
                        if (selectedDropDown !== 'cleaner[]') {
                            cleaner.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                            cleaner.find('option[value="' + oldSelectedItem + '"]').prop("disabled", false);
                        }
                        if (selectedDropDown !== 'qc[]') {
                            qc.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                            qc.find('option[value="' + oldSelectedItem + '"]').prop("disabled", false);
                        }
                        if (selectedDropDown !== 'kpmg[]') {
                            kpmg.find('option[value="' + selectedItem + '"]').prop("disabled", true);
                            kpmg.find('option[value="' + oldSelectedItem + '"]').prop("disabled", false);
                        }

                    }

                    for(var i = 0; i<labeler_conveyor.length; i++) {

                        icer_conveyor.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);

                    }

                    for(i = 0; i<labeler_support.length; i++) {

                        //Disable values for Labeler Support Line
                        icer_conveyor.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);

                    }

                    for(i = 0; i<icer_conveyor.length; i++) {

                        //Disable values for Labeler Support Line
                        labeler_support.find('option[value="' + icer_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + icer_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + icer_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + icer_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + icer_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + icer_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + icer_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + icer_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + icer_conveyor.eq(i).val() + '"]').prop("disabled", true);

                    }

                    for(i = 0; i<icer_support.length; i++) {

                        //Disable values for Labeler Support Line
                        labeler_support.find('option[value="' + icer_support.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + icer_support.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + icer_support.eq(i).val() + '"]').prop("disabled", true);
                        icer_conveyor.find('option[value="' + icer_support.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + icer_support.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + icer_support.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + icer_support.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + icer_support.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + icer_support.eq(i).val() + '"]').prop("disabled", true);

                    }

                    for(i = 0; i<stocker_support.length; i++) {
                        icer_conveyor.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                    }

                    for(i = 0; i<mezzanine.length; i++) {
                        icer_conveyor.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                    }

                    for(i = 0; i<runner.length; i++) {
                        icer_conveyor.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                    }

                    for(i = 0; i<cleaner.length; i++) {
                        icer_conveyor.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                    }

                    for(i = 0; i<qc.length; i++) {
                        icer_conveyor.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                    }

                    for(i = 0; i<kpmg.length; i++) {
                        icer_conveyor.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                    }

                });


                $(document).ready(function($) {

                    for(var i = 0; i<labeler_conveyor.length; i++) {

                        icer_conveyor.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').prop("disabled", true);

                    }

                    for(i = 0; i<labeler_support.length; i++) {

                        //Disable values for Labeler Support Line
                        icer_conveyor.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + labeler_support.eq(i).val() + '"]').prop("disabled", true);

                    }


                    for(i = 0; i<stocker_support.length; i++) {
                        icer_conveyor.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + stocker_support.eq(i).val() + '"]').prop("disabled", true);
                    }

                    for(i = 0; i<mezzanine.length; i++) {
                        icer_conveyor.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + mezzanine.eq(i).val() + '"]').prop("disabled", true);
                    }

                    for(i = 0; i<runner.length; i++) {
                        icer_conveyor.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + runner.eq(i).val() + '"]').prop("disabled", true);
                    }

                    for(i = 0; i<cleaner.length; i++) {
                        icer_conveyor.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + cleaner.eq(i).val() + '"]').prop("disabled", true);
                    }

                    for(i = 0; i<qc.length; i++) {
                        icer_conveyor.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                        kpmg.find('option[value="' + qc.eq(i).val() + '"]').prop("disabled", true);
                    }

                    for(i = 0; i<kpmg.length; i++) {
                        icer_conveyor.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        labeler_conveyor.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        labeler_support.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        icer_support.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        stocker_support.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        mezzanine.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        runner.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        cleaner.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                        qc.find('option[value="' + kpmg.eq(i).val() + '"]').prop("disabled", true);
                    }

                });

            </script>

        @endsection

        @section('footer')

            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
            <script>
                $(document).ready(function($) {
                    $("select[name='conveyor_lines[]']").select2({width: 60});
                    $("select[name='support_lines[]']").select2({width: 60});
                    $("select[name='labeler_conveyor[]']").select2({width: 230});
                    $("select[name='icer_conveyor[]']").select2({width: 230});
                    $("select[name='labeler_support[]']").select2({width: 160});
                    $("select[name='stocker_support[]']").select2({width: 160});
                    $("select[name='icer_support[]']").select2({width: 160});
                    $("select[name='mezzanine[]']").select2({width:200});
                    $("select[name='runner[]']").select2({width: 200});
                    $("select[name='qc[]']").select2({width: 200});
                    $("select[name='cleaner[]']").select2({width: 200});
                    $("select[name='kpmg[]']").select2({width: 200});

                });

            </script>

@endsection
