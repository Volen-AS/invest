<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['id','code', 'name'];

    public function news()
    {
        return $this->hasMany(Post::class);
    }

    public static function getCategoriesDropBox()
    {
        /** @param Collection|Category  */
        return Category::pluck('name', 'id')->prepend('Виберіть категорію ','')->toArray();
    }
}
