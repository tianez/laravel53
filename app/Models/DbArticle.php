<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbArticle
 */
class DbArticle extends Model
{
    protected $table = 'db_article';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'keyword',
        'excerpt',
        'thumb',
        'content',
        'link',
        'cat_id',
        'type',
        'temp',
        'uid',
        'view',
        'bookmark',
        'comment',
        'comment_status',
        'order',
        'status'
    ];

    protected $guarded = [];

        
}