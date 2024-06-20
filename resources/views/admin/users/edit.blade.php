@extends('layouts.admin')

@section('title')
<title>Edit user</title>
@endsection
@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/users/add/add.css')}}" rel="stylesheet" />
@endsection
@section('js')

<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('admins/users/add/add.js')}}"></script>


@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'user', 'key' => 'edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('user.update',['id'=> $user->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class=" mb-3">
                            <label>Tên</label>
                            <input value="{{$user->name}}" type="text" class="form-control" placeholder="Nhập tên người dùng" name="name">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input value="{{$user->email}}" type="email" class="form-control" placeholder="Nhập vào Email" name="email">
                        </div>
                        <div class="mb-3">
                            <label>Passworld</label>
                            <input value="" type="password" multiple class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            <label>Chọn vai trò</label>
                            <select name="role_id[]" class="form-control select2_init" name="" multiple="multiple">
                                @foreach($user->roles as $roleItem)
                                <option value="{{ $roleItem->name }}" selected>{{$roleItem->name }}</option>
                                @endforeach

                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                    </form>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection