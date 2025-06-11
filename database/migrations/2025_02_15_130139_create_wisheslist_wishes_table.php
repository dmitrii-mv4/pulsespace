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
            $table->text('link_buy')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('user_ip_booking')->nullable();
            $table->date('date_booking')->nullable();
            $table->boolean('done')->nullable();
            $table->text('description')->nullable();
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
