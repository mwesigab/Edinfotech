<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentTransactions extends Model
{
    protected $table = 'tbl_student_transactions';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

    public function payt_periods(){
        return $this->hasMany('App\Models\StudentPaytPeriod');
    }
}
