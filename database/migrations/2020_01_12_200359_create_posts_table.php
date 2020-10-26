<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\PostType;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('type')->unsigned()->default(PostType::Page);
            $table->tinyInteger('status')->default(0)->unsigned();
            $table->integer('rank')->default(0)->unsigned();
            $table->timestamps();
        });

        Schema::create('post_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id');
            $table->string('locale')->index();
    
            $table->string('name',255);
            $table->string('slug')->unique();
            $table->string('description',255)->nullable();
            $table->text('tags')->nullable();
            $table->longText('content')->nullable();
    
            $table->unique(['post_id', 'locale']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_translations');
    }
}
