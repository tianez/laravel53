<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbRole
 */
class DbRole extends Model
{
    protected $table = 'db_roles';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'display_name',
        'thumb',
        'description',
        'status'
    ];

    protected $guarded = [];

        
}