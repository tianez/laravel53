<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbMeun
 */
class DbMeun extends Model
{
    protected $table = 'db_meun';

    public $timestamps = true;

    protected $fillable = [
        'link',
        'title',
        'icon',
        'description',
        'roles',
        'order',
        'status'
    ];

    protected $guarded = [];

        
}