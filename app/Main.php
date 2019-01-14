<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Main extends Model
{
    //    
    protected $primaryKey = 'uid';
    protected $fillable = ['raberu_id','year','model', 'HP','cc_id',];

    public function raberu() {
        //return $this->hasOne('App\Raberu');
        return $this->belongsTo('App\Raberu');
    }


}
