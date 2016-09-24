<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbArticleComment
 */
class DbArticleComment extends Model
{
    protected $table = 'db_article_comments';

    public $timestamps = true;

    protected $fillable = [
        'article_id',
        'content',
        'pid',
        'author_id',
        'author_name',
        'author_email',
        'author_url',
        'author_ip',
        'type',
        'status'
    ];

    protected $guarded = [];

        
}