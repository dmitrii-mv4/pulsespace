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
        Schema::create('wisheslist_wish_join_lists', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('wish_id');
            $table->unsignedBigInteger('list_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('wish_id')->references('id')->on('wisheslist_wishes');
            $table->foreign('list_id')->references('id')->on('wisheslist_lists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisheslist_wish_join_lists');
    }
};
