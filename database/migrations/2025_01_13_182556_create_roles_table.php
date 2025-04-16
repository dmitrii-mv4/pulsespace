<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();

            $table->softDeletes();
        });

        // Добавление записей в БД
        DB::table('roles')->insert([
            [
                'id' => 1,
                'title' => 'Администратор',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 2,
                'title' => 'Пользователь',
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
