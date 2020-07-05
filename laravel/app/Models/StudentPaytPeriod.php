<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentPaytPeriod extends Model
{
    protected $table = 'tbl_student_payt_period';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function student_transactions(){
        return $this->belongsTo('App\Models\StudentTransactions');
    }
}
