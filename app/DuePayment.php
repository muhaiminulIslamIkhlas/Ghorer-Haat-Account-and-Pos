<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DuePayment extends Model
{
    protected $fillable=['due_id','amount','cash_type','date'];
}
