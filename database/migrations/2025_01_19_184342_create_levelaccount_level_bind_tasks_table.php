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
        Schema::create('levelaccount_level_bind_tasks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('level_id'); // id уровня
            $table->unsignedBigInteger('level_task_id'); // id задания
            $table->integer('completion'); // сколько нужно сделать

            $table->index('level_id', 'level_task_level_idx');
            $table->index('level_task_id', 'level_task_task_idx');

            $table->foreign('level_id', 'level_task_level_fk')->on('levelaccount_levels')->references('id');
            $table->foreign('level_task_id', 'level_task_task_fk')->on('levelaccount_level_tasks')->references('id');

            $table->timestamps();
            $table->softDeletes();
        });

        // Добавление записей в БД
        DB::table('levelaccount_level_bind_tasks')->insert([
            // для 1 уровня
            [
                'id' => 1,
                'level_id' => 1,
                'level_task_id' => 1,
                'completion' => 3,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 2,
                'level_id' => 1,
                'level_task_id' => 2,
                'completion' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            // для 2 уровня
            [
                'id' => 3,
                'level_id' => 2,
                'level_task_id' => 2,
                'completion' => 3,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 4,
                'level_id' => 2,
                'level_task_id' => 3,
                'completion' => 7,
                'created_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levelaccount_level_bind_tasks');
    }
};
