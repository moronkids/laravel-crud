<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    protected $table = "kategori";

    public function work()
    {
        return $this->hasMany('App\Work');
    }

    public function employe()
    {
        return $this->belongsTo('App\Employe');
    }

}
