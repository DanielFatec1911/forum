<?php

// database/seeders/DatabaseSeeder.php

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seedando tags de exemplo
        Tag::factory()->count(10)->create();

        // Seedando posts de exemplo
        Post::factory()->count(10)->create();
    }
}
