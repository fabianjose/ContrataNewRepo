@extends("layouts.landing")

@section("content-page")
<section class="background-seccion-0" >
 <div class="row fila-banner-0">
     <div class="col-12 col-sm-6 col-xs-12 col-lg-6 text-center">

     <div class="row ">
                <p class="titulo-banner-0 pt-5">
                     Encuentra la mejor oferta <br> de Internet en tu área
                </p>

     </div>
     <div class="row" style="">
         <p class="texto-banner-0"> Contamos con proveedores de Internet en nuestra base de datos,
             en donde podemos encontrar la combinación perfecta de Internet
                para tu área, presupuesto y necesidades de velocidad. <br>
            A continuación selecciona el uso y el tipo de servicio que aparece en 
            nuestro comparador y descubre cuánta velocidad de Internet necesitas .

        </p>

     </div>

       

      


     </div>
     <div class="col-12 col-sm-6 col-xs-12 col-lg-6 text-center align-items-center">

        <img id="img-banner-0" src="images/Mujersiluetapc.png" width="50%" alt="">

     </div>
 </div>

</section>
  <!-- ========== Start Slider ========== -->
  <section class="slider d-flex align-items-center fondo-seccion-slider" style="    background-size: contain;
    background-image: url(images/Seccion-1-Pagina-Web.jpg);
    background-repeat: no-repeat;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12">
                    <div class="text">
                        <h1 class="wow fadeInUp " style="fonr-size:30px"> ¿ Como funciona <span class="color-1">elmejorinternet.co</span>? <br>
                        </h1>
                        <p>  
                         <ul style="" class="lista-texto-home">
                            <li spam-texto-slider style="">
                            <h1 class="wow" style="font-size: 25px !important;">  <span class="color-1">1.  </span> <span class="titulos-home">Selecciona el Uso</span> </h1> 
                                <span class="spam-texto-slider ">De click en el icono que más se ajuste a su necesidad.</span> 
                            </li> <br>
                            <li spam-texto-slider style="">
                            <h1 class="wow" style="font-size: 25px !important;">  <span class="color-1">2.  </span> <span class="titulos-home">Selecciona el tipo de servicio</span> </h1> 
                                <span class="spam-texto-slider ">Elija el tipo de servicio por el que se encuentra interesado.</span> 
                            </li> <br>
                            <li spam-texto-slider style="">
                            <h1 class="wow" style="font-size: 25px !important;">  <span class="color-1">3.  </span> <span class="titulos-home">Selecciona departamento y municipio </span> </h1> 
                                <span class="spam-texto-slider ">Especifique el departamento y el municipio donde quiere instalar el servicio.</span> 
                            </li> <br>
                            <li spam-texto-slider style="">
                            <h1 class="wow" style="font-size: 25px !important;">  <span class="color-1">4.  </span> <span class="titulos-home">Compare y elija mejor opcion</span> </h1> 
                                <span class="spam-texto-slider ">Encuentre la opción ideal que se ajuste a sus necesidades.</span> 
                            </li> <br>
                        </ul>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12">
                    <div class="image">
                    @if ($errors->any())
                    <search-form :errors="{{$errors}}"/>
                    @else
                    <search-form />
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End Slider ========== -->

   
   






    





<section class="background-seccion-2" style=" background-image: url('images/Seccion-2-Pagina-Web.jpg');">

            <div class="row">
                <div class="col text-center">
                    <div class="div">
                        <h1 class="titulos-generales" style="margin-top: 46px;">Ofertas del mes</h1>
                    </div>
                </div>
            </div>

           

            <div class=" justify-content-center container p-3" id="planes-destacados"  style="margin-top: -75px;">
                 <high-plans></high-plans>
             </div>
</section>




<section class="background-seccion-3" style="    margin-top: -73px;">

            <div class="row">
                <div class="col text-center">
                    <div class="div">
                        <h1 class="titulos-generales">Servicios</h1>
                        <br> <br>
                    </div>
                </div>
            </div>
<style>
   
</style>
            <div class="row" style="justify-content: center;">
                <img class="imagen-seccion3" src="/images/mpls.png" alt="">
                <img class="imagen-seccion3" src="/images/internetsatelital.png" alt="">
                <img class="imagen-seccion3" src="/images/internet.png" alt="">
                <img class="imagen-seccion3" src="/images/television.png" alt="">
                <img class="imagen-seccion3" src="/images/telefoniaip.png" alt="">
            </div>
