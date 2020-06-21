<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountPayable extends Model
{
    protected $fillable=['date','amount','reason','payable_type'];
}
