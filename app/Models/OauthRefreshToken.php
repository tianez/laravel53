<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthRefreshToken
 */
class OauthRefreshToken extends Model
{
    protected $table = 'oauth_refresh_tokens';

    public $timestamps = true;

    protected $fillable = [
        'access_token_id',
        'revoked',
        'expires_at'
    ];

    protected $guarded = [];

        
}