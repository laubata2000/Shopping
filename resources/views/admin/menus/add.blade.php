@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'menu', 'key' => 'add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('menus.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label>Tên menu</label>
                            <input type="text" class="form-control" placeholder="Nhập tên menu" name="name">

                        </div>
                        <div class="mb-3">
                            <label>Chọn menu cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn menu cha</option>
                                {!! $htmlOption !!}
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