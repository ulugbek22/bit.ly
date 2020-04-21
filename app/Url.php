<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Url extends Model
{
    public $fillable = ['user_id', 'long', 'short'];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
