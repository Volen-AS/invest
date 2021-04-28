<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property integer $category_id
 * @property string $code
 * @property string $name
 * @property string $post
 * @property string $news_pic
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
// * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newModelQuery()
// * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newQuery()
// * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post query()
 */

class Post extends Model
{
	public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
