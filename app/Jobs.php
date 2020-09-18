<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company(){
        //one job has only one company
        return $this->belongsTo('App\Company');
    }
}
