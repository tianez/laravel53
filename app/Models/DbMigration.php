<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbMigration
 */
class DbMigration extends Model
{
    protected $table = 'db_migrations';

    public $timestamps = false;

    protected $fillable = [
        'migration',
        'batch'
    ];

    protected $guarded = [];

        
}