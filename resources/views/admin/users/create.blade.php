@extends('admin.layouts.main')
@section('title', 'Thêm tài khoản')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Thành viên</h1>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
        <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fas fa-user"></i> Thêm thành viên
                    </div>
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="panel-body">
                            <div class="row justify-content-center" style="margin-bottom:40px">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>password</label>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input type="full" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="address" name="address" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="phone" name="phone" class="form-control">
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" class="form-control">
                                            <option value="1">Admin</option>
                                            <option value="2">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                        <button class="btn btn-success"  type="submit">Thêm thành viên</button>
                                        <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    </div>

@endsection