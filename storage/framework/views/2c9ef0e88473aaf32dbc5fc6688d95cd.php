

<?php $__env->startSection('title'); ?>
<title>Trang chủ</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content-header', ['name' => 'menu', 'key' => 'add'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="<?php echo e(route('menus.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label>Tên menu</label>
                            <input type="text" class="form-control" placeholder="Nhập tên menu" name="name">

                        </div>
                        <div class="mb-3">
                            <label>Chọn menu cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn menu cha</option>
                                <?php echo $htmlOption; ?>

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopping\resources\views/admin/menus/add.blade.php ENDPATH**/ ?>