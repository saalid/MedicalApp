@extends('admin.layouts.master')

@section('title', 'users')
@section('breadcrumbs', 'کاربران')

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
            <th>نام</th>
            <th>ایمیل</th>
            <th>نقش</th>
            <th>عملیات</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($data as $key=>$user)
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v)
                             <label class="badge badge-success">{{ $v }}</label>
                          @endforeach
                        @endif
                      </td>
                      <td>
                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">نمایش</a>
                        <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}">ویرایش</a>
                         {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                             {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                         {!! Form::close() !!}
                     </td>
                  </tr>
              @endforeach
          </tbody>
          <tfoot>
          <tr>
              <th>آیدی</th>
              <th>نام</th>
              <th>ایمیل</th>
              <th>نقش ها</th>
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