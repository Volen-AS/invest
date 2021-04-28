<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->code = 'corporate_news';
        $category->name = 'Новини компанії';
        $category->save();

        $category = new Category();
        $category->code = 'ukrainian_news';
        $category->name = 'Огляд новин в Україні';
        $category->save();

        $category = new Category();
        $category->code = 'world_news';
        $category->name = 'Огляд новин у світі';
        $category->save();

        $category = new Category();
        $category->code = 'top_brand';
        $category->name = 'Лідери світового ринку';
        $category->save();

        $category = new Category();
        $category->code = 'technology';
        $category->name = 'Нові технології, спецприбори, робототехніка';
        $category->save();

        $category = new Category();
        $category->code = 'education';
        $category->name = 'Нові стандарти освіти';
        $category->save();


        $category = new Category();
        $category->code = 'energy';
        $category->name = 'Системи видобутку та збереження альтернативної енергії';
        $category->save();

        $category = new Category();
        $category->code = 'service';
        $category->name = 'Технічне та сервісне обслуговування';
        $category->save();

        $category = new Category();
        $category->code = 'marketing';
        $category->name = 'Маркетинг. Огляд методів та технік';
        $category->save();

        $category = new Category();
        $category->code = 'business';
        $category->name = 'Комерція, валютний та фондовий ринок. Огляд методів і технік';
        $category->save();

    }
}
