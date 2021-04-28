<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 *
 * @property int $id
 * @property string $info
 * @property boolean $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *  * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticker query()
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
