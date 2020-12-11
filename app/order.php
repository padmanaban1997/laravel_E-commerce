<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class order extends Model
{

    
 
 public function orders(){

  return $this->hasMany('App\ordersproduct','order_id');
 }

  
}
 