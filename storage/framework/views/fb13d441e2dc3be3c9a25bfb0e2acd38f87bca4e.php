<?php $__env->startSection('adminlte_css_pre'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('adminlte_css'); ?>
    <?php echo $__env->yieldPushContent('css'); ?>
    <?php echo $__env->yieldContent('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('classes_body', 'login-page'); ?>


<?php $__env->startSection('body'); ?>

<div class="login-box">
        <div class="login-logo">
            <a href="/"><?php echo config('adminlte.logo', '<b>Admin</b>LTE'); ?></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Inicia Sesión</p>
                <form action="/login" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" value="" placeholder="Nombre de usuario" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <?php if(false): ?>
                            <div class="invalid-feedback">
                                Nombre de usuario inválido
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <!-- <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember"><?php echo e(__('adminlte::adminlte.remember_me')); ?></label>
                            </div> -->
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                <?php echo e(__('adminlte::adminlte.sign_in')); ?>

                            </button>
                        </div>
                    </div>
                </form>
                <!-- <p class="mt-2 mb-1">
                  <a href="/">
                    <?php echo e(__('adminlte::adminlte.i_forgot_my_password')); ?>

                  </a>
                </p> -->
                <?php if($errors->any()): ?>
                <h6><?php echo e($errors->first()); ?></h6>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('adminlte_js'); ?>
    <script src="<?php echo e(asset('vendor/adminlte/dist/js/adminlte.min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('js'); ?>
    <?php echo $__env->yieldContent('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\contratainternetDefinitivo\resources\views/auth/login.blade.php ENDPATH**/ ?>