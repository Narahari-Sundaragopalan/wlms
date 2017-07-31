@extends('layouts.userlayout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <img src="./images/{{ $user->avatar}}"
                     style="width: 150px; height: 150px; float:left; border-radius: 50%; margin-right: 25px;">
                <h2> {{$user->name}}</h2>
                <form enctype="multipart/form-data" action="{{url('/updatepicture')}}" method="post">
                    <label>Upload Profile Picture</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <br>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-save"></i>Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection 