</section>
  
       
<section class="background-seccion-1" style=" background-image: url('images/Seccion-3-Pagina-Web.jpg');">

<div class="row" style="margin-top: 50px;">
    <div class="col-sm-12 col-12 col-lg-8" style="margin-top: 86px; ">
   <div class="container contenedor-seccion4" style="">
     <h1 class="titulo-seccion4" style="">¿por qué El mejor Internet <br> es el mejor comparador?</h1>
   
  <div class="row">
      <div>
          <p class="parrafos-seccion4">
                Nuestra misión es facilitar a todos los hogares y empresas colombianas la búsqueda del mejor proveedor en 
               telecomunicaciones, posicionándonos como la plataforma web para la solución de conectividad a nivel nacional.
          </p>
      </div>

    </div>

    <div class="row">
        
            
            <div class="container">

                
                        <div class="row mbr-justify-content-center">

                            <div class="col-lg-12 mbr-col-md-12">
                                <div class="wrap">
                                    <div class="ico-wrap">
                                    <img class="img-seccion4" src="/images/Icono-personas.png" alt="">
                                    </div>
                                    <div class="text-wrap vcenter">
                                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"><span>Encuentra lo que necesitas</span></h2>
                                        <p class="mbr-fonts-style text1 mbr-text display-6">
                                        Nuestro compromiso es mostrarte los planes que ofrecen los diferentes operadores en 
                                        telecomunicación, para que puedas encontrar el mejor servicio para tus necesidades.</p>
                                    </div>
                                </div>
                            </div>    
                        </div>

                        <div class="row mbr-justify-content-center">

                            <div class="col-lg-12 mbr-col-md-12">

                            <div class="wrap">
                                    <div class="ico-wrap">
                                    <img class="img-seccion4" src="/images/Icono-Manos.png" alt="">
                                    </div>
                                    <div class="text-wrap vcenter">
                                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"><span>Tienes el apoyo de expertos</span></h2>
                                        <p class="mbr-fonts-style text1 mbr-text display-6">
                                        Nuestros asesores te guiarán durante todo el proceso para que soluciones online
                                        cualquier duda o problema que se te presentes.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                    </div>
                                </div>
                               
                            </div>    
                        </div>

            </div>
      
       
    </div>
</div>

  
</div>





    <div class="col-sm-4 col-12" >


 
  


</div>


</div>
    
    
</section>

























            <section class="seccion-blog" id="blog" class="container">

            <div class="row " >
                <div class="col text-center ">
                    <div class="div">
                        <h1 class="titulos-generales">Nuestro Blog</h1>
                        <br><br>
                    </div>
                </div>
             </div>

             
            <?php 
	$url = "https://elmejorinternet.co/blogs/wp-json/wp/v2/posts?_embed"; $ch = curl_init($url);  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$post = curl_exec($ch);
	$post = json_decode($post,true);
?>
				<div class="row fila-blog" >


                <div class="col-12 col-md-4 col-blog2" >

                            <a href="<?php print_r($post[0]["link"]);?>"> 
						<div class="thumbnail img-blog"                        
                         style="width: 100%;background-position:center;background-size: cover; height: 230px; background-image:url('<?=$post[0]["_embedded"]["wp:featuredmedia"][0]["source_url"] ?>');" alt="">
                         </div></a>
                     <div class="col-blog">
                      <br>
                      <div class="titulo-blog limitado4">
                      <a href="<?php print_r($post[0]["link"]);?>">
                      <?php print_r($post[0]["title"]["rendered"]);?> </a>
                      </div>  

                      
                    
                        <br> 
						<div class="texto-blog limitado1">
                            
                        <?php  print_r($post[0]["excerpt"]["rendered"]);?>
                        </div>
                        <br>

                    
                        <div style="">
                          <a style="color:#2BA8E0; float: left;  font-family: poppins-regular;     text-decoration-line: underline;
                            " href="<?php print_r($post[0]["link"]);?>"> Ver mas...  </a> 
                        </div>
                            <br>

                      </div>


					</div>


 


                                  

					<div class="col-12 col-md-4  col-blog2" >

                    
                    <a href="<?php print_r($post[1]["link"]);?>"> 

						<div class="thumbnail img-blog"  style="width: 100%;background-position:center;background-size: cover; height: 230px; background-image: url('<?=$post[1]["_embedded"]["wp:featuredmedia"][0]["source_url"] ?>');" alt=""></div>
                   </a>
                        <div class="col-blog">
                      <br>
                      <div class="titulo-blog limitado5">
                      <?php print_r($post[1]["title"]["rendered"]);?>
                      </div>  

                      
                    
                        <br> 
						<div class="texto-blog limitado2">
                            
                        <?php  print_r($post[1]["excerpt"]["rendered"]);?>
                        </div>
                        <br>

                    
                        <div style="">
                           <a style="color:#2BA8E0; float: left;  font-family: poppins-regular;     text-decoration-line: underline;" href="<?php print_r($post[1]["link"]);?>"> Ver mas...  </a> 
                        </div>

