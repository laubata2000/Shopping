

<?php $__env->startSection('title'); ?>
<title>Chỉnh sửa đơn hàng</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <?php echo $__env->make('partials.content-header', ['name' => 'order', 'key' => 'Edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="<?php echo e(route('order.update', ['id' => $order->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="user_id">Khách hàng</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>" <?php echo e($order->user_id == $user->id ? 'selected' : ''); ?>>
                                    <?php echo e($user->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="order_number">Số đơn hàng</label>
                            <input type="text" class="form-control" id="order_number" name="order_number" value="<?php echo e($order->order_number); ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="total_amount">Tổng tiền</label>
                            <input type="number" class="form-control" id="total_amount" name="total_amount" step="0.01" value="<?php echo e($order->total_amount); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Đang chờ xử lý</option>
                                <option value="processing" <?php echo e($order->status == 'processing' ? 'selected' : ''); ?>>Đang xử lý</option>
                                <option value="completed" <?php echo e($order->status == 'completed' ? 'selected' : ''); ?>>Đã hoàn thành</option>
                                <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>Đã hủy</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="shipping_address">Địa chỉ giao hàng</label>
                            <textarea class="form-control" id="shipping_address" name="shipping_address" rows="3" required><?php echo e($order->shipping_address); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="payment_method">Phương thức thanh toán</label>
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                <option value="cash" <?php echo e($order->payment_method == 'cash' ? 'selected' : ''); ?>>Tiền mặt</option>
                                <option value="credit_card" <?php echo e($order->payment_method == 'credit_card' ? 'selected' : ''); ?>>Thẻ tín dụng</option>
                                <option value="bank_transfer" <?php echo e($order->payment_method == 'bank_transfer' ? 'selected' : ''); ?>>Chuyển khoản ngân hàng</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật đơn hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopping\resources\views/admin/orders/edit.blade.php ENDPATH**/ ?>