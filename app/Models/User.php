<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserLevelEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'gender',
        'code_student',
        'class',
        'faculty',
        'phone',
        'email',
        'level',
        'avatar',
        'gender',
        'password',
        'remember_token',
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
    ];

    protected function avatarUrl(): Attribute
    {
        return Attribute::get(function () {
            if ($this->avatar === null) {
                $name = explode(' ', $this->name);
                return 'https://ui-avatars.com/api/?background=random&name=' . urlencode(end($name));
            }

            return Storage::url($this->avatar);
        })->shouldCache();
    }

    protected function keyLevel(): Attribute
    {
        return Attribute::get(function () {
            $value = $this->level ?? 0;
            return UserLevelEnum::getKeyByValue($value);
        });
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'author');
    }

    public function getOldEvents()
    {
        return $this->events()
            ->published()
            ->accepted()
            ->where('publish_at', '<=', now()->subMonth())
            ->get();
    }

    public function manageEvents(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'manage_events');
    }

    public function notify(): hasMany
    {
        return $this->hasMany(Notify::class, 'author');
    }
}
