<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use stdClass;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     *
     *
     *
     */

    const GENDERS = array(
        'male' => 'male',
        'female' => 'female',
    );

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'gender',
        'surname',
        'password',
        'hashtag',
        'avatar',
        'birthday',
        'deeplinks',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'datetime',
        'deeplinks' => 'object',
    ];

    public static function create(array $array)
    {
    }

    public static function where(string $string, $get)
    {
    }

    /**
     * setDeeplinks
     *
     * @param  mixed $deeplinks
     * @return stdClass|null
     */
    public function setDeeplinks($deeplinks): ?stdClass {
        $this->deeplinks = (array) $this->deeplinks + (array) $deeplinks;
        $this->save();

        return (object) $this->deeplinks;
    }

    /**
     * posts
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
