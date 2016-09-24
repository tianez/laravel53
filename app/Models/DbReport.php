<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbReport
 */
class DbReport extends Model
{
    protected $table = 'db_report';

    public $timestamps = true;

    protected $fillable = [
        'username',
        'sex',
        'mingzu',
        'danwei',
        'phone',
        'fangjian',
        'jdr'
    ];

    protected $guarded = [];

        
}