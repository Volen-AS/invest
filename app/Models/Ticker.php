<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Ticker
 *
 * @property int $id
 * @property string $info
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Ticker newModelQuery()
 * @method static Builder|Ticker newQuery()
 * @method static Builder|Ticker query()
 * @method static Builder|Ticker whereCreatedAt($value)
 * @method static Builder|Ticker whereId($value)
 * @method static Builder|Ticker whereInfo($value)
 * @method static Builder|Ticker whereIsActive($value)
 * @method static Builder|Ticker whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ticker extends Model
{
    public static function getTicker()
    {
        $ticker = Ticker::where('is_active', true)->first();
        if($ticker) {
            return $ticker->info;
        }
        return null;
    }
}
