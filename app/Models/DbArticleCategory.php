<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbArticleCategory
 */
class DbArticleCategory extends Model
{
    protected $table = 'db_article_category';

    public $timestamps = true;

    protected $fillable = [
        'category_name',
        'category_ico',
        'category_des',
        'pid',
        'taxonomy',
        'status'
    ];

    protected $guarded = [];

        
}