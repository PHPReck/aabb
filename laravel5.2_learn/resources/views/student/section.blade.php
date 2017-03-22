@extends('public.layout') {{--继承--}}

@section('header')
    header
    @parent
@stop


@section('title')
    标题
@stop



<!--1.在模板中输出PHP值 -->

<p>{{$name}}</p>

<!-- 2.在模板中使用PHP函数 -->
<p>{{ time() }}</p>

<p>{{ isset($name) ? $name : 'default' }}</p>
等同于
<p>{{ $name1 or 'default' }}</p>

<!-- 3.原样输出 -->
<p>@{{ $name }}</p>

{{-- 4.模板中注释，在前台代码中看不到 --}}

{{-- 5.include --}}

@include('common.info',['message'=>'这里是传值信息'])

<br>

@if($name == 'a')
    我是a
    @elseif($name == 'b')
我是吧
    @else
我是谁
@endif

<br>

@for($i=0;$i<5;$i++)
    {{ $i }}
    @endfor

<br>

@foreach($students as $student)
    <p>{{ $student->name }}</p>
    @endforeach
<br>


@forelse($students as $student)
    <p>{{ $student->name }}</p>

   @empty
<p>如果$students 为空数组，则走这里</p>

    @endforelse
