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
        Schema::create('level_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
            $table->softDeletes();
        });

        // Добавление записей в БД
        DB::table('level_tasks')->insert([
            [
                'id' => 1,
                'title' => 'Добавить желания',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 2,
                'title' => 'Пригласить друзей',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 3,
                'title' => 'Кол-во дней зарегистрированным на портале',
                'created_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_tasks');
    }
};
