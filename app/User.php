<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Url;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function urls()
    {
        return $this->hasMany(Url::class);
    }
    public function createNewUrl($url)
    {
        $this->urls->save($url);
    }
    public static function generateShortUrl()
    {
        $short = Str::random(5);
        if (Url::where('short', $short)->first()) {
            return self::generateShortUrl();
        }
        return $short;
    }
}
