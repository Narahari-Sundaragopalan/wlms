<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
     protected $fillable=[
     'supid',
     'supfname',
     'suplname',
     'position'
    ];

    //Function to return Employee names with First name and Initial of Last Name
    public function getSupervisorNameFormat() {
        return $this->supfname . " " . $this->suplname[0];
    }
}
