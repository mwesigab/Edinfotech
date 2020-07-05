<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'tbl_students';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function student(){
        return $this->belongsTo('App\Models\School');
    }

    public function transactions(){
        return $this->hasMany('App\Models\StudentTransactions');
    }
}
