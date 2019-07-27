<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
    protected $table = "hobi";

    public function work()
    {
        return $this->belongsTo('App\Work');
    }

    public function employe()
    {
        return $this->belongsTo('App\Employe');
    }
}
