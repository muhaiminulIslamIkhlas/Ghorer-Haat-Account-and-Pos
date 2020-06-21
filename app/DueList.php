<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DueList extends Model
{
    protected $fillable=['table_id','sales_type','name','amount','date'];
}
