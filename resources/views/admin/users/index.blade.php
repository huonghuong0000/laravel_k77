@extends('admin.layouts.main')
@section('title', 'Danh sách tài khoản')
@section('content')

<!--main-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard.index') }}">
                    <svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg>
                </a>
            </li>
            <li class="active">Danh sách thành viên</li>
        </ol>
    </div>
    {{--  <!--/.row-->  --}}

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách thành viên</h1>
        </div>
    </div>
    <!--/.row-->

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">

                        @if ($errors->any())
                        <div class="alert bg-danger" role="alert">
                            <svg class="glyph stroked cancel">
                                <use xlink:href="#stroked-cancel"></use>
                            </svg>{{ $errors->first() }}<a href="#" class="pull-right">
                                <span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                        @endif

                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Thêm Thành viên</a>
                            <table class="table table-bordered" style="margin-top:20px;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Full</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Level</th>
                                        <th width='18%'>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->phone }}00</td>
                                            <td>{{ $user->level }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-warning">
                                                    <i class="fa fa-pencil" aria-hidden="true">
                                                    </i> Sửa
                                                </a>
                                                <a onclick="return Del_user()" href="{{ route('admin.users.del', $user->id) }}" class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true">
                                                    </i> Xóa
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        Không có tài khoản nào!!!
                                    @endforelse


                                    {{-- <tr>
                                        <td>1</td>
                                        <td>Admin@gmail.com</td>
                                        <td>Nguyễn thế phúc</td>
                                        <td>Thường tín</td>
                                        <td>0356653300</td>
                                        <td>1</td>
                                        <td>
                                            <a href="#" class="btn btn-warning"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i> Sửa</a>
                                            <a href="#" class="btn btn-danger"><i class="fa fa-trash"
                                                    aria-hidden="true"></i> Xóa</a>
                                        </td>
                                    </tr> --}}

                                </tbody>
                            </table>
                            <div align='right'>
                                {{ $users->links() }}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <!--/.row-->


        </div>
    </div>
</div>
<!--end main-->

@endsection

@push('js')
    <script>
        function Del_user()
        {
            return confirm('Bạn có chắc muốn xóa user không???')
        }
    </script>
@endpush
