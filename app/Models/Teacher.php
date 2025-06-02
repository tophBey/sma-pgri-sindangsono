<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory, HasUuids;


    protected $table = 'teachers';


    protected $keyType = 'string';


    public $incrementing = false;


    protected $guarded =[
        'id'
    ];


    public function degrees(){
        
      return  $this->belongsTo(Degree::class,'degrees_id');
    }

     public function scopeSearch($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return  $query->where('name', 'like', '%' . $search . '%');
        });
    }
}
