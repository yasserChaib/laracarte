<?php

namespace App\Model;

use App\Model\Traits\DateScopable;
use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    use DateScopable;

    protected $fillable =['name','email','message'];
}
