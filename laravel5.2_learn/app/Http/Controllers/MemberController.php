<?php
/**
 * Created by PhpStorm.
 * User: Reck
 * Date: 2017/2/16
 * Time: 17:38
 */
namespace App\Http\Controllers;

use App\Member;

class MemberController extends Controller
{
    public function info()
    {
        return "第一个控制器地址是".route('memberInfo');
    }

    public function info_id($id)
    {
        return "user_id = ".$id;
    }

    public function info_name($id,$name)
    {
        return "user_id = " . $id . " name = " . $name;
    }


    public function middle_test()
    {
        echo "主程序";
    }

    public function testBefore()
    {

        echo "后执行";
    }


    public function memberModel()
    {
        return Member::getMember();
    }



}