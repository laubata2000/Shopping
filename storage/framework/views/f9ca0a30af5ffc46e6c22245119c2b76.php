

<?php $__env->startSection('title'); ?>
<title>Trang chủ</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admins/slider/index/list.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('vendor/sweetAlert2/sweetalert2@11.js')); ?>"></script>
<script src="<?php echo e(asset('admins/product/index/list.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content-header', ['name' => 'slider', 'key' => 'List'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo e(Route('slider.create')); ?>" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Slider</th>
                                <th scope="col">Desciption</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($slider->id); ?></th>
                                <td><?php echo e($slider->name); ?></td>
                                <td><?php echo e($slider->description); ?></td>
                                <td><img class="product_image_150_100" src="<?php echo e($slider->image_path); ?>" /></td>
                                <td>
                                    <a href="<?php echo e(route('slider.edit', ['id'=> $slider->id])); ?>" class="btn btn-default">Edit</a>
                                    <a href="#" data-url="<?php echo e(route('slider.delete', ['id'=> $slider->id])); ?>" class="btn btn-danger action_delete">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <?php echo e($sliders->links()); ?>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopping\resources\views/admin/slider/index.blade.php ENDPATH**/ ?>