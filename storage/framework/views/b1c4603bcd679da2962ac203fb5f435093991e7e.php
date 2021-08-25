

<?php $__env->startSection("content-page"); ?>
<?php if($count === 0): ?>
	<h1 class="text-center text-ws"  style="padding: 8rem;">No se encontraron ofertas</h1>
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
				
<?php echo $__env->make("layouts.landing", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/remotepc/contratainternet.co/resources/views/pages/planComparator.blade.php ENDPATH**/ ?>