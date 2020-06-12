<?php

namespace App;

use App\InfoKite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Info extends Model
{
    use SoftDeletes;

    protected $hidden = [];
}
