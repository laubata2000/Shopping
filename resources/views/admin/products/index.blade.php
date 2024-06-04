@extends('layouts.admin')

@section('title')
<title>Sản phẩm</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'product', 'key' => 'List'])


    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ Route('product.create') }}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th scope="row">Iphone 15</th>
                                <td>20.0000</td>
                                <td><img src="" /></td>
                                <td>Điện thoại</td>
                                <td>
                                    <a href="#" class="btn btn-default">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection