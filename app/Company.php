<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];
    public function jobs(){

        //a company has many jobs
        return $this->hasMany('App\Job');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
