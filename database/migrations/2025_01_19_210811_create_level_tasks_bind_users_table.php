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
        Schema::create('level_tasks_bind_users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id'); // id пользователя
            $table->unsignedBigInteger('level_task_id'); // id задания
            $table->integer('done'); // кол-во выполнено у текщего пользователя

            $table->index('user_id', 'user_level_task_user_idx');
            $table->index('level_task_id', 'user_level_task_task_idx');

            $table->foreign('user_id', 'user_level_task_user_fk')->on('users')->references('id');
            $table->foreign('level_task_id', 'user_level_task_task_fk')->on('level_tasks')->references('id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_tasks_bind_users');
    }
};
