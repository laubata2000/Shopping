@extends('layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection
@section('js')
<script src="{{asset('vendor/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/main.js')}}"></script>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'order', 'key' => 'List'])
    <div class="container">
        <a href="{{ route('order.create') }}" class="btn btn-success float-right mb-3">Thêm đơn hàng</a>
        <h1>Danh sách đơn hàng</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Số đơn hàng</th>
                    <th>Khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('order.show', $order->id) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('order.delete', $order->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
</div>
@endsection