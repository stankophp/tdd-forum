<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Thread
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $body
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|\App\Thread newModelQuery()
 * @method static Builder|\App\Thread newQuery()
 * @method static Builder|\App\Thread query()
 * @method static Builder|\App\Thread whereBody($value)
 * @method static Builder|\App\Thread whereCreatedAt($value)
 * @method static Builder|\App\Thread whereId($value)
 * @method static Builder|\App\Thread whereTitle($value)
 * @method static Builder|\App\Thread whereUpdatedAt($value)
 * @method static Builder|\App\Thread whereUserId($value)
 * @mixin \Eloquent
 * @property-read Collection|\App\Reply[] $replies
 * @property-read \App\User $creator
 * @property-read \App\Channel $channel
 * @property int $channel_id
 * @method static Builder|\App\Thread whereChannelId($value)
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
    /**
     * @return BelongsTo
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function path()
    {
        return 'threads/' . $this->channel->slug . '/' . $this->id;
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }
}
