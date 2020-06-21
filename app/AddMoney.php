<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddMoney extends Model
{
    protected $fillable=['depositor','amount','account_type','date'];
}
