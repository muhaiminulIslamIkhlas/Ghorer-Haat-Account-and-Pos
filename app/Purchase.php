<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable=['purchaser_name','amount','date','cash_type'];
}
