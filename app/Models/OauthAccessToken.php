<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthAccessToken
 */
class OauthAccessToken extends Model
{
    protected $table = 'oauth_access_tokens';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'client_id',
        'name',
        'scopes',
        'revoked',
        'expires_at'
    ];

    protected $guarded = [];

        
}