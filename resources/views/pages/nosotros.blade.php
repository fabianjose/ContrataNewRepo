@extends("layouts.landing")

@section("content-page")
<meta name="keywords" content="contrata internet, contratar internet, internet hogar,
    internet satelital, internet para hogares, internet wifi, internet banda ancha,
    internet para negocios, internet para empresas">
<div class="d-flex flex-column nosotros-main w-100">
	<div class="d-flex  align-items-end w-100 nosotros-title p-5">
		<h2 class="font-weight-bold text-white nosotros-title-text">Nosotros</h2>
	</div>
	
			<br><br><br>
			<div class="container">


				<div class="row justify-content-center align-items-center ">
				
									
									<div class="col-12 col-sm-8 text-center">

										<h1 class="titulo-nosotros" >   

											¿Por qué contratainternet?


										</h1>

										

										<p class="texto-nosotros" >

											Creemos que Internet de banda ancha debería estar disponible para
											todos los Colombianos. <b>  Esto es lo 
											que estamos haciendo para que sea una realidad.</b>
											</p>

								
									 </div>

										
									
									<div class="col-12 col-sm-4">
											<div>
											<img src="{{url('images/Porque-contrataInternet.jpg')}}" class="img-fluid" >
											</div>
									</div>
				</div>
				<br><br><br>

				<div class="row justify-content-center align-items-center ">


											<div class="col-12 col-sm-4 order-2 ">
													<div>
													<img src="{{url('images/Mision.jpg')}}" class="img-fluid" >
													</div>
											</div>
						
									
									<div class="col-12  col-sm-8 text-center  order-1  order-sm-12">

											<h1 class="titulo-nosotros" >   

												Misión

											</h1>

										

										<p class="texto-nosotros" >

										Facilitar a todos los hogares y empresas Colombianas <b>  la 
										búsqueda del mejor proveedor en telecomunicaciones </b>,
										 posicionándonos como la plataforma web más buscada
										  para la solución de conectividad a nivel nacional. </p> 

									</div>

										
									
									
				</div>
				<br><br><br>

				<div class="row justify-content-center align-items-center ">
				
									
						<div class="col-12 col-sm-8 text-center">

							<h1 class="titulo-nosotros">   

								Visión

							</h1>

						

									<p class="texto-nosotros" >

									Posicionarnos como la plataforma web más utilizada a nivel 
									global, siendo <b>  el metabuscador más rentable, generando a 
									nuestros usuarios la facilidad de encontrar el mejor proveedor
									 de telecomunicaciones </b>, sin importar el lugar del mundo en el
									  que se encuentre.
								</p>

							</div>

					
				
							<div class="col-12 col-sm-4">
									<div>
									<img src="{{url('images/Vision.jpg')}}" class="img-fluid" >

									</div>
							</div>
					</div>


				</div>
				<br><br><br>
			</div>


			<div class="d-flex flex-column nosotros-services-bg p-4 align-items-center">
		<h4 class="nosotros-services-title my-2">SERVICIOS OFRECIDOS</h4>
		<div class="d-flex flex-wrap justify-content-center mt-4 p-4">
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 d-flex align-items-center justify-content-center p-2">
				<img src="{{url('images/service-1.png')}}" class="img-nosotros-services">
				<div class="pl-2 d-flex flex-column" style="text-align: center;">
					<span class="text-uppercase font-weight-bold text-black">MPLS</span>
					<button type="button" class="btn rounded-pill text-uppercase nosotros-service-text text-sm nosotros-service-btn">Ver Ofertas</button>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 d-flex align-items-center justify-content-center p-2">
				<img src="{{url('images/service-222.png')}}" class="img-nosotros-services">
				<div class="pl-2 d-flex flex-column" style="text-align: center;">
					<span class="text-uppercase font-weight-bold text-black">Internet satelital</span>
					<button type="button" class="btn rounded-pill text-uppercase nosotros-service-text text-sm nosotros-service-btn">Ver Ofertas</button>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 d-flex align-items-center justify-content-center p-2">
				<img src="{{url('images/service-3.png')}}" class="img-nosotros-services">
				<div class="pl-2 d-flex flex-column" style="text-align: center;">
					<span class="text-uppercase font-weight-bold text-black">Telefonía IP</span>
					<button type="button" class="btn rounded-pill text-uppercase nosotros-service-text text-sm nosotros-service-btn">Ver Ofertas</button>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 d-flex align-items-center justify-content-center p-2">
				<img src="{{url('images/service-4.png')}}" class="img-nosotros-services">
				<div class="pl-2 d-flex flex-column" style="text-align: center;">
					<span class="text-uppercase font-weight-bold text-black">Internet</span>
					<button type="button" class="btn rounded-pill text-uppercase nosotros-service-text text-sm nosotros-service-btn">Ver Ofertas</button>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 d-flex align-items-center justify-content-center p-2">
				<img src="{{url('images/service-5.png')}}" class="img-nosotros-services">
				<div class="pl-2 d-flex flex-column" style="text-align: center;">
					<span class="text-uppercase font-weight-bold text-black">Televisión</span>
					<button type="button" class="btn rounded-pill text-uppercase nosotros-service-text text-sm nosotros-service-btn">Ver Ofertas</button>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
