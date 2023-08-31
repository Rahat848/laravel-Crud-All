<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;

    use SoftDeletes;
    

    protected $table = "customers";
    protected $primaryKey = "customer_id";

    //mutator function
    function setNameAttribute($value){
    $this->attributes['name']=ucwords($value);
}


//accessor
function getCreatedAtAttribute($value){
    return date("d-M-Y",strtotime($value));
}
function getUpdatedAtAttribute($value){
    return date("d-M-Y",strtotime($value));
}
}

