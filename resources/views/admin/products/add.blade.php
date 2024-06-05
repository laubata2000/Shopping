@extends('layouts.admin')

@section('title')
<title>Thêm mới sản phẩm</title>
@endsection

@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'product', 'key' => 'add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        @csrf
                        <div class="mb-3">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name">

                        </div>
                        <div class="mb-3">
                            <label>Giá</label>
                            <input type="text" class="form-control" placeholder="Giá sản phẩm" name="price">
                        </div>
                        <div class="mb-3">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control" name="feature_image_path">
                        </div>

                        <div class="mb-3">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple class="form-control" name="image_path[]">

                        </div>
                        <div class="mb-3">
                            <label>Chọn loại sản phẩm</label>
                            <select class="form-control select2_init" name="category_id">
                                <option value="0">Chọn menu cha</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Nhập tags cho sản phẩm</label>
                            <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">

                            </select>
                        </div>





                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Nhập nội dung</label>
                            <textarea class="form-control my-editor" rows="3" name="contents"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </form>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@section('js')

<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/yu3pggmvgfq1q7r7owvxclndikwjcqfbgqaoqadq7ie8dhix/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{asset('admins/product/add/add.js')}}"></script>

@endsection