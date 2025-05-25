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
        Schema::create('post_to_rubrics', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('rubric_id');

            $table->index('post_id', 'idx_post_to_rubrics_post_id');
            $table->index('rubric_id', 'idx_post_to_rubrics_rubric_id');

            $table->foreign('post_id', 'fk_post_to_rubrics_post_id')
                ->on('posts')
                ->references('id');
            $table->foreign('rubric_id', 'fk_post_to_rubrics_rubric_id')
                ->on('rubrics')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_to_rubrics');
    }
};
