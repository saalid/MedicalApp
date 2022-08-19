@extends('admin.layouts.master')

@section('title', 'users')
@section('breadcrumbs', 'کاربران')

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>نام:</strong>
            {{ $patient->first_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>نام خانوادگی:</strong>
            {{ $patient->last_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>کد ملی:</strong>
            {{ $patient->national_code }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>تلفن:</strong>
            {{ $patient->phone_number }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>سن:</strong>
            {{ $patient->age }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>قد:</strong>
            {{ $patient->height }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>وزن:</strong>
            {{ $patient->weight }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>دکتر ها:</strong>
            {{-- <label class="badge badge-success">{{ $doctors->name }}</label> --}}
            @if(!empty($doctors))
                @foreach($doctors as $doctor)
                    <label class="badge badge-success">{{ $doctor->name }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>

@stop
