<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayablePayment extends Model
{
    protected $fillable=['date','amount','reason','name','payable_id'];
}
