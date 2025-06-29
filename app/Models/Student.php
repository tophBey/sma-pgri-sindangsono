<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, HasUuids;


    protected $table = 'students';


    protected $keyType = 'string';


    public $incrementing = false;

    protected $casts = [
        'date_of_birth' => 'datetime',
    ];

    protected $guarded =[
        'id'
    ];

    public function getFormattedDateOfBirthAttribute()
    {
        return Carbon::parse($this->date_of_birth)->translatedFormat('d F Y');
    }

    public function studentParent(){
        return $this->hasOne(StudentParent::class,'student_id','id');
    }

    public function custodian(){
        return $this->hasOne(Custodian::class, 'student_id','id');
    }

    public function attactment(){
        return $this->hasOne(Attachment::class,'student_id','id');
    }

    public function previousSchool(){
        return $this->hasOne(PreviousShcool::class,'student_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
