<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    /**
     * @var array
     */
    protected $fillable = ["user_id","login_at"];
}