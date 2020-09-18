<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function jobs(){
        //a company has many jobs
        return $this->hasMany('App\Jobs');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
