<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'content',
        'author',
        'google_sheet',
        'media_id',
        'code',
        'published',
        'accepted',
        'publish_at',
        'accepted_at',
        'happened_at',
    ];

    protected $appends = [
        'number_participants',
        'media',
    ];

    public function publish(): void
    {
        $this->publish_at = now();

        $this->published = true;

        $this->save();
    }

    public function accept(): void
    {
        $this->accepted = true;

        $this->accepted_at = now();

        if (!$this->publish_at || Carbon::parse($this->publish_at)->isPast()) {
            $this->publish();
        }

        $this->save();
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('published', true);
    }

    public function scopeAccepted(Builder $query): void
    {
        $query->where('accepted', true);
    }

    public function scopeHappened(Builder $query): void
    {
        $query->where('happened_at', '>=', today('Asia/Jakarta'));
    }

    public function scopeShouldPublish(Builder $query): void
    {
        $query
            ->accepted()
            ->where('published', false)
            ->where('publish_at', '<=', now());
    }

    protected function numberParticipants(): Attribute
    {
        return Attribute::get(function () {
            return RegisterEvent::query()->where('event_id', $this->id)->count();
        });
    }

    protected function media(): Attribute
    {
        return Attribute::get(function () {
            $mediaUrl = '';
            if ($this->media_id) {
                $mediaUrl = Media::query()->where('id', $this->media_id)->first()->url;
            }
            return $mediaUrl;
        })->shouldCache();
    }

    public function manageUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'manage_events');
    }
}
