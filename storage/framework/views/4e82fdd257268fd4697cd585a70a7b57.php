

<?php $__env->startSection('title'); ?>
<title>Thêm mới Bình luận/Đánh giá Sản phẩm</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <?php echo $__env->make('partials.content-header', ['name' => 'Bình luận/Đánh giá', 'key' => 'Thêm mới'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="<?php echo e(route('product-review.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="user_id">Người dùng</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                <option value="">Chọn người dùng</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="product_id">Sản phẩm</label>
                            <select class="form-control" id="product_id" name="product_id" required>
                                <option value="">Chọn sản phẩm</option>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="rating">Đánh giá</label>
                            <select class="form-control" id="rating" name="rating" required>
                                <option value="">Chọn đánh giá</option>
                                <option value="1">1 sao</option>
                                <option value="2">2 sao</option>
                                <option value="3">3 sao</option>
                                <option value="4">4 sao</option>
                                <option value="5">5 sao</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="review_text">Nội dung đánh giá</label>
                            <textarea class="form-control" id="review_text" name="review_text" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="images">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                            <div id="image-preview" class="mt-3 d-flex flex-wrap">
                                <!-- Preview images will be displayed here -->
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Thêm đánh giá</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    // Bạn có thể thêm JavaScript ở đây nếu cần
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopping\resources\views/admin/product-reviews/create.blade.php ENDPATH**/ ?>