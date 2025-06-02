<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousShcool extends Model
{
    use HasFactory, HasUuids;


    protected $table = 'previous_shcools';


    protected $keyType = 'string';


    public $incrementing = false;

    // protected $casts =  [
    //       'graduation_year' => 'carbon'
    // ];



    protected $guarded =[
        'id'
    ];
}
