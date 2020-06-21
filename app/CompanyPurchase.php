<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPurchase extends Model
{
    protected $fillable=['company_name','amount','date','cash_type'];
}
