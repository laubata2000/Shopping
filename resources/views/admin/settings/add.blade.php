@extends('layouts.admin')

@section('title')
<title>Thêm mới setting</title>
@endsection
@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'setting', 'key' => 'add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('setting.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class=" mb-3">
                            <label>Config key</label>
                            <input value="{{old('config_key')}}" type="text" class="form-control @error('config_key') is-invalid @enderror" placeholder="Config key" name="config_key">
                            @error('config_key')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @if(request()->type === 'Text')
                        <div class="mb-3">
                            <label>Config value</label>
                            <input value="{{old('config_value')}}" type="text" class="form-control @error('config_value') is-invalid @enderror" placeholder="Config value" name="config_value">
                            @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @elseif(request()->type === 'Textarea')
                        <div class="mb-3">
                            <label>Config value</label>
                            <textarea rows="5" type="text" class="form-control @error('config_value') is-invalid @enderror" placeholder="Config value" name="config_value">{{old('config_value')}}</textarea>
                            @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
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