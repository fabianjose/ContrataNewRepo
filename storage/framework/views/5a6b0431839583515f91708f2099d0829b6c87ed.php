<?php $__env->startSection("content-page"); ?>
<section  class="sec1" style="margin-top:200px;"> 
<div class="container">

	<div style="display:flex; flex-direction: row;flex-flow: row wrap;">
		<div style="flex: 2;min-height: 450px; ">
			
			<div style="display:flex;flex-direction: column;color:white;">
				<div style="flex: 1; height: 100%; ">
					<h1>Como funciona contrata Internet</h1>
				</div>
				<div style="flex: 2;">
					<h1>Como funciona contrata Internet</h1>
				</div>
				<div style="flex: 1;">
					<h1>Como funciona contrata Internet</h1>
				</div>
				<div style="flex: 1;">
					<h1>Como funciona contrata Internet</h1>
				</div>
				<div style="flex: 2;">
					<h1>Como funciona contrata Internet</h1>
				</div>
			</div>
		</div>
		<div style="flex: 1;">
			<div class="buscador">
				
			</div>
		</div>
	</div>

</div>
</section>
<seccion class="sec2" >
<div class="container text-center">
	<h1>Ofertas mes</h1>
	<div class=" justify-content-center container p-3" id="planes-destacados" >
                 <high-plans></high-plans>
             </div>
</div>
</seccion>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.landing", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/djmbdv/fabian/contrataNewRepo/resources/views/homepage.blade.php ENDPATH**/ ?>