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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('name',50)->nullable(false)->comment('Имя пользователя');
            $table->string('email',50)->nullable(false)->comment('Email пользователя');
            $table->enum('status', ['Active','Resolved'])->nullable()->comment('Статус заявки Действущая/Решена');
            $table->text('message')->nullable(false)->comment('Сообщение пользователя');
            $table->string('comment',500)->nullable()->comment('Ответ ответственного лица');
            $table->timestamps();
            $table->index('status','status_index');
            $table->index('created_at','created_index');
            $table->index(['created_at','status'],'status_created_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
