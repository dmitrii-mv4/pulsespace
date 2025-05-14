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
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
            $table->softDeletes();
        });

        // Добавление записей в БД
        DB::table('blog_categories')->insert([
            [
                'id' => 1,
                'title' => 'Маркетинг',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 2,
                'title' => 'SMM',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 3,
                'title' => 'SEO',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 4,
                'title' => 'Продажи',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 5,
                'title' => 'Разработка',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 6,
                'title' => 'Дизайн',
                'created_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
