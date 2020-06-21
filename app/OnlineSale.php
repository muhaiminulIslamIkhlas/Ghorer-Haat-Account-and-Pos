<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineSale extends Model
{
    protected $fillable=['order_number','amount','cash_type','due','due_source','date'];
}
