<?php
/**
 * 最简单的模型
 * Created by PhpStorm.
 * User: Reck
 * Date: 2017/2/17
 * Time: 11:34
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //指定表
    protected $table = 'student';//默认的表会是students

    //指定主键
    protected $primaryKey = 'id';//默认主键是id

    //指定可以批量添加的数据的字段
    protected $fillable = ['name','age'];

    //指定不允许批量赋值的字段
    protected $guarded = [''];

    //取消自动维护数据表中的 updated_at, created_at 这两个字段 时间
//    public $timestamps = false; //默认为true

    //如果想自动维护这两个字段，则要更改原有的函数，进行覆盖
    protected function getDateFormat()
    {
        return time();
    }

    //在读取的时候会自动的改变时间戳为 正常显示时间，如果不想，则要用下面的函数改变
    protected function asDateTime($value)
    {
        return $value;
    }


}