<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    //
    public $timestamps = false;
    protected $table = "nama";
    protected $fillable = ['name','id_category','id_hobby'];

    public function salary()
    {
        return $this->hasOne('App\Salary');
    }

    public function work()
    {
        return $this->hasOne('App\Work');
    }
}
