

<?php $__env->startSection('title'); ?>
<title>Edit user</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('vendor/select2/select2.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('admins/users/add/add.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script src="<?php echo e(asset('vendor/select2/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('admins/users/add/add.js')); ?>"></script>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content-header', ['name' => 'user', 'key' => 'edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="<?php echo e(route('user.update',['id'=> $user->id])); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class=" mb-3">
                            <label>Tên</label>
                            <input value="<?php echo e($user->name); ?>" type="text" class="form-control" placeholder="Nhập tên người dùng" name="name">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input value="<?php echo e($user->email); ?>" type="email" class="form-control" placeholder="Nhập vào Email" name="email">
                        </div>
                        <div class="mb-3">
                            <label>Passworld</label>
                            <input value="" type="password" multiple class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            <label>Chọn vai trò</label>
                            <select name="role_id[]" class="form-control select2_init" name="" multiple="multiple">
                                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roleItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($roleItem->name); ?>" selected><?php echo e($roleItem->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                    </form>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopping\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>