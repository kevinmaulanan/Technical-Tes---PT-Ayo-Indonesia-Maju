<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    protected $table = "schedules";
    protected $dates = ['deleted_at'];

    use SoftDeletes;

    public function host()
    {
        return $this->belongsTo('App\Team','id_host');
    }

    public function guest()
    {
        return $this->belongsTo('App\Team','id_guest');
    }
}
