<?php
/**
 * Created by PhpStorm.
 * User: Reck
 * Date: 2017/2/21
 * Time: 9:23
 */
namespace App\Http\Controllers;

use App\Student;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpFoundation\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id','desc')->paginate(6);
        return view('student.index',[
            'students'=>$students
        ]);
    }
    
    public function create(Request $request)
    {
        if($request->isMethod('POST')){

            //1.控制器验证
            //错误信息会保存在全局变量$errors
            $this->validate($request,[
                'student.name'=>'required|min:2|max:20',
                'student.age'=>'required|integer',
                'student.sex'=>'required'
            ],[
                'required'=>':attribute 为必填项',
                'integer' => ':attribute 必须为整数',
                'min' => ':attribute 不能少于2个字符',
                'max' => ':attribute 不能多于20个字符'
            ],[
                'student.name' => '姓名',
                'student.age' => '年龄',
                'student.sex' => '性别',
            ]);


            /*
            //2.Validator 类验证
            $validator = \Validator::make($request->input(),[
                'student.name'=>'required|min:2|max:20',
                'student.age'=>'required|integer',
                'student.sex'=>'required'
            ],[
                'required'=>':attribute 为必填项',
                'integer' => ':attribute 必须为整数',
                'min' => ':attribute 不能少于2个字符',
                'max' => ':attribute 不能多于20个字符'
            ],[
                'student.name' => '姓名',
                'student.age' => '年龄',
                'student.sex' => '性别',
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }
            */

            $data = $request->input('student');
            //两种保存方法
            if (Student::create($data)){//需要设置批量赋值
                return redirect('student/index')->with('success','添加成功!');
            } else {
                return redirect()->back()->withInput();
            }

            $student = new Student();
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->sex = $data['sex'];
            if ($student->save()) {
                return redirect('student/index')->with('success','添加成功!');
            } else {
                return redirect()->back();
            }
        }
        $student = new Student();
        return view('student.create',[
            'student'=>$student
        ]);
    }
    
    public function detail($id)
    {
        $student = Student::find($id);
        return view('student/detail',[
            'student'=>$student
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if($request->isMethod('POST')){

            /**
            $this->validate($request,[
                'student.name' => 'required|min:2|mxa:20',
                'student.age'=>'required|integer',
                'student.sex' => 'required'
            ],[
                'required' => ':attribute 为必填项',
                'integer' => ':attribute 必须为整数',
                'min' => ':attribute 不能少于2位字符',
                'max' => ':attribute 不能多于20位字符'
            ],[
                'student.name' => '姓名',
                'student.age' => '年龄',
                'student.sex' => '性别'
            ]);
            */
            $validator = \Validator::make($request->input(),[
                'student.name' => 'required|min:2|max:20',
                'student.age'=>'required|integer',
                'student.sex' => 'required'
            ],[
                'required' => ':attribute 为必填项',
                'integer' => ':attribute 必须为整数',
                'min' => ':attribute 不能少于2位字符',
                'max' => ':attribute 不能多于20位字符'
            ],[
                'student.name' => '姓名',
                'student.age' => '年龄',
                'student.sex' => '性别'
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }

            $data = $request->input('student');
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->sex = $data['sex'];
            if($student->save()){
                return redirect('student/index')->with('success','修改成功！');
            }else{
                return redirect()->back()->withInput();
            }
        }
        return view('student/update',[
            'student'=>$student
        ]);
    }

    public function delete($id)
    {
        $student = Student::find($id);
        if($student){
            if(Student::destroy($id)){
                return redirect('student/index')->with('success','删除成功！');
            }else{
                return redirect('student/index')->with('error','删除失败！');
            }
        }else
            return redirect('student/index')->with('error','删除失败！');
    }
}