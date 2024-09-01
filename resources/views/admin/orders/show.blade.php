@extends('layouts.admin')
@section('title')
<title>Chi tiết đơn hàng</title>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'order', 'key' => 'Add'])
    <div class="container">
        <h1>Chi tiết đơn hàng #{{ $order->order_number }}</h1>
        <div class="row">
            <div class="col-md-6">
                <h3>Thông tin đơn hàng</h3>
                <p><strong>Khách hàng:</strong> {{ $order->user->name }}</p>
                <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</p>
                <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
                <p><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</p>
                <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
            </div>
            <div class="col-md-6">
                <h3>Cập nhật trạng thái</h3>
                <form action="{{ route('order.updateStatus', $order->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <select name="status" class="form-control">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Đang chờ xử lý</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Đã hoàn thành</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật trạng thái</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection