<?php
/**
 * Created by PhpStorm.
 * User: Reck
 * Date: 2017/2/20
 * Time: 9:04
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class StudentController extends Controller
{
    //request 学习
    public function request1(Request $request)
    {
        //接受传值
//        echo $request->input('name');

        //添加默认值
//        echo $request->input('name','未知');

        //获取全部参数
//        $req = $request->all();
//        var_dump($req);//array(2) { ["sex"]=> string(2) "22" ["name"]=> string(3) "zhg" }

        //判断是否含有某个参数
//        if ($request->has('name')) {
//            echo 'YES';
//        } else {
//            echo 'NO';
//        }

        //获取请求方法
//        echo  $request->method();
//        echo $request->getMethod();//GET

        //判断请求方法
//        $req = $request->isMethod('GET');
//        var_dump($req);//bool(true)

        //判断ajax
//        if($request->ajax()){
//            echo 'Yes';
//        } else {
//            echo 'No';
//        }

        //判断url是否符合规则
//        if($request->is('student/*')){
////            echo $request->url();//http://127.0.0.18/public/student/request1
////            echo $request->getBasePath();//-- /public
////            echo $request->getBaseUrl();//-- /public
////            echo $request->getUri();//http://127.0.0.18/public/student/request1?name=zhg&sex=22
////            echo $request->getRequestUri();//-- /public/student/request1?sex=22&name=zhg
//        } else {
//            echo 'NO';
//        }

//        var_dump($_GET);

    }

    public function session1(Request $request)
    {
        //Request session
//        $request->session()->put('key1','value1');
//        echo $request->session()->get('key1');

        //session
//        session()->put('key2','value2');
//        echo session()->get('key2');

        //Session
//        Session::put('key3','value3');
//        echo Session::get('key3');
//        echo Session::get('key3','default');//不存在则取默认值
        //以数组的形式存储数据--还是单对单
//        Session::put(['key4'=>'value4']);
//        echo Session::get('key4');

        //把数据存入session的student数组中
//        Session::push('student','zhg');
//        Session::push('student','hg');
//        $req = Session::get('student');
//        var_dump($req);//array(2) { [0]=> string(3) "zhg" [1]=> string(2) "hg" }

        //取出session中的所有值
//        Session::all();

        //判断session中是否存在这个值
//        if(Session::has('key2')) {
//            echo Session::get('key2');
//        } else {
//            echo '不存在';
//        }

        //取出session中的数据，并删除
//        echo Session::pull('key3');

        //删除session中的数据
//        Session::forget('key3');

        //删除session中的所有数据
//        Session::flush();

        //数据仅存在一次，取出则删除
//        Session::flash('key-flash','val-flash');
//        echo Session::get('key-flash');

//        session(['key3'=>'value3']);


    }

    public function session2(Request $request)
    {
        return Session::get('message','暂无数据');
//        echo 'session2';
//        echo '<pre>';
//        $req = session()->all();
//        var_dump($req);
    }
    
    
    public function response()
    {
        //json 化数据
//
//        $data = [
//            'errCode' => 0,
//            'errMsg' =>'success'
//        ];
//
//        return response()->json($data);

        //重定向

//        return redirect('session2');
//        return redirect('session2')->with('message','仅显示一次');//存入在session中，则路由要做到开启session中
//        return redirect()->action('StudentController@session2');
//        return redirect()->action('StudentController@session2')
//            ->with('message','仅显示一次');//存入在session中
//        return redirect()->route('session2');//必须 有别名
        return redirect()->route('session2')->with('message','仅显示一次');//存入在session中
        return redirect()->back();//返回上一层

    }


    public function activity0()
    {
        return '活动尚未开始 ，敬请期待';
    }

    public function activity1()
    {
        return '活动尚未开始 ，敬请期待';
    }

    public function activity2()
    {
        return '活动尚未开始 ，敬请期待';
    }
}