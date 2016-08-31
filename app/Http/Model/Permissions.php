<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'role_permissions';
    
    protected $fillable = array('name', 'display_name', 'group', 'description');
    
    public function setPasswordAttribute($passowrd) {
        $this -> attributes['password'] = Hash::make($passowrd);
    }
    
    public function setGroupAttribute($group) {
        $group = str_replace(' ', '', $group);
        if (empty($group)) {
            $group = "未分组";
        }
        $this -> attributes['group'] = $group;
    }
    
    public function setNameAttribute($name) {
        $name = str_replace('/', '\\', $name);
        $this -> attributes['name'] = $name;
    }
    
}