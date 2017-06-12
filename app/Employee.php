<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model

{
    protected $table="employees";
    protected $fillable=[
    'empid',
    'empname',
    'positiontype',
    'experience',
    'rating',
    'language',
    'skill1',
    'skill2',
    'skill3',
    'skill4',
    'skill5',
    'skill6',
    'skill7',
    'skill8'
    ];
}
