<?php
/**
 * Model 模型
 * Created by PhpStorm.
 * User: Reck
 * Date: 2017/2/16
 * Time: 19:29
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model{

    public static function getMember()
    {
        return '模型的调用';
    }
}
