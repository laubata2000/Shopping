
<?php $__env->startSection('title'); ?>
<title>Chi tiết đơn hàng</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <?php echo $__env->make('partials.content-header', ['name' => 'order', 'key' => 'Add'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <h1>Chi tiết đơn hàng #<?php echo e($order->order_number); ?></h1>
        <div class="row">
            <div class="col-md-6">
                <h3>Thông tin đơn hàng</h3>
                <p><strong>Khách hàng:</strong> <?php echo e($order->user->name); ?></p>
                <p><strong>Tổng tiền:</strong> <?php echo e(number_format($order->total_amount, 0, ',', '.')); ?> VNĐ</p>
                <p><strong>Trạng thái:</strong> <?php echo e($order->status); ?></p>
                <p><strong>Địa chỉ giao hàng:</strong> <?php echo e($order->shipping_address); ?></p>
                <p><strong>Phương thức thanh toán:</strong> <?php echo e($order->payment_method); ?></p>
            </div>
            <div class="col-md-6">
                <h3>Cập nhật trạng thái</h3>
                <form action="<?php echo e(route('order.updateStatus', $order->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <select name="status" class="form-control">
                            <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Đang chờ xử lý</option>
                            <option value="processing" <?php echo e($order->status == 'processing' ? 'selected' : ''); ?>>Đang xử lý</option>
                            <option value="completed" <?php echo e($order->status == 'completed' ? 'selected' : ''); ?>>Đã hoàn thành</option>
                            <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>Đã hủy</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật trạng thái</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopping\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>