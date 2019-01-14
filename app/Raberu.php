<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Raberu extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    
    public  function main(){
        return $this->hasMany('App\Main');
    }

}
