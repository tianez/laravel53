<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthClient
 */
class OauthClient extends Model
{
    protected $table = 'oauth_clients';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'name',
        'secret',
        'redirect',
        'personal_access_client',
        'password_client',
        'revoked'
    ];

    protected $guarded = [];

        
}