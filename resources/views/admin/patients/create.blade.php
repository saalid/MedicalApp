@extends('admin.layouts.master')

@section('title', 'patients')
@section('breadcrumbs', 'بیماران')

@section('content')

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



{!! Form::open(array('route' => 'patients.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>نام:</strong>
            {!! Form::text('first_name', null, array('placeholder' => 'نام','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
          <strong>نام خانوادگی :</strong>
          {!! Form::text('last_name', null, array('placeholder' => 'نام خانوادگی','class' => 'form-control')) !!}
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
          <strong>کد ملی :</strong>
          {!! Form::text('national_code', null, array('placeholder' => 'کد ملی','class' => 'form-control')) !!}
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
          <strong>شماره تلفن :</strong>
          {!! Form::text('phone_number', null, array('placeholder' => 'شماره تلفن','class' => 'form-control')) !!}
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
          <strong>قد :</strong>
          {!! Form::text('height', null, array('placeholder' => 'قد','class' => 'form-control')) !!}
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
          <strong>وزن :</strong>
          {!! Form::text('weight', null, array('placeholder' => 'وزن','class' => 'form-control')) !!}
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
          <strong>سن :</strong>
          {!! Form::text('age', null, array('placeholder' => 'سن','class' => 'form-control')) !!}
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
          <strong>گروه خونی :</strong>
          {!! Form::text('blood_type', null, array('placeholder' => 'گروه خونی','class' => 'form-control')) !!}
      </div>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1 text-center">
        <button type="submit" class="btn btn-primary">ذخیره</button>
    </div>
</div>
{!! Form::close() !!}
@stop
