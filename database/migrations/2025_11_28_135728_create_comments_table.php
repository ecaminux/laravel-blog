<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('post_id');
            $table->bigInteger('user_id');
            $table->text('content');
            $table->timestampTz('created_at')->nullable()->default(DB::raw("now()"));
            $table->bigInteger('likes_count')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
