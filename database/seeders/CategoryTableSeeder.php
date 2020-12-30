<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        Category::insert([
                ['name'=>'Pharmaceutical','slug'=>'pharmaceutical', 'created_at'=>$now,'updated_at'=>$now],
                ['name'=>'Snacks','slug'=>'snacks', 'created_at'=>$now,'updated_at'=>$now],
        ]);
    }
}
