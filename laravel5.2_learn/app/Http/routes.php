<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('foo/bar',function(){
	return "hello word";
});

//路由关联控制器
//Route::get('member/info','MemberController@info');

//name可以 不传，也可以传
Route::get('member/{name?}',function($name = "rere") {
    return $name;
});

Route::get('member/{id}','MemberController@info_id')->where('id','[0-9]+');//注意优先级


Route::get('member/info',[
    'uses'=>'MemberController@info',
    'as'=>'memberInfo'//路由别名
]);

//多路由的验证规则
Route::get('member/{id}/{name}','MemberController@info_name')->where(array('id' => '[0-9]+', 'name' => '[A-Za-z]+'));

//Route::controller('member','MemberController');---5.2已经废弃


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


// TODO 前置操作和后置操作没明白--写的所有操作都在最开始执行了
/**
 *  注： laravel中间件不是make一个middleware然后在route中使用就行的
 *  laravel中间件不是make一个middleware然后在route中使用就行的
 * 还要在 kernel中注册这个中间件的名字和使用位置……比如route中使用的；
 * protected $routeMiddleware = [
 * 'auth' => \App\Http\Middleware\Authenticate::class,
 * 'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
 * 'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
 * ];
 *
 * 就要在这里新增自定义的middleware。
 */


//HTTP 中间件
Route::group(['middleware' => ['web']], function () {
    //
    Route::get("middle",'MemberController@middle_test');

});

Route::any('activity0','StudentController@activity0');
Route::group(['middleware'=>['activity']],function (){
   Route::any('activity1','StudentController@activity1');
    Route::any('activity2','StudentController@activity2');
});



//路由前缀
//再访问users路由前，必须加上admin才能进入这个路由
Route::group(['prefix' => 'admin'], function()
{
    Route::get('users', function(){
        return 'Matches The "/admin/users" URL';
    });
});











Route::get('user/info','UserController@user_info');

Route::get('userModel','MemberController@memberModel');

Route::get('student','UserController@getStudent');

//查询构造器
Route::get('query1','UserController@query1');//插入
Route::get('query2','UserController@query2');//更新
Route::get('query3','UserController@query3');//删除
Route::get('query4','UserController@query4');//查询
Route::get('query5','UserController@query5');//聚合函数

//ORM
Route::get('orm1','UserController@orm1');
Route::get('orm2','UserController@orm2');

//模板引擎
Route::get('section','UserController@section');

//request
Route::get('student/request1','StudentController@request1');

//session --必须要用到group 启动session
Route::group(['middleware'=>'web'],function (){
    Route::get('session1','StudentController@session1');
    Route::get('session2',[
        'as'=>'session2',
        'uses'=>'StudentController@session2'
    ]);
    Route::get('response','StudentController@response');
});




