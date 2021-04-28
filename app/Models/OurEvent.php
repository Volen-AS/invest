<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OurEvent
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $our_event_pic
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OurEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OurEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OurEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder|OurEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OurEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OurEvent whereOurEventPic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OurEvent whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OurEvent whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OurEvent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OurEvent extends Model
{
	protected $table = 'our_events';

    protected $fillable = [
        'title', 'text', 'our_event_pic', 'created_at'
    ];
}
