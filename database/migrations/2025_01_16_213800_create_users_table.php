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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->unsignedBigInteger('role_id')->default(2);
            $table->index('role_id', 'role_idx');
            $table->foreign('role_id', 'role_fk')->on('roles')->references('id');

            $table->string('tariff')->default('simple');

            $table->string('name');
            $table->string('surname')->default('')->nullable();
            $table->string('gender')->default('Не определился');

            $table->foreignId('city_id')->nullable()->constrained('cities')->default('');
            
            $table->string('date_of_birth')->default('')->nullable();
            $table->string('phone')->default('')->nullable();
            $table->decimal('money')->default(0);
            $table->string('avatar')->default('/assets/images/no_avatar.png');
            $table->string('cover')->default('/assets/images/no_cover.png');

            $table->string('service_theme')->default('light');
            $table->string('password');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
