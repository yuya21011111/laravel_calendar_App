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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('ユーザーID');
            $table->string('title')->comment('タイトル');
            $table->string('description')->nullable()->comment('概要');
            $table->date('start_date')->comment('開始日');
            $table->string('start_time')->comment('開始時間');
            $table->date('end_date')->comment('終了日');
            $table->string('end_time')->comment('終了時間');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
