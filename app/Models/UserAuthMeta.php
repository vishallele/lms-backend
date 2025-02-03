<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAuthMeta extends Model
{
    /** @use HasFactory<\Database\Factories\UserAuthMetaFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_external_id',
        'access_token',
        'refresh_token',
        'id_token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
