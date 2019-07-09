<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Channel
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Thread[] $threads
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Channel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Channel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Channel query()
 * @mixin \Eloquent
 */
class Channel extends Model
{
    /**
     * @return HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}
