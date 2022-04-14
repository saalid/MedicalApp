@extends('admin.layouts.master')

@section('title', 'patients')
@section('breadcrumbs', 'بیماران')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="row">
  <div class="col-xs-12">
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">لیست کاربران</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>آیدی</th>
            <th>نام </th>
            <th>کد ملی</th>
            <th>شماره تلفن</th>
            <th>تاریخ </th>
            <th>عملیات</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($data as $key=>$patient)
                  <tr>
                      <td>{{ $patient->id }}</td>
                      <td>{{ $patient->first_name }} {{$patient->last_name}}</td>
                      <td>{{ $patient->national_code }}</td>
                      <td>{{ $patient->phone_number }}</td>
                      <td>{{ $patient->created_at }}</td>  
                      <td>
                        <a class="btn btn-info" href="{{ route('patients.show',$patient->id) }}">نمایش</a>
                        <a class="btn btn-warning" href="{{ route('patients.edit',$patient->id) }}">ویرایش</a>
                         {!! Form::open(['method' => 'DELETE','route' => ['patients.destroy', $patient->id],'style'=>'display:inline']) !!}
                             {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                         {!! Form::close() !!}
                     </td>
                  </tr>
              @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>آیدی</th>
            <th>نام </th>
            <th>کد ملی</th>
            <th>شماره تلفن</th>
            <th>تاریخ </th>
            <th>عملیات</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>


{!! $data->render() !!}
@stop

@section('scripts')
  <script>
    $(function () {
      $('#example1').DataTable()
    })
    
  </script>
@stop