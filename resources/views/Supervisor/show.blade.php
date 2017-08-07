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
    <body>
    <div style="width: 100%">

        @include('includes.admin')
        <div class="container" style="float: right; width: 85%; ">

            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <div class="panel panel-info">
                        <div class="panel-heading" style="text-align: center; color: black">
                            <div class="pull-left">
                                <a href="{{ url('/Supervisor/') }}"class="btn btn-info"><i class="fa fa-btn fa-backward"></i> Back </a>
                            </div>

                            @if(Auth::check() && (Auth::user()->hasRole('admin')))
                                <div class="pull-right">
                                    <form action="{{ url('Supervisor/'.$supervisor->id) }}" method="POST" onsubmit="return ConfirmDelete();">{{ csrf_field() }}{{ method_field('DELETE') }}
                                        <button type="submit" id="delete-user-{{ $supervisor->id }}" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i>Delete</button>
                                    </form>
                                </div>
                            @endif

                            <h3>Supervisor Details </h3>
                        </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                        <table class="table table-bordered table-striped cds-datatable">
                                            <tbody>
                                            <tr class="bg-info">
                                            <tr>
                                                <td>Supervisor ID</td>
                                                <td><?php echo ($supervisor['supid']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Supervisor First Name</td>
                                                <td><?php echo ($supervisor['supfname']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Supervisor Last Name</td>
                                                <td><?php echo ($supervisor['suplname']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Position</td>
                                                <td><?php echo ($supervisor['position']); ?></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <div>
                                            <div class="col-md-6 col-md-offset-5">
                                                <a href="{{route('Supervisor.edit',$supervisor->id)}}" class="btn btn-warning" style=" width: 100px; height: 30px;">Update</a>
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