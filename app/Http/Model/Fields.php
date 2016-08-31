<?php

namespace  App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Fields extends Model
{
    /**
    * 关联到模型的数据表
    *
    * @var string
    */
    protected $table = 'fields';
    
    /**
    * 表明模型是否应该被打上时间戳
    *
    * @var bool
    */
    
    public $timestamps = true;
    /**
    * 模型日期列的存储格式
    *
    * @var string
    */
    // protected $dateFormat = 'U';
    
    /**
    * 为模型指定不同的连接
    *
    * @var string
    */
    // protected $connection = 'connection-name';
    
    /**
    * 应该被调整为日期的属性
    *
    * @var array
    */
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    /**
    * 批量赋值的属性
    *
    * @var array
    */
    protected $fillable = array('id', 'key', 'title', 'type','f_module', 'f_groups', 'f_description', 'f_default','f_add', 'f_edit', 'f_visible', 'order','status');
    
    /**
    * 不能被批量赋值的属性
    *
    * @var array
    */
    protected $guarded = ['_token'];
    
    /**
    * 插入和更新前进行处理
    *
    * @var array
    */
    public function setTitleAttribute($value) {
        // $this->attributes['title'] = Hash::make($value);
        $this->attributes['title'] = 'haodede333333311111111111111111111111133';
    }
    
    /**
    * 在转化为数组时应该隐藏的属性
    *
    * @var array
    */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    
    /**
    * 在转化为数组时加入不存在的属性
    *
    * @var array
    */
    protected $appends = ['is_admin'];
    
    public function getIsAdminAttribute() {
        return $this->attributes['id'] == 1;
    }
    
    /**
    * 读取数据在转化为数组时进行预处理
    *
    * @var array
    */
    public function getTitleAttribute($value) {
        // if (empty($value)) {
        //     $value = '[]';
        // }
        return $value;
    }
    
    /**
    * 自定义筛选方法
    *
    * @var array
    */
    public function scopeFile($query,$table= 'fields')
    {
        return $query->select('id','key', 'title','type','f_options','f_ext','f_default','f_add','f_edit','f_visible')->where('f_module',$table);
    }
    
    /**
    * 插入数据时进行验证
    *
    * @var array
    */
    public function Validator($date, $v = true) {
        $rules = array();
        $messages = array();
        if ($v) {
            $rules['key'] = 'required|max:255|min:2';
            $messages['key.required'] = '字段key不能为空 ！';
            $messages['key.min'] = '<p style="color:#f00">字段key不能少于:min个字符 ！</p>';
        }
        $rules['title'] = 'required';
        $messages['title.required'] = '<p style="color:#f00">必须填写字段名称 ！</p>';
        $validator = Validator::make($date, $rules, $messages);
        return $validator;
    }
}