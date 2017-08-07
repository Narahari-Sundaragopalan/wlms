@extends( 'layouts.userlayout')
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

    @include('includes.admin')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/addemployee/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-employee" class="btn btn-success"><i class="fa fa-btn fa-file"></i>Add Employee</button>
                            </form>
                        </div>
                        <div class="pull-left">
                            <form action="{{ URL::to('importfile') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="import-employee" class="btn btn-success"><i class="fa fa-btn fa-upload"></i>Import File</button>
                            </form>
                        </div>
                        <div style="text-align: center; color: black"><h3>{{ 'Employees' }}</h3></div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable" id="example" data-page-length='100'>
                                <thead> <!-- Table Headings -->
                                <tr class="bg-info">
                                    {{--<th>User</th><th>Email</th><th>Status</th><th class="no-sort">Actions</th>--}}
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Position</th>
                                    <th>Experience</th>
                                    <th style="text-align: center">Actions</th>
                                </tr>
                                </thead>

                                <tbody> <!-- Table Body -->
                                @foreach($employees as $employee)

                                    <tr>
                                        <td class="table-text"><div>{{ $employee->empid  }}</div></td>
                                        <td class="table-text">
                                            <div>
                                                <a href="{{ url('addemployee/'.$employee->id.'/edit') }}">{{ $employee->empfname.' '.$employee->emplname }}</a>
                                                
                                            </div>
                                        </td>
                                        <td class="table-text"><div>{{ $employee->positiontype }}</div></td>
                                        <td class="table-text"><div>{{ $employee->experience }}</div></td>
                                        <td><a href="{{url('addemployee',$employee->id)}}" class="btn btn-primary">Details</a></td>
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

      /*  $(document).ready(function() {
            var oTable = $('#example').dataTable( {
                'iDisplayLength':10
            } );
        });*/



    </script>
@endsection