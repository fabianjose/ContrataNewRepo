<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <!-- Hotjar Tracking Code for https://www.elmejorinternet.co -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2868214,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
<link rel="icon" type="image/png" href="<?php echo e(asset('images/favicon.png')); ?>">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name = "facebook-domain-verify" content = "u0gvvxyyq8c4fp6ewj0ml2yskwtsg3" />


    <?php if(Auth::user()): ?>
        <meta name="jwt-token" content="<?php echo e(Session::Get('JWT')); ?>">
    <?php endif; ?>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta name="re-captcha-key" content="<?php echo e(config('captcha.site_key')); ?>" >
    <!-- Base URL -->
    <meta name="description" content="buscador de internet en toda colombia"/>
    <meta name="base-url" content="<?php echo e(URL::to('/')); ?>">
    <meta name="keywords" content="contratar internet, contratar internet, internet hogar,
    internet satelital, internet para hogares, internet wifi, internet banda ancha,
    internet para negocios, internet para empresas, internet empresas, internet fibra optica,
    internet en bogota, internet para pueblos, internetpara mi casa, internet pymes,
    internet business, internet radio, internet economico, internet rapido, el internet
    mas economico de colombia, colombia internet, internet barato, tigo, claro, net2phone,
    telefonia ip, telefonia movil, voz sobre ip, telefonos grandStream, internexa, 
    azteca comunicaciones, HughesNet, ETB, Voip, telefonia en la nube, central virtual">
  <!--  <h1> <title><?php echo e(config('app.name', 'Contratar Internet')); ?></title> </h1>-->
  <title>elmejorinternet.co</title> 
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/dist/css/adminlte.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/toastr/toastr.min.css')); ?>">
    


</head>
<body>

 
    <div id="app">

      <?php echo $__env->yieldContent('content'); ?>

      <?php echo $__env->yieldContent('javascript-layout'); ?>
      <!-- View Javascript -->
      <?php echo $__env->yieldContent('javascript'); ?>

    </div>

    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/adminlte/dist/js/adminlte.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/toastr/toastr.min.js')); ?>"></script>
 
   
  
</body>

<div class="whatsapp">
            <a target="_blank"href="https://api.whatsapp.com/send?phone=573003079287&text=hola elmejorinternet.co, me gustaria saber de los planes"> <img src="<?php echo e(asset('/images/whatsapp.png')); ?>" width="67" height="67"> </a>
</div>

</html>
<?php /**PATH C:\xampp\htdocs\ContrataNewRepo\resources\views/layouts/app.blade.php ENDPATH**/ ?>