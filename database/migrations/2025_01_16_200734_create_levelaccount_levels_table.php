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
        Schema::create('levelaccount_levels', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->string('accessibly'); // доступные возсожности на текущем уровне
            $table->string('opening'); // открытие возможностей на текущем уровне
            $table->string('rewards'); // награды при достижения текущего уровня
            $table->timestamps();
            $table->softDeletes();
        });

        // Добавление записей в БД
        DB::table('levelaccount_levels')->insert([
            [
                'id' => 1,
                'title' => '1 уровень',
                'accessibly' => '
                    Выплаты с партнёрской программы: <b>3%</b>
                ',
                'opening' => '',
                'rewards' => '
                    +25 руб. на баланс 
                ',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 2,
                'title' => '2 уровень',
                'accessibly' => 'Выплаты с партнёрской программы: <b>3%</b>',
                'opening' => 'Возможность добавлять цитаты',
                'rewards' => '+50 руб. на баланс',
                'created_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levelaccount_levels');
    }
};
