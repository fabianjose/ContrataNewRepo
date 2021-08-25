<?php $__env->startSection("content-page"); ?>
<?php if($count === 0): ?>


<div class="container">
<div class="container">
<div class="container">
<div class="container">
<div class="container">
<div class="container">


<div class="container">
        <div class="card bg-dark text-white">
        <img class="card-img" src="<?php echo e(url('images/fondo.jpg')); ?>" alt="Card image">
        <div class="card-img-overlay">
        <div class="row text-center sin-resultados-1">
            <div class="col">
              
                                <h1 class="" style="font-size: 2vw;">                     No se han encontrado planes para la selección que hicistes.
                                </h1>
            </div>
        </div>
        <br>
        <div class="row text-center sin-resultados-2">
            
            <div class="col">
                <a href="/">             <img class="card-img" src="<?php echo e(url('images/icono-sinresultado-5.png')); ?>"  alt="Card image" style="width: 60%;"></a>
            </div>
        </div>
        <br>
        <div class="row text-center sin-resultados-3">
            
            <div class="col">
            <img class="card-img" src="<?php echo e(url('images/icono-sinresultado-1.png')); ?>"  alt="Card image" style="width: 60%;">

            </div>
            <div class="col">
            <img class="card-img" src="<?php echo e(url('images/icono-sinresultado-2.png')); ?>"  alt="Card image" style="width: 60%;">
            </div>
            <div class="col">
            <img class="card-img" src="<?php echo e(url('images/icono-sinresultado-3.png')); ?>"  alt="Card image" style="width: 60%;">
            </div>
            <div class="col">
            <img class="card-img" src="<?php echo e(url('images/icono-sinresultado-4.png')); ?>"  alt="Card image" style="width: 60%;">
            </div>
        </div>
  <br>  
        <div class="row text-center sin-resultados-4">
            <div class="col">
            <div class="col">

            <a href="https://api.whatsapp.com/send?phone=573212120281&text=hola, me gustaria saber de los planes"> <img class="card-img" src="<?php echo e(url('images/icono-sinresultado-6.png')); ?>"  alt="Card image" style="width: 60%;"></a>
            </div>
            </div>
        </div>
        </div>
        </div>

</div>

</div>
</div>
</div>
</div>
</div>
</div>

<style>


<?php else: ?>
    <offers-filter :pagination="<?php echo e($pagination->toJson()); ?>" :fields="<?php echo e($fields); ?>" 
        query="<?php echo e($query); ?>" :lastpage="<?php echo e($last_page); ?>" :providers="<?php echo e($providers); ?>"
        :technologies = "<?php echo e($technologies); ?>"
        :speeds="<?php echo e(json_encode($speeds)); ?>"
        :max_price="<?php echo e($max_price); ?>"
        :min_price="<?php echo e($min_price); ?>" >
    </offers-filter>
<?php endif; ?>

<?php $__env->stopSection(); ?>
				
<?php echo $__env->make("layouts.landing", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\contratainternetDefinitivo\resources\views/pages/planComparator.blade.php ENDPATH**/ ?>