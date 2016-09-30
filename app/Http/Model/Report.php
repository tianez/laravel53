<?php

namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'db_report';
    
    protected $fillable = array('username','password','phone');
    
}