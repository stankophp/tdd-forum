<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Reply
 *
 * @property int $id
 * @property int $user_id
 * @property int $thread_id
 * @property string $body
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|\App\Reply newModelQuery()
 * @method static Builder|\App\Reply newQuery()
 * @method static Builder|\App\Reply query()
 * @method static Builder|\App\Reply whereBody($value)
 * @method static Builder|\App\Reply whereCreatedAt($value)
 * @method static Builder|\App\Reply whereId($value)
 * @method static Builder|\App\Reply whereThreadId($value)
 * @method static Builder|\App\Reply whereUpdatedAt($value)
 * @method static Builder|\App\Reply whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\User $owner
 */
class Reply extends Model
{
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
