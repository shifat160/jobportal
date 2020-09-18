<?php

use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // $this->call(UserSeeder::class);
        factory('App\User',20)->create();
        factory('App\Company',20)->create();
        factory('App\Jobs',20)->create();
        
        $categories =[
            'Government','NGO','Banking','Software'
        ];
        foreach($categories as $category){
            Category::create(['name'=>$category]);
        }
    }
}
