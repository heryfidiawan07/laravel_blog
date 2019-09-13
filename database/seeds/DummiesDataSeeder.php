<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummiesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        DB::table('users')->insert([
            ['name' => 'Admin', 'email' => 'admin@mail.com', 'password' => bcrypt('admin'), 'slug' => 'admin', 'role' => 1, 'status' => 1],
            ['name' => 'rara', 'email' => 'rara@mail.com', 'password' => bcrypt('password'), 'slug' => 'rara', 'role' => 0, 'status' => 1],
            ['name' => 'Hery', 'email' => 'hery@mail.com', 'password' => bcrypt('password'), 'slug' => 'hery', 'role' => 0, 'status' => 1],
            ['name' => 'Wawan', 'email' => 'wawan@mail.com', 'password' => bcrypt('password'), 'slug' => 'wawan', 'role' => 0, 'status' => 1],
            ['name' => 'Kekey', 'email' => 'kekey@mail.com', 'password' => bcrypt('password'), 'slug' => 'kekey', 'role' => 0, 'status' => 1],
        ]);

        DB::table('menus')->insert([
            ['name' => 'Menu 1', 'slug' => 'menu-1', 'title' => 'Title menu 1', 'description' => 'desc menu 1', 'user_id' => 1, 'status' => 1],
            ['name' => 'Menu 2', 'slug' => 'menu-2', 'title' => 'Title menu 2', 'description' => 'desc menu 2', 'user_id' => 1, 'status' => 1],
            ['name' => 'Menu 3', 'slug' => 'menu-3', 'title' => 'Title menu 3', 'description' => 'desc menu 3', 'user_id' => 1, 'status' => 1],
            ['name' => 'Menu 4', 'slug' => 'menu-4', 'title' => 'Title menu 4', 'description' => 'desc menu 4', 'user_id' => 1, 'status' => 1],
            ['name' => 'Menu 5', 'slug' => 'menu-5', 'title' => 'Title menu 5', 'description' => 'desc menu 5', 'user_id' => 1, 'status' => 1],
        ]);

        DB::table('categories')->insert([
            ['name' => 'Category 1', 'slug' => 'category-1', 'title' => 'Title tag 1', 'description' => 'desc tag 1', 'user_id' => 1],
            ['name' => 'Category 2', 'slug' => 'category-2', 'title' => 'Title tag 2', 'description' => 'desc tag 2', 'user_id' => 1],
            ['name' => 'Category 3', 'slug' => 'category-3', 'title' => 'Title tag 3', 'description' => 'desc tag 3', 'user_id' => 1],
            ['name' => 'Category 4', 'slug' => 'category-4', 'title' => 'Title tag 4', 'description' => 'desc tag 4', 'user_id' => 1],
            ['name' => 'Category 5', 'slug' => 'category-5', 'title' => 'Title tag 5', 'description' => 'desc tag 5', 'user_id' => 1],
        ]);

        DB::table('tags')->insert([
            ['name' => 'Tag 1', 'slug' => 'tag-1', 'title' => 'Title tag 1', 'description' => 'Desc tag 1', 'user_id' => 1],
            ['name' => 'Tag 2', 'slug' => 'tag-2', 'title' => 'Title tag 2', 'description' => 'Desc tag 2', 'user_id' => 1],
            ['name' => 'Tag 3', 'slug' => 'tag-3', 'title' => 'Title tag 3', 'description' => 'Desc tag 3', 'user_id' => 1],
            ['name' => 'Tag 4', 'slug' => 'tag-4', 'title' => 'Title tag 4', 'description' => 'Desc tag 4', 'user_id' => 1],
            ['name' => 'Tag 5', 'slug' => 'tag-5', 'title' => 'Title tag 5', 'description' => 'Desc tag 5', 'user_id' => 1],
        ]);

        DB::table('messages')->insert([
            ['title' => 'Title messages 1', 'body' => 'Body messages 1', 'email' => 'one@mail.com'],
            ['title' => 'Title messages 2', 'body' => 'Body messages 2', 'email' => 'two@mail.com'],
            ['title' => 'Title messages 3', 'body' => 'Body messages 3', 'email' => 'three@mail.com'],
        ]);

        DB::table('share')->insert([
        	['provider_class' => 'fab fa-facebook', 'url' => 'https://www.facebook.com/sharer.php?u=`url`', 'user_id' => 1],
            ['provider_class' => 'fab fa-twitter', 'url' => 'https://twitter.com/share?url=[`url`]&text=[`title`]', 'user_id' => 1],
            ['provider_class' => 'fab fa-whatsapp', 'url' => 'whatsapp://send?text=`url`', 'user_id' => 1],
            ['provider_class' => 'fab fa-google', 'url' => 'https://plus.google.com/share?url=[`url`]', 'user_id' => 1],
            ['provider_class' => 'fas fa-envelope', 'url' => 'mailto:?subject=[`title`]&body=Check out this site:[`url`]', 'user_id' => 1],
            ['provider_class' => 'fab fa-pinterest', 'url' => 'https://pinterest.com/pin/create/bookmarklet/?media=[`img`]&url=[`url`]&description=[`title`]', 'user_id' => 1],
        ]);

        DB::table('follow')->insert([
            ['provider_class' => 'fab fa-instagram', 'url' => 'http://abc.com', 'user_id' => 1],
            ['provider_class' => 'fab fa-facebook', 'url' => 'http://abc.com', 'user_id' => 1],
            ['provider_class' => 'fab fa-twitter', 'url' => 'http://abc.com', 'user_id' => 1],
            ['provider_class' => 'fab fa-youtube', 'url' => 'http://abc.com', 'user_id' => 1],
            ['provider_class' => 'fab fa-github', 'url' => 'http://abc.com', 'user_id' => 1],
            ['provider_class' => 'fab fa-linkedin-in', 'url' => 'http://abc.com', 'user_id' => 1],
            ['provider_class' => 'fab fa-whatsapp', 'url' => 'http://abc.com', 'user_id' => 1],
            ['provider_class' => 'fas fa-phone', 'url' => 'http://abc.com', 'user_id' => 1],
            ['provider_class' => 'fas fa-globe', 'url' => 'http://abc.com', 'user_id' => 1],
        ]);

        DB::table('pages')->insert([
            	[
            	'name' => 'Privacy Policy', 
            	'title' => 'Privacy Policy', 
            	'slug' => 'privacy-policy', 
            	'user_id' => 1, 
            	'privacy_policy' => 1,
            	'body' => 
	            	"We, the Operators of this Website, provide it as a public service to our users.

					Your privacy is important to the us. Our goal is to provide you with a personalized online experience that provides you with the information, resources, and services that are most relevant and helpful to you. This Privacy Policy has been written to describe the conditions under which this web site is being made available to you. The Privacy Policy discusses, among other things, how data obtained during your visit to this web site may be collected and used. We strongly recommend that you read the Privacy Policy carefully. By using this web site, you agree to be bound by the terms of this Privacy Policy. If you do not accept the terms of the Privacy Policy, you are directed to discontinue accessing or otherwise using the web site or any materials obtained from it. If you are dissatisfied with the web site, by all means contact us; otherwise, your only recourse is to disconnect from this site and refrain from visiting the site in the future.

					If you have questions regarding this privacy policy, please contact us."
			],
		]);

    }
}
