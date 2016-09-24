<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbPermission
 */
class DbPermission extends Model
{
    protected $table = 'db_permissions';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'display_name',
        'group',
        'description'
    ];

    protected $guarded = [];

        
}