

<?php $__env->startSection('title'); ?>
<title>Quản lý Bình luận/Đánh giá Sản phẩm</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <?php echo $__env->make('partials.content-header', ['name' => 'Bình luận/Đánh giá', 'key' => 'Danh sách'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo e(route('product-review.create')); ?>" class="btn btn-success float-right m-2">Thêm mới bình luận/đánh giá</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Người dùng</th>
                                <th scope="col">Đánh giá</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($review->id); ?></th>
                                <td><?php echo e($review->product->name); ?></td>
                                <td><?php echo e($review->user->name); ?></td>
                                <td><?php echo e($review->rating); ?>/5</td>
                                <td><?php echo e($review->title); ?></td>
                                <td><?php echo e(Str::limit($review->review_text, 50)); ?></td>
                                <td>
                                    <a href="<?php echo e(route('product-review.show', $review->id)); ?>" class="btn btn-info btn-sm">Xem</a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); if(confirm('Bạn có chắc muốn xóa đánh giá này?')) document.getElementById('delete-form-<?php echo e($review->id); ?>').submit();">Xóa</a>
                                    <form id="delete-form-<?php echo e($review->id); ?>" action="<?php echo e(route('product-review.delete', $review->id)); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($reviews->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopping\resources\views/admin/product-reviews/index.blade.php ENDPATH**/ ?>