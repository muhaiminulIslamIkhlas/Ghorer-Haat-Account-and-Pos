<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllProduct extends Model
{
    protected $fillable=['product_id','name','price','stock'];
}
