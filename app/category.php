<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    
    protected $table= 'category';
    public $timestamps=false;
    
    public function categories()
    {

        return $this->hasMany('App\category');
    }

   
    
}
