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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('timezone');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // Добавление записей в БД
        DB::table('cities')->insert([
            ['city' => 'Москва', 'timezone' => 'UTC+3', 'created_at' => date("Y-m-d H:i:s")],
            ['city' => 'Санкт-Петербург', 'timezone' => 'UTC+3', 'created_at' => date("Y-m-d H:i:s")],
            ['city' => 'Калининград', 'timezone' => 'UTC+2', 'created_at' => date("Y-m-d H:i:s")],
            ['city' => 'Екатеринбург', 'timezone' => 'UTC+5', 'created_at' => date("Y-m-d H:i:s")],
            ['city' => 'Новосибирск', 'timezone' => 'UTC+6', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
