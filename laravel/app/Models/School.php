<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'tbl_schools';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function department(){
        return $this->hasMany('App\Models\Department');
    }
}
