<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WidthdrawMoney extends Model
{
    protected $fillable=['name','amount','account_type','date'];
}
