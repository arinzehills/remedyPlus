<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;
use Illuminate\Database\Seeds;

class DatabaseSeeder extends Seeder
{
   
    use Seedable;
    protected $seedersPath = __DIR__.'/';
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         

        $this->call([
            UsersTableSeeder::class,
            CategoryTableSeeder::class,
            ProductsTableSeeder::class,
         
                ]);

    }
}
