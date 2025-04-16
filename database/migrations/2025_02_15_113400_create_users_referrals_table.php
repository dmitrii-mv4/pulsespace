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
        Schema::create('users_referrals', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            
            // Привязка к пользователю
            $table->unsignedBigInteger('user_id')->default(1);
            $table->index('user_id', 'users_idx');
            $table->foreign('user_id', 'users_fk')->on('users')->references('id');
        
            // Родитель пользователя
            $table->unsignedBigInteger('parent_id')->default(NULL)->nullable();
            $table->index('parent_id', 'parent_idx');
            $table->foreign('parent_id', 'parent_fk')->on('users')->references('id');
        
            $table->integer('count_visit')->default(0);
        
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_referrals');
    }
};
