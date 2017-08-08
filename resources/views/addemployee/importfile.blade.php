@extends( 'layouts.userlayout')
@section('content')

    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title" style="padding:12px 0px;font-size:25px;text-align: center; color: black">
                    <strong>Import
                        Excel File</strong></h3>
            </div>
            <div class="panel-body">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <h3>Import File :</h3>
                <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;"
                      action="{{ URL::to('importExcel') }}"
                      class="form-horizontal" method="post" enctype="multipart/form-data">

                    <input type="file" name="import_file"/>
                    {{ csrf_field() }}
                    <br/>

                    <button class="btn btn-primary" style="background-color: #2ca02c;"><i
                                class="fa fa-btn fa-file-excel-o"></i>Import
                    </button>

                </form>
            </div>
        </div>
    </div>

@endsection