<br>
                      </div>
					</div>

                    
					<div class="col-12 col-md-4 col-blog2"  >
                    <a href="<?php print_r($post[2]["link"]);?>"> 

						<div class="thumbnail img-blog" style="width: 100%;background-position:center;background-size: cover; height: 230px; background-image: url('<?=$post[2]["_embedded"]["wp:featuredmedia"][0]["source_url"] ?>');" alt=""></div>
                   </a>
                        <div class="col-blog">
                      <br>
                    <div class="titulo-blog limitado6">
                      <?php print_r($post[2]["title"]["rendered"]);?>
                     </div>  

                    	<br> 
					<div class="texto-blog limitado3">
                            
                    	<?php print_r($post[2]["excerpt"]["rendered"]);?>
                    </div>
                    <br>
                    <div style="">
                    <a style="color:#2BA8E0; float: left;  font-family: poppins-regular;     text-decoration-line: underline;" href="<?php print_r($post[2]["link"]);?>"> Ver mas...  </a> 
                        </div>
                        <br>
                     </div>
                      </div>
                    <?php ?>
               </div>
            
            </div>
 

          </section>



   <!-- 

        <div class="main-section-bg" style="position:relative;background: transparent;margin-top:-15%;" >

            
            <div class="about-section" style="background: transparent;">
                <div class="d-flex flex-column about-sub p-3" style="padding-left: 100px;
                        padding-right: 100px;">
                    <div class="fila-de-botones-sobre-buscador d-flex flex-row flex-wrap justify-content-center  text-heebo" >
                        <div class="botones-sobre-buscador col-6 col-sm-2 col-md-2 col-lg-2 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-1 text-center bg-dark-blue">1</div>
                                <p class="btn btn-1" class="col-12 col-md-8 col-lg-8 about-text  mt-1" class="texto-btn"  >
                                    
                                   Selecciona el uso
                                </p>
                            </div>
                        </div>
                        <div class="botones-sobre-buscador col-6 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-1 text-center bg-dark-blue">2</div>
                                <p class="btn btn-1" class="col-12 col-md-8 col-lg-8 about-text mt-1" class="texto-btn" >
                                    Selecciona el tipo de servicio
                                </p>
                            </div>
                        </div>
                        <div class="botones-sobre-buscador col-6 col-sm-4 col-md-4 col-lg-4 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-1 text-center bg-dark-blue">3</div>
                                <p class="btn btn-1" class="col-12 col-md-8 col-lg-8 about-text mt-1" class="texto-btn"  >
                                   Selecciona Departamento y Municipìo
                                </p>
                            </div>
                        </div>
                        <div class="botones-sobre-buscador col-6 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-1 text-center bg-dark-blue">4</div>
                                <p class="btn btn-1" class="col-12 col-md-8 col-lg-8 about-text  mt-1" class="texto-btn"   >
                                   Encuentra la Mejor Opción
                                </p>
                            </div>
                        </div>
                    </div>                
                    @if ($errors->any())
                    <search-form :errors="{{$errors}}"/>
                    @else
                    <search-form />
                    @endif
                    
                </div>
                <section class="contador1">
                <div class="bg-ic d-flex flex-row justify-content-around flex-wrap align-items-center" style="z-index:3">
                          <config-counters :counters="{{json_encode($configs)}}" class="col-10 col-sm-10 col-md-7 col-lg-7 col-xl-7"></config-counters>
                     </div>
                </section>
             
            </div>
            
            <section class="section-search mb-3" style="min-height: 500px; padding-top: 0%;margin-top: 0%;">
                
                    
                <div class=" justify-content-center container p-3" id="planes-destacados" >
                 <high-plans></high-plans>
             </div>
             <div style="    text-align: center;
