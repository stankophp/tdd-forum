<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Thread
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Reply[] $replies
 * @property-read \App\User $creator
 */
class Thread extends Model
{
    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    /**
     * @return BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function path()
    {
        return route('threads.show', $this->id);
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }
}
