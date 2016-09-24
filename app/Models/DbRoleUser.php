<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbRoleUser
 */
class DbRoleUser extends Model
{
    protected $table = 'db_role_user';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'role_id'
    ];

    protected $guarded = [];

        
}