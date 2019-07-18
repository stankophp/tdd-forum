<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Channel
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|\App\Channel whereCreatedAt($value)
 * @method static Builder|\App\Channel whereId($value)
 * @method static Builder|\App\Channel whereName($value)
 * @method static Builder|\App\Channel whereSlug($value)
 * @method static Builder|\App\Channel whereUpdatedAt($value)
 * @property-read Collection|\App\Thread[] $threads
 * @method static Builder|\App\Channel newModelQuery()
 * @method static Builder|\App\Channel newQuery()
 * @method static Builder|\App\Channel query()
 * @mixin \Eloquent
 */
class Channel extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}
