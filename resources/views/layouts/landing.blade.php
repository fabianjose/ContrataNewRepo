@extends('layouts.app')
@section('content')
    <meta name="description" content=""/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
   
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,300;0,600;0,700;1,200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js" ></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151798596-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-151798596-4');
</script>

<meta name="keywords" content="contrata internet, contratar internet, internet hogar,
    internet satelital, internet para hogares, internet wifi, internet banda ancha,
    internet para negocios, internet para empresas, internet empresas, internet fibra optica,
    internet en bogota, internet para pueblos, internetpara mi casa, internet pymes,
    internet business, internet radio, internet economico, internet rapido, el internet
    mas economico de colombia, colombia internet, internet barato, tigo, claro, net2phone,
    telefonia ip, telefonia movil, voz sobre ip, telefonos grandStream, internexa, 
    azteca comunicaciones, HughesNet, ETB, Voip, telefonia en la nube, central virtual">

<!-- Load Facebook SDK for JavaScript -->

<div class="header-classic fixed-top navbar-light wow fadeInDown">
            <!-- navigation start -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <nav class="navbar navbar-expand-lg navbar-classic">
                            <a class="navbar-brand" href="https://elmejorinternet.co/">
                               <!-- <img src="assets/img/saas-1/logo.png" alt="">-->
                                <img src="/images/el_mejor_internet_co-06.png" width="210px" alt="">
                            </a>
                            <button
                                class="navbar-toggler collapsed"
                                type="button"
                                data-toggle="collapse"
                                data-target="#navbar-classic"
                                aria-controls="navbar-classic"
                                aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="icon-bar top-bar mt-0"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbar-classic">
                                <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-3">
                                    
                                    <li class="nav-item dropdown">
                                        <a
                                            class="nav-link " style="color:#145b77"
                                            href="https://elmejorinternet.co/"
                                            id="menu-2"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Home
                                        </a>
                                      
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a
                                            class="nav-link " style="color:#145b77"
                                            href="#"
                                            id="menu-1"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Oferta del mes
                                        </a>
                                      
                                    </li>


                                    <li class="nav-item">
                                        <a class="nav-link " style="color:#145b77" href="https://elmejorinternet.co/blogs/speedtest/">Speedtest</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color:#145b77" href="https://elmejorinternet.co/blogs/">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color:#145b77" href="tel:+576017868510">PBX: +57(1)7868510</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- navigation close -->
        </div>


    <div class="content" style="padding-top: 80px;"  >



     

        @yield('content-page')

        <div class="footer-bg">


        <div class="row">
                  <div class="col-sm-3 col-lg-3  col-12 col-xs-12 " style="text-align: center; ">
                            <div class="text-center">
                                  <img src="{{asset('images/el_mejor_internet_co-07.png')}}" class="img-responsive text-center" style="max-width: 65%;">
                      
                              </div>
                        
                              <h3 class="text-ws1 text-justify text-gray" style="font-size:16px;font-weight: 100;color: #D6D8DB;">
                              Nuestra misión es facilitar a todos 
                              los hogares y empresas colombianas la búsqueda del mejor
                              proveedor en telecomunicaciones, posicionándonos como la plataforma web para la solución de 
                              conectividad a nivel nacional.</h3>
                            
                        
                  </div>


          <div class="col-sm-3 col-lg-3  col-12  col-xs-12 columna-footer-central" style="">
            <div class="continer">

          <div class="row" style="    place-content: center; padding-top: 25px; text-align: left;">
               <ul class="  list-unstyled" style="font-size: 1.25rem;">
                                  
        <li class="" > <a href="" style=" font-size: 21px;   font-weight: 100;   color: rgb(214, 216, 219);">Home  </a>    </li>

        <li class=""> <a href="" style=" font-size: 21px;   font-weight: 100;   color: rgb(214, 216, 219);">  Oferta de mes </a>  </li>
                
        <li class=""> <a href="" style=" font-size: 21px;   font-weight: 100;   color: rgb(214, 216, 219);"> SpeedTest </a>     </li>
        
       <li class="" > <a href="" style=" font-size: 21px;   font-weight: 100;   color: rgb(214, 216, 219);"> Blog   </a>    </li>
                                  
                  </ul>
          </div>
         
                 
                  </div>
          </div>



          <div class="col-sm-6 col-lg-6  col-12 col-xs-12">



                  <div class="row">
                    <div class="col-xs-12 col-12 col-sm-6 col-lg-6">
                          <div> 
                            <p class="texto-footer-form">¿quieres hacer parte de nuestro comparador?</p>   
                            <p style="color:#d6d8db !important">Dejanos tus datos en el siguiente formulario y un asesor se pondra en contacto con usted</p>      
                        </div>

                    </div>
                    <div class="col-xs-12 col-12 col-sm-6 col-lg-6">
                        <div class=" my-2  order-1  order-sm-12 ">
                          <ul class="footer-list">
                              <form action="../conta.php" method="post"> 
                              <label for="" class="texto-form-footer">Nombre</label>
                                <li><input type="text" id="nombre"  placeholder="" class="input-text-footer" name="nombre"/></li>
                                <label for="" class="texto-form-footer">Empresa</label>
                                <li><input id="empresa"  type="text" placeholder=""  class="input-text-footer" name="empresa"/></li>
                                <label for="" class="texto-form-footer">Correo</label>
                                <li><input id="correo"  type="mail" placeholder=""  class="input-text-footer" name="correo"/></li>
                                <label for="" class="texto-form-footer">Telefono</label>
                                <li><input id="telefono"  type="text" placeholder=""  class="input-text-footer" name="telefono"/></li>
                                <label for="" class="texto-form-footer">Ciudad</label>
                                <li><input id="ciudad"  type="text" placeholder=""  class="input-text-footer" name="ciudad"/></li>
                                
                                <li>
                                  <button   type="submit" name="submit"   class="btn btn-footer mt-2 ">enviar</button>  
                                </li>
                                
                              </form>
          

                              
                          </ul>

                        </div>

                    </div>
                  </div>
                        
                
                    

          </div>
        </div>

         

            




            </div>
      
 


 
        <div id="fb-root"></div> 
      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="173001153127662"
  logged_in_greeting="Bienvenido, Cuentanos en que podemos ayudarte?"
  logged_out_greeting="Bienvenido, Cuentanos en que podemos ayudarte?">

      </div>

       </a>

        <!--div class="whatsapp">
            <a target="_blank"href="https://api.whatsapp.com/send?phone=573212120281&text=hola, me gustaria saber de los planes"> <img src="{{asset('/images/whatsapp.png')}}" width="67" height="67"> </a>
        </div>
        <button type="button" id="btn-modal333" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#MyModal333"  >
  Launch demo
</button-->
  
	    <!-- Modal -->
      <div class="modal fade" id="MyModal333" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
                </div>
                <div class="modal-body">
                    <img src="https://teledisca.com/imagenes/seminario-web.png" width="100%" alt="">
                <a href="https://internexa.zoom.us/webinar/register/8216269612472/WN_K9QkUNMqThy-NgqtYlyMQw">  <p style="font-size: 3em;
                    text-align: center;">Inscripción al seminario web</p> </a>    
                </div>
                <div class="modal-footer"><button class="btn btn-default" data-dismiss="modal"
                        type="button">Close</button>
                </div>
            </div>
        </div>
    </div>

<!-- Button trigger modal -->

<!-- Button trigger modal -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  

   
      <script >
        window.fbAsyncInit = function() {
          FB.init({ 
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));



/********************************************/
window.onscroll = function() {
  var y = window.scrollY;
  console.log(y);
  if(y > 70){
    
  
$("#nav-grande").addClass("fixed-top"); 
$("#nav-grande").css({'height':'105px'});
    

  }   else {     $("#nav-grande").removeClass("fixed-top");
    $("#nav-grande").css({'height':'66px'});

   
               
};}



      </script>

   
      

@stop
