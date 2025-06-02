<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'news';


    protected $keyType = 'string';


    public $incrementing = false;


    protected $guarded =[
        'id'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function scopeSearch($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return  $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like' , '%' . $search .'%');
        });
    }
}
