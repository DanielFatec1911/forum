<?php

// database/migrations/xxxx_xx_xx_create_tag_topic_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicTagsTable extends Migration
{
    public function up()
    {
        Schema::create('topic_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('topic_id');
            $table->timestamps();

            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');

            $table->unique(['tag_id', 'topic_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('topic_tags');
    }
}
