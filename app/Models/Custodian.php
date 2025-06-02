<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custodian extends Model
{
    use HasFactory, HasUuids;


    protected $table = 'custodians';


    protected $keyType = 'string';


    public $incrementing = false;



    protected $guarded =[
        'id'
    ];
}
