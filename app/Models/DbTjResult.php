<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbTjResult
 */
class DbTjResult extends Model
{
    protected $table = 'db_tj_result';

    public $timestamps = true;

    protected $fillable = [
        'tj_id',
        'item',
        'result'
    ];

    protected $guarded = [];

        
}