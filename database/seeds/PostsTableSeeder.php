<?php

use Illuminate\Database\Seeder;

use Faker\Factory;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$faker = Factory::create();

    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('posts')->truncate();

		$posts = [];
		for ($i=0; $i < 100; $i++) { 
			$date = date("Y-m-d H:i:s", strtotime("2018-08-18 00:00:00 +{$i} days"));
			$posts[] = [
				'title' => $slug[$i] = $faker->sentence(rand(8,12)).'-'.$i,
				'slug' => str_slug($slug[$i]),
				'summary' => $faker->text(rand(100, 145)),
				'body' => $faker->paragraphs(rand(20,35), true),
				'counter' => rand(0,100),
				'menu_id' => rand(1,5),
				'user_id' => 1,
				'created_at' => $date,
				'updated_at' => $date,
			];
		}
		DB::table('posts')->insert($posts);

		// Category post insert
		$category_post = [];
		for ($i=0; $i < 300; $i++) {
			$category_post[] =[
				'post_id' => rand(1,100), 'category_id' => rand(1,5),
			];
		}
		DB::table('category_post')->insert($category_post);

		// Taggable insert
		$taggables = [];
		for ($i=0; $i < 300; $i++) {
			$taggables[] =[
				'tag_id' => rand(1,5), 'taggable_id' => rand(1,100), 'taggable_type' => 'App\Post',
			];
		}
		DB::table('taggables')->insert($taggables);

    }
}
