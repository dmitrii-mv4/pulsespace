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
        Schema::create('wish_bind_lists', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('wish_id');
            $table->unsignedBigInteger('list_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('wish_id')->references('id')->on('wishes');
            $table->foreign('list_id')->references('id')->on('wish_lists');

            // $table->index('wish_id', 'wish_idx');
            // $table->index('list_id', 'wish_list_idx');

            // $table->foreign('wish_id', 'wishes_fk')->on('wishes')->references('id');
            // $table->foreign('list_id', 'wish_list_fk')->on('wish_lists')->references('id');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wish_bind_lists');
    }
};
