<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    use HasFactory, HasUuids;


    protected $table = 'student_parents';


    protected $keyType = 'string';


    public $incrementing = false;



    protected $guarded =[
        'id'
    ];
}
