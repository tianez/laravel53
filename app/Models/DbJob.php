<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbJob
 */
class DbJob extends Model
{
    protected $table = 'db_jobs';

    public $timestamps = true;

    protected $fillable = [
        'queue',
        'payload',
        'attempts',
        'reserved_at',
        'available_at'
    ];

    protected $guarded = [];

        
}