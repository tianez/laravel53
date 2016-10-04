<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthAuthCode
 */
class OauthAuthCode extends Model
{
    protected $table = 'oauth_auth_codes';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'client_id',
        'scopes',
        'revoked',
        'expires_at'
    ];

    protected $guarded = [];

        
}