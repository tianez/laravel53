<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbRolePermission
 */
class DbRolePermission extends Model
{
    protected $table = 'db_role_permission';

    public $timestamps = false;

    protected $fillable = [
        'role_id',
        'permission_id'
    ];

    protected $guarded = [];

        
}