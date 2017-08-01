@extends('layouts.userlayout')

@section('content')
    <style>

        html, body {

            background-size: cover;
        }

        tr {
            font-size: medium;
        }

    </style>


    <div style="width: 100%">

        @include('includes.admin')
        <div class="container" style="float: right; width: 85%; ">

            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center">

                            <div class="pull-left">
                                <a href="{{ url('/addemployee/') }}"class="btn btn-info"><i class="fa fa-btn fa-backward"></i> Back </a>
                            </div>

                            @if(Auth::check() && (Auth::user()->hasRole('admin')))
                                <script>
                                function ConfirmDelete() {
    var x = confirm("Are you sure you want to delete?");

    if (x) {
        return true;
    } else {
        return false;
    }
}
</script>

                                <div class="pull-right">
                                    <form action="{{ url('addemployee/'.$employee->id) }}" method="POST" onsubmit=" ConfirmDelete();">{{ csrf_field() }}{{ method_field('DELETE') }}
                                        <button type="submit" id="delete-user-{{ $employee->id }}" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i>Delete</button>
                                    </form>
                                </div>
                            @endif

                            <h3>{{ 'Employee Details' }}</h3>
                        </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped cds-datatable">
                                        <tbody>
                                        <tr class="bg-info">
                                        <tr>
                                            <td>Employee ID</td>
                                            <td><?php echo ($employee['empid']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Employee First Name</td>
                                            <td><?php echo ($employee['empfname']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Employee Last Name</td>
                                            <td><?php echo ($employee['emplname']); ?></td>
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
                                            <td><?php if ($employee['english']) {echo 'English';};?>&nbsp&nbsp <?php if ($employee['spanish']) {echo 'Spanish';};?> &nbsp&nbsp <?php if ($employee['other']) {echo 'Other';};?></td>
                                        </tr>
                                        <tr>
                                            <td>Skills</td>
                                            <td><?php if ($employee['icer']) { echo 'Icer';}; ?> <?php if ($employee['icer']) { echo ', ';}; if ($employee['labeler']) {echo 'Labeler';}; ?> <?php if ($employee['labeler']) {echo ', ';}; if ($employee['mezzanine']) {echo 'Mezzanine';}; ?>
                                                <?php if ($employee['mezzanine']) {echo ', ';}; if ($employee['stocker']) {echo 'Stocker';}; ?> <?php if ($employee['stocker']) {echo ',';}; if ($employee['runner']) { echo 'Runner';}; ?> <?php if ($employee['runner']) { echo ', ';}; if ($employee['qc']) {echo 'QC';}; ?>
                                                <?php if ($employee['qc']) {echo ', ';}; if ($employee['cleaner']) { echo 'Cleaner';}; ?> <?php if ($employee['cleaner']) { echo ', ';}; if ($employee['gift_box']) {echo 'Gift Box';}; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Labeler Rating </td>
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
                                        <div class="col-md-6 col-md-offset-5">
                                            <a href="{{route('addemployee.edit',$employee->id)}}" class="btn btn-warning" style=" width: 100px; height: 30px;">Update</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <style>
        .table td { border: 0px !important; }
        .tooltip-inner { white-space:pre-wrap; max-width: 400px; }
    </style>

    <script>
        $(document).ready(function() {
            $('table.cds-datatable').on( 'draw.dt', function () {
                $('tr').tooltip({html: true, placement: 'auto' });
            } );
            $('tr').tooltip({html: true, placement: 'auto' });
        } );
    </script>
@endsection