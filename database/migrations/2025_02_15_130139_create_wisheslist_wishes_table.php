<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wisheslist_wishes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('price')->nullable();
            $table->string('link_buy')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('done')->default(false);
            $table->string('description')->nullable();
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id', 'wishes_user_idx');
            $table->foreign('user_id', 'wishes_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisheslist_wishes');
    }
};
