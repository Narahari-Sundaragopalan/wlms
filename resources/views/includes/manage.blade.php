
<div class=".container-fluid" style="float: left;  width: 15%; border-right: 2px solid black; margin:0px; padding:0px;">
    <div style="height: 70%">
        <img class="img-responsive center-block"  src="/wlms/public/uploads/images/{{ $user->avatar}}" alt="Chania" height="150" width="150">
    </div>
    <div>
        <h4 style="text-align: center; color: black"> Manager </h4>
    </div>
    <hr style="border-top: 1px solid #151515;">

    <div style="text-align: center;">
        <li type ="button" style="list-style: none; margin-right:0px; padding:5px; ">
            <a href="{{ url('/schedule/requestSchedule') }}" class="btn btn-danger" style="width: 150px; height: 30px; text-align: center;" >View Schedule</a>

        </li>
    </div>
</div>
