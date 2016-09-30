<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'db_roles';
    
    protected $fillable = array('name', 'display_name', 'thumb', 'description', 'status');
    
    //获取用户组的权限
    public function Permissions() {
        $results = $this->belongsToMany('App\Http\Model\Permissions', 'role_permission', 'role_id', 'permission_id');
        return $results;
    }
    
}