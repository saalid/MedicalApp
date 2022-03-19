@extends('admin.layouts.master')

@section('title', 'users')
@section('breadcrumbs', 'کاربران')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">ویرایش اطلاعات کاربر {{$user->name}}</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    {{ method_field('PUT') }}
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">نام</label>
        <input name="name" type="text" class="form-control" value="{{ $user->name }}" placeholder="نام">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">ایمیل</label>
        <input name="email" type="email" class="form-control" value="{{ $user->email }}"  placeholder="ایمیل">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">رمز عبور</label>
        <input name="password" type="password" class="form-control" value="{{ $user->password }}" placeholder="رمز عبور">
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">ارسال</button>
    </div>
  </form>
</div>
@stop
