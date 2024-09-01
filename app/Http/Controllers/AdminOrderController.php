<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }
    public function create()
    {
        $users = \App\Models\User::all();
        return view('admin.orders.create', compact('users'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric|min:0',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $order = new Order();
        $order->user_id = $validatedData['user_id'];
        $order->order_number = 'ORD-' . strtoupper(uniqid());
        $order->total_amount = $validatedData['total_amount'];
        $order->shipping_address = $validatedData['shipping_address'];
        $order->payment_method = $validatedData['payment_method'];
        $order->status = 'pending';
        $order->save();

        return redirect()->route('order.index')->with('success', 'Đơn hàng mới đã được tạo thành công với số đơn hàng: ' . $order->order_number);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('order.show', $id)->with('success', 'Trạng thái đơn hàng đã được cập nhật thành công.');
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Đơn hàng đã được xóa thành công.');
    }
}
