<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <?php echo $__env->yieldContent('title'); ?>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/dist/css/adminlte.min.css')); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="<?php echo e(asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>

    <style>
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
        }

        .alert.hiding {
            transform: translateX(100%);
            opacity: 0;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.siderbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>

        <div class="content-wrapper">
            <?php echo $__env->make('partials.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Nội dung tiếp theo của content-wrapper -->

            <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="<?php echo e(asset('adminlte/plugins/jquery/jquery.min.js')); ?>"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo e(asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(asset('adminlte/dist/js/adminlte.min.js')); ?>"></script>
        <?php echo $__env->yieldContent('js'); ?>
        <script>
            // Auto-hide flash messages after 5 seconds with slide effect
            $(document).ready(function() {
                setTimeout(function() {
                    $('.alert').each(function() {
                        $(this).addClass('hiding');
                        var $alert = $(this);
                        setTimeout(function() {
                            $alert.remove();
                        }, 500); // Remove after transition completes
                    });
                }, 2000); // 2000 milliseconds = 2 seconds
            });
        </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\shopping\resources\views/layouts/admin.blade.php ENDPATH**/ ?>