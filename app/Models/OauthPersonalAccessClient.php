<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthPersonalAccessClient
 */
class OauthPersonalAccessClient extends Model
{
    protected $table = 'oauth_personal_access_clients';

    public $timestamps = true;

    protected $fillable = [
        'client_id'
    ];

    protected $guarded = [];

        
}