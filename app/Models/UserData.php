<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserData extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'designation',
        'about_user',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'profile_picture'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
