<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory, HasUuids;


    protected $table = 'degrees';


    protected $keyType = 'string';


    public $incrementing = false;



    protected $guarded =[
        'id'
    ];

    public function teachers(){
        return $this->hasMany(Teacher::class,'degrees_id');
    }

     public function scopeSearch($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return  $query->where('name', 'like', '%' . $search . '%');
        });
    }
}
