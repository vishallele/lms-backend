<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;

    protected $connection = "mongodb";

    protected $table = "questions";

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
