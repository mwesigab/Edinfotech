<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'tbl_school_departments';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function school(){
        return $this->belongsTo('App\Models\School');
    }
}
