<?php

namespace app\Models\Dashboard\User;

use Illuminate\Database\Eloquent\Model;

class UserDisability extends Model
{
    protected $fillable = ['user_id', 'disability'];
}
