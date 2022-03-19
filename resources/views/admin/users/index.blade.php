@extends('admin.layouts.master')

@section('title', 'users')
@section('breadcrumbs', 'کاربران')

@section('content')
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
                  <th>نام</th>
                  <th>ایمیل</th>
                  <th>تاریخ ثبت نام</th>
                  <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td><a href="{{ route('users.show', $user->id) }}"><span class="btn btn-warning fa fa-edit pull-right"></span></a>
                              <form action="{{ route('users.destroy', $user->id)}}" method="post">
                              @method('DELETE')
                              @csrf
                              <button type="submit" class="btn btn-danger fa fa-trash pull-right"></button>
                            </form>
                          </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>آیدی</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>تاریخ ثبت نام</th>
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
@stop

@section('scripts')
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
    
  </script>
@stop