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
            $table->string('user_name');
            $table->char('user_cpf', 11)->unique();
            $table->integer('roles');
            $table->string('location');
            $table->timestamps();
        });

        Schema::create('urlshorter', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('url');
            $table->string('location');
            $table->string('uri')->nullable()->unique();
            $table->timestamps();
        });

        Schema::create('quickaccess', function (Blueprint $table) {
            $table->id();
            $table->binary('background')->nullable();
            $table->binary('img')->nullable();
            $table->string('nome');
            $table->string('descricao');
            $table->string('redes')->nullable();
            $table->string('labels')->nullable();
            $table->string('uri')->unique();
            $table->timestamps();
        });

        Schema::create('setup', function (Blueprint $table) {
            $table->id();
            $table->string("key");
            $table->string("value");
            $table->timestamps();
        });

        Schema::create('config', function (Blueprint $table) {
            $table->id();
            $table->string("key");
            $table->string("value");
            $table->string("description");
            $table->timestamps();
        });

        /*Schema::create('auditoria', function (Blueprint $table) {
            $table->id();
            $table->timestamp();
            $table->string("user_cpf");
            $table->string("action");
            $table->string("action_description");
            $table->string("result");
        });*/

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('urlshorter');
        Schema::dropIfExists('quickaccess');
        Schema::dropIfExists('setup');
        Schema::dropIfExists('config');
        //Schema::dropIfExists('auditoria');
        Schema::dropIfExists('sessions');
    }
};
