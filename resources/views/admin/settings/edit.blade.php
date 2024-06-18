@extends('layouts.admin')

@section('title')
<title>Edit setting</title>
@endsection
@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'setting', 'key' => 'edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('setting.update', ['id'=> $setting->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class=" mb-3">
                            <label>Config key</label>
                            <input value="{{$setting->config_key}}" type="text" class="form-control @error('config_key') is-invalid @enderror" placeholder="Config key" name="config_key">

                        </div>
                        @if(request()->type === 'Text')
                        <div class="mb-3">
                            <label>Config value</label>
                            <input value="{{$setting->config_value}}" type="text" class="form-control @error('config_value') is-invalid @enderror" placeholder="Config value" name="config_value">
                            @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @elseif(request()->type === 'Textarea')
                        <div class="mb-3">
                            <label>Config value</label>
                            <textarea rows="5" type="text" class="form-control @error('config_value') is-invalid @enderror" placeholder="Config value" name="config_value">{{$setting->config_value}}</textarea>
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