@extends('layouts.admin')

@section('title')
<title>Setting</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('admins/slider/index/list.css')}}">
@endsection
@section('js')
<script src="{{asset('vendor/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/product/index/list.js')}}"></script>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'setting', 'key' => 'List'])


    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Add
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ Route('setting.create'). '?type=Text' }}">Text</a>
                            <a class="dropdown-item" href="{{ Route('setting.create'). '?type=Textarea' }}">Textarea</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th scope="row">1</th>
                                <td>Config Key</td>
                                <td>Config Value</td>
                                <td>
                                    <a href="#" class="btn btn-default">Edit</a>
                                    <a href="#" class="btn btn-danger action_delete">Delete</a>
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