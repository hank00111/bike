<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ccdate extends Model
{
    //
    protected $primaryKey = 'CCID';
    protected $fillable = ['CCType'];
    

    public function main() {
        return $this->hasMany('App\Main');
    }
}
