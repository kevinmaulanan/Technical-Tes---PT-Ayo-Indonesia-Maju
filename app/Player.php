<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    protected $table = "players";
    protected $dates = ['deleted_at'];

    use SoftDeletes;

    public function team()
    {
        return $this->belongsTo('App\Team', 'id_team');
    }

    public function position()
    {
        return $this->belongsTo('App\Position', 'id_position');
    }
}
