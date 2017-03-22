<?php
/**
 * Created by PhpStorm.
 * User: Reck
 * Date: 2017/2/16
 * Time: 19:15
 */
namespace App\Http\Controllers;

use App\Student;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function user_info()
    {
        return view('user/info', array('name' => 'zhg', 'age' => '28'));
    }

    public function getStudent()
    {


//        $bool = DB::insert('insert into wx_student(name,age) VALUES (?,?)',['zhg','18']);
//        var_dump($bool);

        //返回影响的行数
//        $line = DB::update('update wx_student set name = ? where id = ?',['xf',2]);
//        var_dump($line);

        $student = DB::select('select * from wx_student');
//        var_dump($student);
        dd($student);
        //返回删除的行数
//        $num = DB::delete('delete wx_student where id > ?',[2]);

    }

    //查询构造器-插入数据
    public function query1()
    {
        //插入单条数据，返回值为bool型
//        $bool = DB::table('student')->insert(
//            ['name'=>'oobase','age'=>3]
//        );
//        var_dump($bool);//bool(true)

        //插入多条数据，参数为二维数组，返回值依然为bool型
//        $bool = DB::table('student')->insert([
//            ['name'=>'test1','age'=>1],
//            ['name'=>'test2','age'=>2],
//        ]);
//        var_dump($bool);//bool(true)

        //获取插入数据的自增ID
//        $id = DB::table('student')->insertGetId(
//            ['name'=>'test3','age'=>3]
//        );
//        var_dump($id);//int(6)


    }

    //查询构造器--更新数据
    public function query2()
    {
        //更新数据--返回影响的行数
//        $num = DB::table('student')
//            ->where('id',2) // 这里记得where
//            ->update(['name'=>'test444']);
//        var_dump($num);//int(1)

        //自增--返回影响的行数
//        $num = DB::table('student')->where('id',2)->increment('age');//默认自增1
//        var_dump($num);//int(1)

//        $num = DB::table('student')->where('id',2)->increment('age',3);//自增3
//        var_dump($num);//int(1)

//        $num = DB::table('student')->where('id',2)->increment('age',3,['name'=>'test5']);//自增3的同时，修改其他数据
//        var_dump($num);//int(1)

        //自减--返回影响的行数
//        $num = DB::table('student')->where('id',2)->decrement('age');//默认自减1
//        var_dump($num);//int(1)

//        $num = DB::table('student')->where('id',2)->decrement('age',3);//自减3
//        var_dump($num);//int(1)

        $num = DB::table('student')->where('id', 2)->decrement('age', 3, ['name' => 'test6']);//自减3的同时，修改其他数据
        var_dump($num);//int(1)
    }

    //查询构造器--删除数据
    public function query3()
    {
        //--返回影响的行数
//        $num = DB::table('student')->where('id',2)->delete();
//        var_dump($num);//int(1)

//        $num = DB::table('student')->where('id','>=',5)->delete();
//        var_dump($num);//int(2)

        // 清空数据表，不返回数据
        DB::table('student')->truncate();//会恢复自增id

    }

    //查询构造器--查询数据
    public function query4()
    {
//        $bool = DB::table('student')->insert([
//            ['name'=>'test1','age'=>1],
//            ['name'=>'test2','age'=>2],
//            ['name'=>'test3','age'=>3],
//            ['name'=>'test4','age'=>4],
//        ]);
//        var_dump($bool);

        //查询所有的数据
//        $students = DB::table('student')->get();
//        var_dump($students);//二维数组

//        $students = DB::table('student')->where('id',3)->get();
//        var_dump($students);//二维数组

//        $students = DB::table('student')->where('id',3)->first();
//        var_dump($students->name);//一维对象

        //多条件查询
//        $students = DB::table('student')->whereRaw('id > ? and age < ?',[2,4])->get();
//        var_dump($students);

        //排序
//        $students = DB::table('student')->orderBy('id','desc')->get();
//        var_dump($students);//二维数组

        //pluck --查询单个字段--只能查一个字段的
//        $students = DB::table('student')->pluck('name');
//        var_dump($students);//一维数组

        //lists --也是只能查单个字段，但是有第二个参数，可以把第二个参数，查询出来作为这个数组的键
//        $students = DB::table('student')->lists('name','age');
//        var_dump($students);//一维数组
        /**
         * array(4) {
         * [222]=>
         * string(5) "test1"
         * [2]=>
         * string(5) "test2"
         * [3]=>
         * string(5) "test3"
         * [4]=>
         * string(5) "test4"
         * }
         */

        //select --查询多个字段
//        $students = DB::table('student')->select('name','age')->get();
//        var_dump($students);//二维数组

        //chunk --分段查询，第一个参数为多少位一段，第二个处理这些数据
        DB::table('student')->orderBy('id', 'desc')->chunk(2, function ($students) {

            var_dump($students);
        });

    }

    //聚合函数
    public function query5()
    {

        //count
//        $num = DB::table('student')->count();
//        var_dump($num);

        //max
//        $max = DB::table('student')->max('age');
//        var_dump($max);

        //min
//        $min = DB::table('student')->min('age');
//        var_dump($min);

        //avg --平均
//        $avg = DB::table('student')->avg('age');
//        var_dump($avg);

        //sum --总数
        $sum = DB::table('student')->sum('age');
        var_dump($sum);

    }


    public function orm1()
    {

        //all 获取所有数据
//        $students = Student::all();
//        var_dump($students);

        //find 获取一条数据
//        $student = Student::find('2');
//        var_dump($student);
//        var_dump($student->name);

        //findOrFail --如果没有这条数据就抛出异常
//        $student = Student::findOrFail('80');
//        var_dump($student);


//        $students = Student::get();
//        var_dump($students);

        //first
//        $student = Student::where('id','>',2)->orderBy('id','desc')->first();
//        var_dump($student);

        //chunk
//        Student::chunk(2,function ($students){
//            var_dump($students);
//        });


        //使用聚合函数
        $num = Student::count();
        var_dump($num);

    }

    public function orm2()
    {
        //使用模型新增数据
        //调用这个方法时，会自动维护数据表中的 updated_at, created_at 这两个字段
        //如果不想用，则在model中设置 public $timestamps = false; 即可
        //默认的这两个字段是会存成当前时间，我们一般要存时间戳，所以要改model
//        $student = new Student();
//        $student->name = 'orm111';
//        $student->age = 26;
//        $bool = $student->save();
//        var_dump($bool);


//        $student = Student::find(5);
//        var_dump($student->name);
//
//        $student = Student::find(7);
//        var_dump($student->updated_at);

        //使用模型的create方法批量新增数据

        //默认情况下是不允许批量添加数据的--只能插入一条数据，不能数据插入
        //如果需要，则要改动model里面的参数
//        $student = Student::create(
//            ['name'=>'orm3','age'=>56]
//        );
//        var_dump($student);


        //firstOrCreate --根据字段先查找，如果有，则返回数据，如果无，则添加后返回数据
//        $student = Student::firstOrCreate(['name'=>'fist','age'=>66]);
//        var_dump($student);

        //firstOrNew --根据字段先查找，如果有，则返回数据，如果无，则直接返回实例，不添加
//        $student = Student::firstOrNew(['name'=>'fist2','age'=>66]);
////        var_dump($student);
//        //如果有需要，则自己调用save方法保存
//        $bool = $student->save();
//        var_dump($bool);

        //修改的时候只会更改 updated_at 这个字段
//        $num = Student::where('id',7)->update(['name'=>4545456]);
//        var_dump($num);

//        $student = Student::find(7);
//        $student->name = '4545456a';
//        $bool = $student->save();
//        var_dump($bool);

        //删除-- 尽量用destroy不用delete
        //delete 成功则返回true，不成功则返回错误
//        $student = Student::find(7);
//        $bool = $student->delete();
//        var_dump($bool);

        //destroy
//        $num = Student::destroy(7);
//        var_dump($num);
//        $num = Student::destroy([7,8]);
//        var_dump($num);


    }

    public function section()
    {
        $name = 'b';
        $arr = ['b', 'c'];
        return view('student.section', ['name' => $name, 'arr' => $arr]);
    }


}