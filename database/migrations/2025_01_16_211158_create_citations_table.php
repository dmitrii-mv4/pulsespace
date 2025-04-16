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
        Schema::create('citations', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->string('author');
            $table->timestamps();
            $table->softDeletes();
        });

        // Добавление записей в БД
        DB::table('citations')->insert([
            [
                'text' => 'Человек непредсказуем, всегда остаётся хотя бы маленький шанс, что всё получится, если мы хорошенько поработаем и потратим на это много времени.', 
                'author' => 'Арнхильд Лаувенг', 
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'text' => 'Не ждите. Время никогда не будет подходящим.', 
                'author' => 'Наполеон Хилл', 
                'created_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citations');
    }
};
