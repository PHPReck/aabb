<?php
/**
 * Created by PhpStorm.
 * User: Reck
 * Date: 2017/2/21
 * Time: 9:36
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    const SEX_UN = 10; //未知
    const SEX_BOY = 20; //男
    const SEX_GIRL = 30; //女

    protected $table = 'student';

    protected $primaryKey = 'id';

    protected $fillable = ['name','age','sex'];


    protected function getDateFormat()
    {
        return time();
    }

    protected function asDateTime($value)
    {
        return $value;
    }

    public function sex($key=null)
    {
        $arr = [
            self::SEX_UN => '未知',
            self::SEX_BOY => '男',
            self::SEX_GIRL => '女'
        ];
        if($key !== null)
            return array_key_exists($key,$arr) ? $arr[$key] : $arr[self::SEX_UN];
        else
            return $arr;
    }

}