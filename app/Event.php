<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $table = 'events';
    public $primaryKey = 'id';
    public $timestamps = true; 

    public function user(){
        return $this->belongsTo('App\User');
    }
}
