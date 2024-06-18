

<?php $__env->startSection('title'); ?>
<title>Setting</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admins/slider/index/list.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('vendor/sweetAlert2/sweetalert2@11.js')); ?>"></script>
<script src="<?php echo e(asset('admins/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content-header', ['name' => 'setting', 'key' => 'List'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Add
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo e(Route('setting.create'). '?type=Text'); ?>">Text</a>
                            <a class="dropdown-item" href="<?php echo e(Route('setting.create'). '?type=Textarea'); ?>">Textarea</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($setting->id); ?></th>
                                <td><?php echo e($setting->config_key); ?></td>
                                <td><?php echo e($setting->config_value); ?></td>
                                <td>
                                    <a href="<?php echo e(route('setting.edit', ['id'=> $setting->id]). '?type=' . $setting->type); ?>" class="btn btn-default">Edit</a>
                                    <a href="#" data-url="<?php echo e(route('setting.delete', ['id'=> $setting->id])); ?>" class="btn btn-danger action_delete">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <?php echo e($settings->links()); ?>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopping\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>