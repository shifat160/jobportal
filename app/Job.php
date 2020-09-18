<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    protected $guarded =[];
    protected $fillable = [
        'user_id',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company(){
        //one job has only one company
        return $this->belongsTo('App\Company');
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function checkjobapply(){
        return DB::table('job_user')->where('user_id',auth()->user()->id)
        ->where('job_id',$this->id)->exists();
    }
}
