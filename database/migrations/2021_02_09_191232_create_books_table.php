<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cover_image_url');
            $table->string('description', 5000)->unique();
            $table->boolean('is_approved')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->float('price');
            $table->float('discount')->default(0);
            $table->timestamps();
            $table->unique(['title', 'description']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
