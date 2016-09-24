<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbField
 */
class DbField extends Model
{
    protected $table = 'db_fields';

    public $timestamps = true;

    protected $fillable = [
        'key',
        'title',
        'type',
        'f_module',
        'f_groups',
        'f_description',
        'f_options',
        'f_ext',
        'f_default',
        'f_add',
        'f_edit',
        'f_visible',
        'order',
        'status'
    ];

    protected $guarded = [];

        
}