<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectSell extends Model
{
    protected $fillable=['customer_name','amount','cash_type','due','due_source','date'];
}
