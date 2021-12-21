<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

use Exception;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getGroups()
    {
        $array = array();

        $user = User::FindOrFail(Auth::id());

        for ($i = 0; $i < Group::count(); $i++) {
            try {
                if ($user->group[$i]) {
                    array_push($array, $user->group[$i]->name);
                }
            } catch (Exception $e) {
                return $array;
            }
        }


        return $array;
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function group()
    {
        return $this->belongsToMany(Group::class);
    }
}
