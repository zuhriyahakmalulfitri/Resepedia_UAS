<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        User::create([
            'photo' => 'jefri.jpg',
            'name' => 'Jefri Nichol',
            'username' => 'Jefri15',
            'email' => 'jefri@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'photo' => 'rara.jpg',
            'name' => 'Rara Kirana',
            'username' => 'Mama_Rara',
            'email' => 'rara@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'photo' => 'yulia.jpg',
            'name' => 'Yulia Putri',
            'username' => 'yull_putri',
            'email' => 'yulia@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Category::create([
            'name' => 'Olahan Ayam',
            'slug' => 'olahan-ayam'
        ]);

        Category::create([
            'name' => 'Olahan Sapi',
            'slug' => 'olahan-sapi'
        ]);

        Post::create([
            'picture' => 'sateayam.jpg',
            'category_id' => '1',
            'user_id' => '1',
            'title' => 'Sate Ayam',
            'slug' => 'sate-ayam',
            'ingredient' => 'Bahan 1',
            'step' => 'Langkah 1'
        ]);

        Post::create([
            'picture' => 'ayambakartaliwang.jpg',
            'category_id' => '1',
            'user_id' => '3',
            'title' => 'Ayam Bakar Taliwang',
            'slug' => 'ayam-bakar-taliwang',
            'ingredient' => 'Bahan 1',
            'step' => 'Langkah 1'
        ]);

        Post::create([
            'picture' => 'ayambumbubali.jpg',
            'category_id' => '1',
            'user_id' => '2',
            'title' => 'Ayam Bumbu Bali',
            'slug' => 'ayam-bumbu-bali',
            'ingredient' => 'Bahan 1',
            'step' => 'Langkah 1'
        ]);

        
    }
}
