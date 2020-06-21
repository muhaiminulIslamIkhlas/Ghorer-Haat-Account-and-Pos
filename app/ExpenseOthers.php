<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseOthers extends Model
{
    protected $fillable=['name','amount','cash_type','date'];
}
