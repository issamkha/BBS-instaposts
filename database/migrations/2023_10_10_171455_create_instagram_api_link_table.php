<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('instagram_api_link')) {
            Schema::create('instagram_api_link', function (Blueprint $table) {
                $table->id();
                $table->string('url');
                $table->string('user_id');
                $table->string('endpoint');
                $table->json('fields');
                $table->string('access_token', 500);
                $table->integer('limit');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instagram_api_link');
    }
};
