<template>
   <div class="modal fade" id="modalConsultOffer" aria-modal="true">
      <div class="modal-dialog modal-dialog-centered modal-xl modal-xl-xl d-flex flex-row justify-content-center align-items-center">
         <div class="consult-card p-0 flex-wrap modal-content" style="
    overflow: hidden;
    border: #1adbf5 solid;
    border-radius: 40px !important;
    width: 95vw;
     border-width: 8px !important;" >
     <!--+'fondo-'+offer.company_name.replace(' ','_')+'-modal'-->


         <div  :class="'col col-sm-4 '" :style="':'" >   


               <div class="row  pt-5 pb-5" style=" justify-content: center;">
                  <div class="consult-card-header pt-4 pb-3">
                       <img  class="consult-card-logo img-fluid"  :src="'/images/logos-modal/'+offer.company_name.replace(' ','_')+'.png'" alt="">
                  </div>
               </div>
               <div class="row  pt-5 pb-5" style=" justify-content: center;">
                  <button  type="button" class="btn-adquierelo btn btn-lx btn-lg btn-main-blue rounded-pill mx-1 px-1 text-uppercase img-fluid"  >ADQUIÉRELO</button>
   
                
               </div>
               <div class="row text-center">
                  <div class="col"> <a href="" style="color:white; font-size: 1.2em;
    font-weight: 100; "> <span style="font-size:1.3em">  </span class="modal-mas-planes" > <u>Ver mas planes</u> </a> </div>
                    
               </div>
               <div class="row pt-2 pb-2" style="background-color:#06d1fc;  justify-content: center; margin-top: 89px;">
                  <img src="/images/logoCI-1.png" alt="" style="width:60%">
               </div>
            </div>
            <div class="col col-sm-8 p-0 px-1 " style="background-color:white; overflow: hidden; line-height: 100%;">
               <!-- //////////////////////////// VELOCIDAD DE INTERNET //////////////////////////////////// -->
               <div class="row pt-2 px-3">
                  <h1 class="col-12 mt-2 modal-velocidad-1">                
                     {{offer.fields_values[1].value}} 
                     <span> <span v-if="offer.company_name =='Net2Phone' || offer.company_name =='SkyNet' "> Kbps  </span> 
                     <span v-if="offer.company_name != 'Net2Phone' && offer.company_name !='SkyNet'"> Mbps </span>  </span>
                     de Internet     
                  </h1>
               </div>
               <div class="row px-4">
                  <div   v-if="offer.tipo_plan_logos == 0 ">
                     <h6 class="text-dark-blue " style="text-align: center;"> <img class="logo-movil-tecnologia1" src="/images/service-2.png" width="20%" alt=""> <span class="modal-texto-tecnologia3"> Internet </span>  </h6>
                  </div>
                  <div   v-if="offer.tipo_plan_logos == 1 ">
                     <h6 class="text-dark-blue " style="text-align: center;"> <img class="logo-movil-tecnologia1" src="/images/Icono-duo.png" width="20%" alt=""> <span class="modal-texto-tecnologia3">Internet + Telefonía </span>    </h6>
                  </div>
                  <div   v-if="offer.tipo_plan_logos == 2 ">
                     <h6 class="text-dark-blue " style="text-align: center;"> 
                        <img src="/images/Icono-trio.png" class="logo-movil-tecnologia1"  width="20%" > <span class="modal-texto-tecnologia3"> Internet + Telefonía +tv    </span>   
                     </h6>
                  </div>
                  <div   v-if="offer.tipo_plan_logos == 3 ">             
                     <h6 class="text-dark-blue " style="text-align: center;"> <img class="logo-movil-planes2" src="/images/service-2.png" width="20%" alt=""> </h6>
                  </div>
                  <div   v-if="offer.tipo_plan_logos != 0 && offer.tipo_plan_logos != 1 && offer.tipo_plan_logos != 2  && offer.tipo_plan_logos != 3">
                    <h6 class="text-dark-blue " style="text-align: center;">
                     <img class="logo-movil-planes2"  src="/images/Icono-trio.png" width="20%" alt="">
                    </h6>
                  </div>
               </div>

               <div class="row px-4">
                  <div class="bloque-tecnologia">
                     <div   v-if="offer.tecnologia == 0">
                        <h6 class="text-dark-blue " style="text-align: center;">
                            <div style="width: 126px;display:inline-block;">
                            <img src="/images/Fibra1.png" alt="" style="transform: rotate(90deg); "  width="50%" class="imagen-movil-tecnologia2"   > 
                        </div>
                      <span class="modal-texto-tecnologia4">fibra Óptica </span>      </h6>
                     </div>
                     <div   v-if="offer.tecnologia == 1 ">
                        <h6 class="text-dark-blue  " style="text-align: center;">
                        <div style="width: 126px;display:inline-block;">
                         <img  src="/images/satelital11.png" style="width: 50px;" class="imagen-movil-tecnologia2"   width="60%" >
                     </div>
                      <span class="modal-texto-tecnologia4">Satelital </span>         </h6>
                     </div>
                     <div   v-if="offer.tecnologia == 2">
                        <!--poner aca la imagen de Hibrido -->  
                        <h6 class="text-dark-blue  " style="text-align: center;">
                        <div style="width: 126px;display:inline-block;">
                         <img class="imagen-movil-tecnologia2"  style="width: 50px;" src="/images/hibrido.png" alt="" width="60%">
                     </div>
                       <span class="modal-texto-tecnologia4"> Hibrido</span>    </h6>
                     </div>
                     <div   v-if="offer.tecnologia == 3 ">
                       <h6 class="text-dark-blue  " style="text-align: center;">
                        <div style="width:126px;display:inline-block;">
                         <img class="imagen-movil-tecnologia2" style="width: 50px;" src="/images/cobre.png" alt="" width="60%">
                     </div>
                       <span class="modal-texto-tecnologia4"> Cobre</span>    </h6>
                     </div>
                     <div   v-if="offer.tecnologia == 4 ">
                       <h6 class="text-dark-blue" style="text-align: center;">
                         <div style="width:126px;display:inline-block;">
                        <img class="imagen-movil-tecnologia2"  style="width: 50px;" src="/images/radio.png" alt="" width="60%">
                    </div>
                      <span class="modal-texto-tecnologia4"> Radio</span>    </h6>
                     </div>
                     <div   v-if="offer.tecnologia == 5 ">
                        <!--poner aca la imagen de vozIP --> 
                       <h6 class="text-dark-blue " style="text-align: center;">
                        <div style="width:126px;display:inline-block;">
                        <img class="imagen-movil-tecnologia2" style="width: 50px;" src="/images/vozip.png" alt="" width="60%"> 
                    </div>
                  <span class="modal-texto-tecnologia4">VozIp  </span>  </h6>
                     </div>
                  </div>
               </div>

              
               <div :class="'row p-1 mb-2 mt-2 '"  :style="'width:104%;color: white;margin: -4 !important; '">            
                                                
               <div class="pl-3 mt-2">
                   
                    <h4 class="modal-valor-1">{{offer.tariff.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}}/mes</h4>
                    
               </div>
                  
               
               </div>
               <!-- //////////////////////////// LOGO TIPO DE TECNOLOGIA//////////////////////////////////// -->
             <!--    <div class="p-2 mt-4 pt-4">
               <div class="row py-1 mx-0 px-2">{{offer.titulo1}}</div>
               <div class="row py-1 mx-0 px-2">{{offer.titulo2}}</div>
               <div class="row py-1 mx-0 px-2">{{offer.titulo3}}</div>
               <div class="row py-1 mx-0 px-2">{{offer.titulo4}}</div>-->
               <div class="modal-atributos">

               
                <div class="row py-0 mx-0 px-0 modal-espacio"> <img class="logo-movil-planes2" style="width: 23px;" src="/images/Candado.png" alt="" width="10%" height="10%"> <p class="pl-2 modal-texto-atributos"> <b>Permanencia: </b> <span class="pl-1">  {{offer.permanencia}}  </span> </p> </div>
                <div class="row py-0 mx-0 px-0 modal-espacio"> <img class="logo-movil-planes2" style="width: 23px;" src="/images/Telefono.png" alt="" width="10%" height="10%"> <p class="pl-2 modal-texto-atributos"> <b>Llamadas: </b> <span class="pl-1"> Llamadas Nacionales  </span>   </p> </div>
                <div class="row py-0 mx-0 px-0 modal-espacio"> <img class="logo-movil-planes2" style="width: 23px;" src="/images/Telefono_x2.png" alt="" width="10%" height="10%"> <p class="pl-2 modal-texto-atributos"> <b>Fijo: </b> <span class="pl-1"> {{offer.fijo}}  </span>   </p> </div>
                <div class="row py-0 mx-0 px-0 modal-espacio"> <img class="logo-movil-planes2" style="width: 23px;" src="/images/Telefono_celular.png" alt="" width="10%" height="10%"> <p class="pl-2 modal-texto-atributos"> <b>Movil: </b> <span class="pl-1">  {{offer.movil}}</span>   </p> </div>
                <div class="row py-0 mx-0 px-0 modal-espacio"> <img class="logo-movil-planes2" style="width: 23px;" src="/images/TV1.png" alt="" width="10%" height="10%"> <p class="pl-2 modal-texto-atributos"> <b>Television: </b> <span class="pl-1">  desde {{offer.canales}} Canales </span>   </p> </div>
                <div class="row py-0 mx-0 px-0 modal-espacio"> <img class="logo-movil-planes2" style="width: 23px;" src="/images/Deco.png" alt="" width="10%" height="10%"> <p class="pl-2 modal-texto-atributos"> <b>Deco: </b> <span class="pl-1"> {{offer.deco}}  </span>  </p> </div>
               </div>


                                  <div :class="'offer-card-separator '+(index%2?'bg-main-blue':'bg-main-pink')" style="height: 1px;  background: #060606;"></div> 

               <div class="row py-3">
                 <hr>
                 <div>
                                             

                  <a :class="'col-12 btn btn-main-blue rounded-pill '"  :style="'font-family: Heebo;  border-radius: 28px !important;   font-weight: 800; font-size:3em; color: white; '" >
                      $  {{offer.tariff.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}}/mes</a>
              </div>
                  <hr>
               </div>
               <div class="row">
                   <div :class="'offer-card-separator '+(index%2?'bg-main-blue':'bg-main-pink')"  style="height: 1px;  background: #060606;"></div> 


               </div>

               <div class="row " style="justify-content: center;">
                   
                <div class="row py-1 mx-0 px-2 "> 

                   <a href="https://api.whatsapp.com/send?phone=573212120281&text=hola,%20me%20gustaria%20saber%20de%20los%20planes" target="_blank">
                    <img class="modal-chatea"  src="/images/Logo_Chat-33.png" alt=""  > </a>
                   
                     </div>


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
