<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstagramApiLink extends Model
{
    use HasFactory;

    //Definition du nom exact de la table
    protected $table = 'instagram_api_link';

    protected $fillable = [
        'url',
        'user_id',
        'endpoint',
        'fields',
        'access_token',
        'limit'
    ];
}
