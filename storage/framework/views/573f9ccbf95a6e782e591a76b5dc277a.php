

<?php $__env->startSection('title'); ?>
<title>Trang chủ</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content-header', ['name' => 'category', 'key' => 'Edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="<?php echo e(route('categorys.update', ['id' => $category->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label>Tên danh mục</label>
                            <input value="<?php echo e($category->name); ?>" type="text" class="form-control" placeholder="Nhập tên danh mục" name="name">

                        </div>
                        <div class="mb-3">
                            <label>Chọn danh mục cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn danh mục cha</option>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopping\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>