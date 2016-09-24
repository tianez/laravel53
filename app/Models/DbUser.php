<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbUser
 */
class DbUser extends Model
{
    protected $table = 'db_users';

    public $timestamps = true;

    protected $fillable = [
        'role',
        'user_name',
        'email',
        'password',
        'real_name',
        'china_id',
        'head_img',
        'office_phone',
        'mobile_phone',
        'qq',
        'sex',
        'score',
        'job',
        'team',
        'company_id',
        'remarks',
        'status',
        'login_totals',
        'reg_ip',
        'last_login_ip',
        'uid',
        'remember_token'
    ];

    protected $guarded = [];

        
}