@extends('admin.layouts.master')

@section('title', 'users')

@section('content')
    <p>کاربران</p>
    <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">جدول داده مثال ۲</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>آیدی</th>
                  <th>نام</th>
                  <th>ایمیل</th>
                  <th>تاریخ ثبت نام</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>آیدی</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>تاریخ ثبت نام</th>
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
@stop