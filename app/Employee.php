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
    'labeler_rating',
    'stocker_rating',
    'language',
    'icer',
    'labeler',
    'mezzanine',
    'stocker',
    'runner',
    'qc',
    'cleaner',
    'gift_box',
    'comment'
    ];
}
