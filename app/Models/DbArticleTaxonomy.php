<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbArticleTaxonomy
 */
class DbArticleTaxonomy extends Model
{
    protected $table = 'db_article_taxonomy';

    public $timestamps = false;

    protected $fillable = [
        'article_id',
        'cat_id'
    ];

    protected $guarded = [];

        
}