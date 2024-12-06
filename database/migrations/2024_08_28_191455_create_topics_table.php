<?php



// database/migrations/xxxx_xx_xx_create_topics_table.php

// database/migrations/xxxx_xx_xx_create_topics_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relacionamento com a tabela users
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('idCategory')->on('categories')->onDelete('cascade'); // Relacionamento com a tabela categories usando 'idCategory'
            $table->string('title');
            $table->text('description');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('topics');
    }
}

