
<?php $__env->startSection('title'); ?>
<title>Trang chủ</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('vendor/sweetAlert2/sweetalert2@11.js')); ?>"></script>
<script src="<?php echo e(asset('admins/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <?php echo $__env->make('partials.content-header', ['name' => 'order', 'key' => 'List'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <a href="<?php echo e(route('order.create')); ?>" class="btn btn-success float-right mb-3">Thêm đơn hàng</a>
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
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->id); ?></td>
                    <td><?php echo e($order->order_number); ?></td>
                    <td><?php echo e($order->user->name); ?></td>
                    <td><?php echo e(number_format($order->total_amount, 0, ',', '.')); ?> VNĐ</td>
                    <td><?php echo e($order->status); ?></td>
                    <td>
                        <a href="<?php echo e(route('order.show', $order->id)); ?>" class="btn btn-info btn-sm">Xem</a>
                        <a href="<?php echo e(route('order.delete', $order->id)); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($orders->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopping\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>