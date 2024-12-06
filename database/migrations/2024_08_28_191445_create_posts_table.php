<?php

// database/migrations/xxxx_xx_xx_create_posts_table.php

// database/migrations/xxxx_xx_xx_create_posts_table.php

// database/migrations/xxxx_xx_xx_create_posts_table.php

// database/migrations/xxxx_xx_xx_create_posts_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relacionamento com a tabela users
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('idCategory')->on('categories')->onDelete('cascade'); // Relacionamento com a tabela categories usando idCategory
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
