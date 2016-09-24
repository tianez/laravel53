<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbArticleMetum
 */
class DbArticleMetum extends Model
{
    protected $table = 'db_article_meta';

    public $timestamps = false;

    protected $fillable = [
        'article_id',
        'meta_key',
        'meta_value'
    ];

    protected $guarded = [];

        
}