<?php

use Illuminate\Database\Seeder;

use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
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
        DB::table('comments')->truncate();

		$comments = [];

		for ($i=0; $i < 300; $i++) { 
			$date = date("Y-m-d H:i:s", strtotime("2018-08-18 00:00:00 +{$i} days"));
			$comments[] = [
				'body' => $faker->paragraphs(rand(2,5), true),
				'commentable_id' => rand(1,100),
				'commentable_type' => 'App\Post',
				'user_id' => rand(1,5),
				'created_at' => $date,
				'updated_at' => $date,
			];
		}
		DB::table('comments')->insert($comments);
    }
}
