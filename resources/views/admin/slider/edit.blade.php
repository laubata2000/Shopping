@extends('layouts.admin')

@section('title')
<title>Thêm mới slider</title>
@endsection

@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'slider', 'key' => 'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{ route('slider.update', ['id'=> $slider->id]) }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        @csrf
                        <div class="mb-3">
                            <label>Tên slider</label>
                            <input value="{{ $slider->name }}" type="text" class="form-control" placeholder="Nhập tên slider" name="name">

                        </div>
                        <div class="mb-3">
                            <label>Mô tả</label>
                            <input value="{{ $slider->description }}" type="text" class="form-control" placeholder="Mô tả slider" name="description">
                        </div>
                        <div class="mb-3">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control" name="image_path">
                            <div class="col-md-4 feature_image_container">
                                <div class="row">
                                    <img class="feature_image" src=" {{ $slider->image_path}} ">
                                </div>
                            </div>
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