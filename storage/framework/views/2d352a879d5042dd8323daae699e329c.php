

<?php $__env->startSection('title'); ?>
<title>Thêm mới slider</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('vendor/select2/select2.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('admins/product/add/add.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content-header', ['name' => 'slider', 'key' => 'Edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="<?php echo e(route('slider.update', ['id'=> $slider->id])); ?>" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label>Tên slider</label>
                            <input value="<?php echo e($slider->name); ?>" type="text" class="form-control" placeholder="Nhập tên slider" name="name">

                        </div>
                        <div class="mb-3">
                            <label>Mô tả</label>
                            <input value="<?php echo e($slider->description); ?>" type="text" class="form-control" placeholder="Mô tả slider" name="description">
                        </div>
                        <div class="mb-3">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control" name="image_path">
                            <div class="col-md-4 feature_image_container">
                                <div class="row">
                                    <img class="feature_image" src=" <?php echo e($slider->image_path); ?> ">
                                </div>
                            </div>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopping\resources\views/admin/slider/edit.blade.php ENDPATH**/ ?>