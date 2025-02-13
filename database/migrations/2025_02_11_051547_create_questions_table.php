<?php

use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{

    protected $connection = "mongodb";

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $collection) {
            $collection->integer('id');
            $collection->index('lesson_id');
            $collection->softDeletes();
            /*$table->id();
            $table->string('question_text');
            $table->string('question_image')->nullable();
            $table->string('audio_file')->nullable();
            $table->enum('question_type', [
                'mcq',
                'build_sentence',
                'audio_to_text',
                'fill_in_the_blanks',
            ])->default('mcq');
            $table->string('correct_anwer');
            $table->inde
            $table->$table->timestamps();*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
