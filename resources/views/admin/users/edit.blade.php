@extends('admin.layouts.master')

@section('title', 'users')
@section('breadcrumbs', 'کاربران')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <a class="btn btn-primary" href="{{ route('users.index') }}"> برگشت </a>
      </div>
  </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>اخطار!</strong>بعضی موارد اشتباه است.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>نام:</strong>
          {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>ایمیل:</strong>
          {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>رمز عبور:</strong>
          {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>تکرار رمز عبور:</strong>
          {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>نقش:</strong>
          {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary">ذخیره</button>
  </div>
</div>
{!! Form::close() !!}

@stop
