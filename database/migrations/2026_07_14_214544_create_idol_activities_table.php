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
        Schema::create('idol_activities', function (Blueprint $table) {
            $table->id();
            $table->string('idol_name');
            $table->string('activity_name');
            $table->enum('category', ['Concert', 'Variety Show', 'Drama', 'Fan Meeting', 'Live Streaming']);
            $table->date('activity_date');
            $table->integer('duration_hours');
            $table->integer('viewer_count');
            $table->enum('status', ['Upcoming', 'Finished']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idol_activities');
    }
};
