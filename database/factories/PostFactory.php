<?php

// database/factories/PostFactory.php

// database/factories/PostFactory.php

// database/factories/PostFactory.php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Gera um novo usuário para cada post
            'category_id' => Category::factory(), // Gera uma nova categoria para cada post
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ];
    }
}
