<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model

{
    use SoftDeletes;
    protected $table="employees";
    protected $dates = ['deleted_at'];
    protected $fillable=[
    'empid',
    'empfname',
    'emplname',
    'positiontype',
    'experience',
    'labeler_rating',
    'stocker_rating',
    'english',
    'spanish',
    'other',
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
