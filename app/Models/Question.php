<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Question extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory, InteractsWithMedia;

    protected $connection = "mongodb";

    protected $table = "questions";

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
