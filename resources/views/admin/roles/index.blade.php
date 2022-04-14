@extends('admin.layouts.master')

@section('title', 'roles')
@section('breadcrumbs', 'نقش ها')

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
        <h3 class="box-title">لیست نقش ها</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>آیدی</th>
            <th>نام</th>
            <th width="280px">عملیات</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">نمایش</a>
                    @can('role-edit')
                        <a class="btn btn-warning" href="{{ route('roles.edit',$role->id) }}">ویرایش</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>آیدی</th>
            <th>نام</th>
            <th width="280px">عملیات</th>
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


{!! $roles->render() !!}
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