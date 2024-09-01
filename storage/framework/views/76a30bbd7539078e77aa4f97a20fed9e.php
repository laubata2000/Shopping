

<?php $__env->startSection('title'); ?>
<title>Thêm mới đơn hàng</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <?php echo $__env->make('partials.content-header', ['name' => 'order', 'key' => 'Add'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="<?php echo e(route('order.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="user_id">Khách hàng</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                <option value="">Chọn khách hàng</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopping\resources\views/admin/orders/create.blade.php ENDPATH**/ ?>