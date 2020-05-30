<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    protected $table = "teams";
    protected $dates = ['deleted_at'];

    use SoftDeletes;
    
    public function schedule()
    {
        return $this->hasOne('App\Schedule');
    }

    public function player()
    {
        return $this->hasOne('App\Player');
    }
}
