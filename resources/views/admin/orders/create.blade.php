@extends('layouts.admin')

@section('title')
<title>Thêm mới đơn hàng</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'order', 'key' => 'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('order.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="user_id">Khách hàng</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                <option value="">Chọn khách hàng</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="total_amount">Tổng tiền</label>
                            <input type="number" class="form-control" id="total_amount" name="total_amount" step="0.01" required>
                        </div>

                        <div class="form-group">
                            <label for="shipping_address">Địa chỉ giao hàng</label>
                            <textarea class="form-control" id="shipping_address" name="shipping_address" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="payment_method">Phương thức thanh toán</label>
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                <option value="cash">Tiền mặt</option>
                                <option value="credit_card">Thẻ tín dụng</option>
                                <option value="bank_transfer">Chuyển khoản ngân hàng</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm đơn hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection