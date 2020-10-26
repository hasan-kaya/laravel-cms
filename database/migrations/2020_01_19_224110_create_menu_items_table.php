<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('parent')->default(0);
            $table->integer('sort')->default(0);
            $table->string('icon')->nullable();
            $table->integer('depth')->default(0);

            $table->timestamps();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });

        Schema::create('menu_item_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('menu_item_id');
            $table->string('locale')->index();
    
            $table->string('label');
            $table->string('link');
    
            $table->unique(['menu_item_id', 'locale']);
            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
        Schema::dropIfExists('menu_item_translations');
    }
}
