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
        Schema::create('wisheslist_lists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('url')->default('');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id', 'wish_lists_user_idx');
            $table->foreign('user_id', 'wish_lists_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisheslist_lists');
    }
};
