<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricullar extends Model
{
    use HasFactory, HasUuids;


    protected $table = 'extracurricullars';


    protected $keyType = 'string';


    public $incrementing = false;


    protected $guarded =[
        'id'
    ];

    public function scopeSearch($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return  $query->where('name', 'like', '%' . $search . '%');
        });
    }

}