"> 
    <img src="{{asset('images/logoCI-1.png')}}"    class="logo-home-2" >     
             </div>
             
            
            </section>
            <section class="section-form formulario-centro" >
                       
                    <div class="row  justify-content-center  pb-5  " style="align-items: center;">
                        <div class="col-12 col-sm-3 text-center">
                            <h5 class="text-white text-ws texto-formulario-centro1" >Resolvemos todas tus <br> dudas en una llamada</h5>
                            <h2 class="text-white text-ws texto-formulario-centro2">¡Contáctanos!</h2>
                        </div>

                        <div class="col-12 col-sm-4 px-3">
                             <input id="nombre1" style="" class="form-control text-form mt-1  p-2"  type="text" name="" placeholder="Nombre"/>
                             <input id="celular1" style="" class="form-control text-form mt-1 p-2" type="text" name="" placeholder="Celular"/>
                             <input id="email1" style="" class="form-control text-form mt-1 p-2" type="text" name="" placeholder="Email"/>
                        </div>
                        <div class="col-12 col-sm-3">
                            <button id="btn-enviar" onclick="correo2();" class="btn text-white" style="background: rgb(13,217,244);font-size: 25px;">ENVIAR</button>
                        </div>
                    </div>
<script src=""></script>
<script>

function correo2(){                   
        var nombre = document.getElementById('nombre1').value;
        var num = document.getElementById('celular1').value;
        var mensaje = document.getElementById('email1').value;
        var t= num.length; 


        if(t == 10 || t == 7){ 



        Email.send({
        SecureToken : "06009ff8-2c43-499f-865a-b92f62e04395",
        To : 'espejofabian@gmail.com',
        From : "admin@internetcolombia.co",
        Subject : "llamar al cliente ",
        Body : " El cliente es de Contrata internet El cliente se llama: " + nombre + " el numero de telefono es:  "+ num + " y el mensaje es:  " + mensaje

        }).then(


        );

          console.log('sale')
          alert("Mensaje Enviado Correctamente")
          }


          else { alert('numero escrito invalido');
                  }             

              

                }
            
</script>
                
            </section>

            <section class="contador2" style="margin-top: 0px;">
                <div class="bg-ic2 d-flex flex-row justify-content-around flex-wrap align-items-center" style="z-index:3">
                          <config-counters :counters="{{json_encode($configs)}}" class="col-10 col-sm-10 col-md-7 col-lg-7 col-xl-7"></config-counters>
                     </div>
                </section>

          
            <section class="section-blog" style="padding-top: 3rem;">
                <h1 class="text-center text-ws" style="font-weight: 800;">Nuestras Publicaciones de Blog</h1> <br>
                
            </section>-->

            




          
           
       
     
       



<style>
                         
                        </style>
                        
                        <script>
     function ellipsis_box(elemento, max_chars){
	limite_text = $(elemento).text();
	if (true)
	{
	limite = limite_text.substr(0, max_chars)+" ...";
	$(elemento).text(limite);
	}
    }
    

	$(function()
	{
	ellipsis_box(".limitado1", 213);
	});
                        </script>

<script>
     function ellipsis_box(elemento, max_chars){
	limite_text = $(elemento).text();
	if (true)
	{
	limite = limite_text.substr(0, max_chars)+" ...";
	$(elemento).text(limite);
	}
    }
    

	$(function()
	{
	ellipsis_box(".limitado2", 213);
	});
                        </script>
                           <script>
     function ellipsis_box(elemento, max_chars){
	limite_text = $(elemento).text();
	if (true)
	{
	limite = limite_text.substr(0, max_chars)+" ...";
	$(elemento).text(limite);
	}
    }
    

	$(function()
	{
	ellipsis_box(".limitado3", 250);
	});
                        </script>
                         <script>
     function ellipsis_box(elemento, max_chars){
	limite_text = $(elemento).text();
	if (true)
	{
	limite = limite_text.substr(0, max_chars)+" ...";
	$(elemento).text(limite);
	}
    }
    

	$(function()
	{
	ellipsis_box(".limitado4",80);
	});
                        </script>
                           <script>
     function ellipsis_box(elemento, max_chars){
	limite_text = $(elemento).text();
	if (true)
	{
	limite = limite_text.substr(0, max_chars)+" ...";
	$(elemento).text(limite);
	}
    }
    

	$(function()
	{
	ellipsis_box(".limitado5",80);
	});
                        </script>
                           <script>
     function ellipsis_box(elemento, max_chars){
	limite_text = $(elemento).text();
	if (true)
	{
	limite = limite_text.substr(0, max_chars)+" ...";
	$(elemento).text(limite);
	}
    }
    

	$(function()
	{
	ellipsis_box(".limitado6",80);
	});
                        </script>
@stop



