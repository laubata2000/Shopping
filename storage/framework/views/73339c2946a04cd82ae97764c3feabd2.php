<?php $__env->startSection('title'); ?>
<title>Thêm mới sản phẩm</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('vendor/select2/select2.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('admins/product/add/add.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content-header', ['name' => 'product', 'key' => 'Edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="<?php echo e(route('products.update', ['id'=> $product->id])); ?>" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label>Tên sản phẩm</label>
                            <input value="<?php echo e($product->name); ?>" type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name">

                        </div>
                        <div class="mb-3">
                            <label>Giá</label>
                            <input value="<?php echo e($product->price); ?>" type="text" class="form-control" placeholder="Giá sản phẩm" name="price">
                        </div>
                        <div class="mb-3">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control" name="feature_image_path">
                            <div class="col-md-4 feature_image_container">
                                <div class="row">
                                    <img class="feature_image" src=" <?php echo e($product->feature_image_path); ?> ">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple class="form-control" name="image_path[]">
                            <div class="col-md-12 detail_image_container">
                                <div class="row">
                                    <?php $__currentLoopData = $product->productImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImageItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3">
                                        <img class="image_detail_product" src="<?php echo e($productImageItem->image_path); ?>" alt="">
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Chọn loại sản phẩm</label>
                            <select class="form-control select2_init" name="category_id">
                                <option value="0">Chọn menu cha</option>
                                <?php echo $htmlOption; ?>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Nhập tags cho sản phẩm</label>
                            <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagsItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tagsItem->name); ?>" selected><?php echo e($tagsItem->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Nhập nội dung</label>
                            <textarea class="form-control my-editor" rows="3" name="contents"><?php echo e($product->content); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </form>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script src="<?php echo e(asset('vendor/select2/select2.min.js')); ?>"></script>
<script src="https://cdn.tiny.cloud/1/yu3pggmvgfq1q7r7owvxclndikwjcqfbgqaoqadq7ie8dhix/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="<?php echo e(asset('admins/product/add/add.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopping\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>