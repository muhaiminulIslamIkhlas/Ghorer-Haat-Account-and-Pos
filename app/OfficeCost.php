<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeCost extends Model
{
    protected $fillable=['reason','amount','date','cash_type'];
}
