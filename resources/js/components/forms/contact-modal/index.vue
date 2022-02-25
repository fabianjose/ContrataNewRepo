<template>
   <div class="modal fade" id="modalConsultOffer" aria-modal="true">
      <div class="modal-dialog modal-dialog-centered modal-xl modal-xl-xl d-flex flex-row justify-content-center align-items-center">
         <div class="consult-card p-0 flex-wrap modal-content" style="
                                                                     overflow: hidden;                                                                    
                                                                     border-radius: 0px !important;                                                                  
                                                                     background-color: #ecece9 !important;
                                                                     border-bottom: solid 35px #005a85;"
      >
     <!--+'fondo-'+offer.company_name.replace(' ','_')+'-modal'-->


                     <div  :class="'col col-sm-4 '" :style="':'" >   


                        <div class="row  pt-1 " style=" justify-content: center;">
                           <div class="consult-card-header pt-2 pb-4">
                              <img  class="consult-card-logo img-fluid"  :src="baseUrl+'/storage/'+offer.company_logo" alt="">
                           </div>
                        </div>
                        <div class="row  " style=" justify-content: center;">
                           <button  type="button" class="btn-adquierelo-modal btn btn-lx btn-lg btn-main-blue rounded-pill mx-1 px-1  img-fluid"  >
                             <a href="https://api.whatsapp.com/send?phone=573212083412&text=hola elmejorinternet.co, me gustaria saber de los planes">
                                <span style="color:white">Chatea con un asesor
                                        </span> 
                                </a> 
                              </button>
            
                        
                        </div>


                        <div class="row text-center" style="margin-top: 20px;">
                           <div class="col"> <a href="" style="color:#055a76; font-size: 1.2em;  font-weight: 100; ">
                              <span class="" style="">  <u> <p style="font-family: 'poppins-regular';">Ver mas planes... </p>   </u>  </span  ></a> </div>
                           
                        </div>

                        <div class="row pt-2 pb-2" style=";  justify-content: center;">
                           <img src="/images/el_mejor_internet_co-05.png" alt="" style="width: 89%;">
                        </div>
                     </div>
                     <div class="col col-sm-8 p-0 px-1 " style="">


                              <div class="row">

                                    <div class="col-12 col-sm-6 col-md-6 col-xs-12">

                                                <div class="row">
                                             <!-- //////////////////////////// TECNOLOGIA //////////////////////////////////// -->
                                                <div class="row ">
                                                   <div class="bloque-tecnologia">
                                                      <div   v-if="offer.tecnologia == 0">
                                                         <p class=" " style="text-align: center; padding-top: 54px;">
                                                            
                                                      <span class="modal-texto-tecnologia4">Plan fibra Óptica </span>      </p>
                                                      </div>
                                                      <div   v-if="offer.tecnologia == 1 ">
                                                         <p class="  " style="text-align: center; padding-top: 54px;">
                                                        
                                                      <span class="modal-texto-tecnologia4">Plan Satelital </span>         </p>
                                                      </div>
                                                      <div   v-if="offer.tecnologia == 2">
                                                         <!--poner aca la imagen de Hibrido -->  
                                                         <p class="  " style="text-align: center; padding-top: 54px;">
                                                        
                                                      <span class="modal-texto-tecnologia4"> Plan Hibrido</span>    </p>
                                                      </div>
                                                      <div   v-if="offer.tecnologia == 3 ">
                                                      <p class="t " style="text-align: center; padding-top: 54px;">
                                                         
                                                      <span class="modal-texto-tecnologia4"> Plan Cobre</span>    </p>
                                                      </div>
                                                      <div   v-if="offer.tecnologia == 4 ">
                                                      <p class="" style="text-align: center; padding-top: 54px;">
                                                        
                                                      <span class="modal-texto-tecnologia4"> Plan Radio</span>    </p>
                                                      </div>
                                                      <div   v-if="offer.tecnologia == 5 ">
                                                         <!--poner aca la imagen de vozIP --> 
                                                      <p class=" " style="text-align: center; padding-top: 54px;">
                                                         
                                                   <span class="modal-texto-tecnologia4">Plan VozIp  </span>  </p>
                                                      </div>
                                                   </div>
                                                </div>

                                                </div>

                                                 
                                                <div class="row">
                                                      
                                             <!-- //////////////////////////// VELOCIDAD DE INTERNET //////////////////////////////////// -->
                                          
                                                   <div class="row ">
                                                      <h1 class="  modal-velocidad-1" >                
                                                       <span style="font-size: 1.2em;"> {{offer.fields_values[1].value}}  </span>  
                                                         <span> <span v-if="offer.company_name =='Net2Phone' || offer.company_name =='SkyNet' "> Kbps  </span> 
                                                         <span v-if="offer.company_name != 'Net2Phone' && offer.company_name !='SkyNet'"> Mbps </span>  </span>
                                                         de Internet     
                                                      </h1>
                                                </div>

                                                


                                                
                                                </div>
                                                


                                                
                                                   <div class="row">

                                                      <div class="row">
                                                         <hr>
                                                               <!-- //////////////////////////// Precio//////////////////////////////////// -->         
                                                               <div class="">
                                                                  
                                                                  <h4 class="modal-valor-1" style="font-family: 'poppins-medium';
    color: #055a76;
    font-size: 1.8em;
    font-weight: bold;">{{offer.tariff.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}} <span style="font-family: 'poppins-regular';
    color: #055a76;
    font-size: 0.8em;
    font-weight: 100;">x mes</span></h4>
                                                                     
                                                                    
                                                                  
                                                               </div>
                                                         <hr>
                                                   </div>

                                                   </div>
                                                
                

                                    </div>
                                   
                                    <div class="col-12 col-sm-6 col-md-6 col-xs-12">

                                                      <div class="row" style="justify-content: center;">
                                                         <div class="row ">
                                                         <div   v-if="offer.tipo_plan_logos == 0 ">
                                                            <h6 class="text-dark-blue " style="text-align: center;"> <img class="logo-movil-tecnologia1" src="/images/Icono-internet.png" width="20%" alt="">   </h6>
                                                         </div>
                                                         <div   v-if="offer.tipo_plan_logos == 1 ">
                                                            <h6 class="text-dark-blue " style="text-align: center;"> <img class="logo-movil-tecnologia1" src="/images/Icono-internet-y-telefono.png" width="20%" alt="">    </h6>
                                                         </div>
                                                         <div   v-if="offer.tipo_plan_logos == 2 ">
                                                            <h6 class="text-dark-blue " style="text-align: center;"> 
                                                               <img src="/images/Icono-internet-y-telefono-y-tv.png" class="logo-movil-tecnologia1"  width="20%" > 
                                                            </h6>
                                                         </div>
                                                         <div   v-if="offer.tipo_plan_logos == 3 ">             
                                                            <h6 class="text-dark-blue " style="text-align: center;">
                                                                <img class="logo-movil-planes2" src="/images/Icono-VozIP" width="20%" alt=""> </h6>
                                                         </div>
                                                         <div   v-if="offer.tipo_plan_logos != 0 && offer.tipo_plan_logos != 1 && offer.tipo_plan_logos != 2  && offer.tipo_plan_logos != 3">
                                                         <h6 class="text-dark-blue " style="text-align: center;">
                                                            <img class="logo-movil-planes2"  src="/images/Icono-trio.png" width="20%" alt="">
                                                         </h6>
                                                         </div>
                                                      </div>
                                                      </div>


                                                      <div class="row" style="justify-content: center;">
                                                            <div class="row  " style=" justify-content: center;">
                                                               
                                                            <button  type="button" class="btn-adquierelo btn btn-lx btn-lg btn-main-blue rounded-pill mx-1 px-1  img-fluid"  >
                                                                <a href="https://api.whatsapp.com/send?phone=573212083412&text=hola elmejorinternet.co, me gustaria saber de los planes">
                                                                
                                                               <span style="color:white"> Solicitar Plan 
                                                                      </span>  
                                                                 </a>
                                                                 </button>
                                 
                                             
                                                            </div>
                                                      </div>
                                    </div>
                              </div>
  <hr>
                              <div class="row">
                                 <div class="row"> 
                                     <p style="    color: #055a76;
    font-family: 'poppins-medium';
    font-size: 20px;">¿Que Incluye el Plan?</p>
                                 
                                 </div>
                                 </div>
                              
                              
                                 <div class="row">
                                     <ul class=" ul-modal" style="margin-left: -24px; font-size: 14px;">
                                                   
                                                      
                                                   

                                       <li class=" li-modal"> <p class=" modal-texto-atributos"> {{offer.titulo1}}</p>  </li>                                    
                                       <li class=" li-modal"> <p class=" modal-texto-atributos"> {{offer.titulo2}}</p> </li>
                                       <li class=" li-modal"> <p class=" modal-texto-atributos"> {{offer.titulo3}}</p> </li>
                                       <li class=" li-modal"> <p class=" modal-texto-atributos"> {{offer.titulo4}}</p> </li>
                                       <li class=" li-modal"> <p class=" modal-texto-atributos"> <b> </b> <span class="">  {{offer.permanencia}}  </span> </p> </li>
                                       <li class=" li-modal"> <p class=" modal-texto-atributos"> <b> </b> <span class=""> Llamadas Nacionales  </span>   </p> </li>
                                       <li class=" li-modal"> <p class=" modal-texto-atributos"> <b>Fijo: </b> <span class=""> {{offer.fijo}}  </span>   </p> </li>
                                       <li class=" li-modal"> <p class=" modal-texto-atributos"> <b>Movil: </b> <span class="">  {{offer.movil}}</span>   </p> </li>
                                       <li class=" li-modal"> <p class=" modal-texto-atributos"> <b> </b> <span class="">  desde {{offer.canales}} Canales </span>   </p> </li>
                                       <li class=" li-modal"> <p class=" modal-texto-atributos"> <b>Deco: </b> <span class=""> {{offer.deco}}  </span>  </p>         </li>
                                                               
                                                               
                                   </ul> -
                                          
                               </div>
                                        
                                         


                              </div>          
            

                     </div>   
           
                  
               
           </div>
         </div>
   

        
  
</template>














<script>
   export default {
   
       props:["offer", "fields"],
   
       data(){
           return {
               baseUrl:baseUrl,
           }
       },
   
   }
</script>
