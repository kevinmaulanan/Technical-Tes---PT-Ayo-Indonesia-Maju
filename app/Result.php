<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    protected $table = "results";
    protected $dates = ['deleted_at'];

    use SoftDeletes;

    public function schedule()
    {
        return $this->belongsTo('App\Schedule','id_schedule');
    }

    public function player()
    {
        return $this->belongsToMany('App\Player', 'results_players', 'id_result', 'id_player');
    }

    public function date()
    {
        return $this->belongsToMany();
    }
}
