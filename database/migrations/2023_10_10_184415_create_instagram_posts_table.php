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
        if (!Schema::hasTable('instagram_posts')) {
            Schema::create('instagram_posts', function (Blueprint $table) {
                $table->id();
                $table->string('username');
                $table->text('caption');
                $table->string('media_type');
                $table->text('media_url');
                $table->text('thumbnail_url')->nullable()->default(null);
                $table->string('permalink');
                $table->dateTimeTz('timestamp');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instagram_posts');
    }
};
