<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('model_name',30);
            $table->unsignedBigInteger('model_id');
            $table->string('type',50);
            $table->tinyInteger('status')->default(0)->unsigned();
            $table->integer('rank')->default(0)->unsigned();

            $table->timestamps();
        });

        Schema::create('block_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('block_id');
            $table->string('locale')->index();
    
            $table->longText('content')->nullable();
    
            $table->unique(['block_id', 'locale']);
            $table->foreign('block_id')->references('id')->on('blocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blocks');
    }
}
