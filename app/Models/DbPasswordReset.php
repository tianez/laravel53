<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbPasswordReset
 */
class DbPasswordReset extends Model
{
    protected $table = 'db_password_resets';

    public $timestamps = true;

    protected $fillable = [
        'email',
        'token'
    ];

    protected $guarded = [];

        
}