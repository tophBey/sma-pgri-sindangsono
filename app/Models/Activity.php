<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
     use HasFactory, HasUuids;


    protected $table = 'activities';


    protected $keyType = 'string';


    public $incrementing = false;


    protected $guarded =[
        'id'
    ];

     public function scopeSearch($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return  $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('location', 'like' , '%' . $search .'%')
                ->orWhere('description', 'like' , '%' . $search .'%');
        });
    }
}
