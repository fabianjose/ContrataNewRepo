<template>
   <div class="modal fade" id="modalConsultOffer" aria-modal="true">
      <div class="modal-dialog modal-dialog-centered modal-xl modal-xl-xl d-flex flex-row justify-content-center align-items-center">
         <div class="consult-card p-0 flex-wrap modal-content" style="
    overflow: hidden;
    border: #0bdcf3 solid;
    border-radius: 10px !important;
    width: 95vw;
     border-width: 8px !important;" >
            <div class="col col-sm-4  " style="background-color:cyan;">
               <div class="row  pt-5 pb-5" style=" justify-content: center;">
                  <div class="consult-card-header pt-4 pb-3">
                     <img :src="baseUrl+'/storage/'+offer.company_logo" alt="logo" class="consult-card-logo img-fluid">
                  </div>
               </div>
               <div class="row  pt-5 pb-5" style=" justify-content: center;">
                  <button  type="button" class="btn-adquierelo btn btn-lx btn-lg btn-main-blue rounded-pill mx-1 px-1 text-uppercase img-fluid" >ADQUIÉRELO</button>
               </div>
               <div class="row pt-5 pb-5" style="background-color:#0bdcf3;  justify-content: center;">
                  <img src="/images/logoCI-1.png" alt="" style="width:50%">
               </div>
            </div>
            <div class="col col-sm-8 p-0 px-1 " style="background-color:white; overflow: hidden;">
               <!-- //////////////////////////// VELOCIDAD DE INTERNET //////////////////////////////////// -->
               <div class="row pt-5 px-3">
                  <h1 class="col-12 mt-2" style="font-family: 'Heebo';    color: #5b5b5f;    font-weight: 800; font-size: 3em">                
                     {{offer.fields_values[1].value}} 
                     <span> <span v-if="offer.company_name =='Net2Phone' || offer.company_name =='SkyNet' "> Kbps  </span> 
                     <span v-if="offer.company_name != 'Net2Phone' && offer.company_name !='SkyNet'"> Mbps </span>  </span>
                     de Internet     
                  </h1>
               </div>
               <div class="row px-4">
                  <div   v-if="offer.tipo_plan_logos == 0 ">
                     <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes2" src="/images/service-2.png" width="20%" alt=""> Internet</h6>
                  </div>
                  <div   v-if="offer.tipo_plan_logos == 1 ">
                     <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes2" src="/images/Icono-duo.png" width="20%" alt="">Internet + Telefonía </h6>
                  </div>
                  <div   v-if="offer.tipo_plan_logos == 2 ">
                     <h6 class="text-dark-blue pt-2" style="text-align: center;"> 
                        <img src="/images/Icono-trio.png" class="logo-movil-planes2"  width="20%" >Internet + Telefonía +tv      
                     </h6>
                  </div>
                  <div   v-if="offer.tipo_plan_logos == 3 ">             
                     <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes2" src="/images/service-2.png" width="20%" alt=""> </h6>
                  </div>
                  <div   v-if="offer.tipo_plan_logos != 0 && offer.tipo_plan_logos != 1 && offer.tipo_plan_logos != 2  && offer.tipo_plan_logos != 3">
                    <h6 class="text-dark-blue pt-2" style="text-align: center;">
                     <img class="logo-movil-planes2"  src="/images/Icono-trio.png" width="20%" alt="">
                    </h6>
                  </div>
               </div>

               <div class="row px-4">
                  <div class="bloque-tecnologia">
                     <div   v-if="offer.tecnologia == 0">
                        <h6 class="text-dark-blue pt-2" style="text-align: center;">
                            <div style="width: 126px;display:inline-block;">
                            <img src="/images/Fibra1.png" alt="" style="transform: rotate(90deg);width: 32px;" class="logo-movil-planes2"   > 
                        </div>
                        fibra Óptica    </h6>
                     </div>
                     <div   v-if="offer.tecnologia == 1 ">
                        <h6 class="text-dark-blue  " style="text-align: center;">
                        <div style="width: 126px;display:inline-block;">
                         <img  src="/images/satelital11.png" style="width: 32px;" class="logo-movil-planes2"   width="20%" >
                     </div>
                          Satelital     </h6>
                     </div>
                     <div   v-if="offer.tecnologia == 2">
                        <!--poner aca la imagen de Hibrido -->  
                        <h6 class="text-dark-blue  " style="text-align: center;">
                        <div style="width: 126px;display:inline-block;">
                         <img class="logo-movil-planes2"  style="width: 32px;" src="/images/hibrido.png" alt="" width="20%">
                     </div>
                          Hibrido </h6>
                     </div>
                     <div   v-if="offer.tecnologia == 3 ">
                       <h6 class="text-dark-blue  " style="text-align: center;">
                        <div style="width:126px;display:inline-block;">
                         <img class="logo-tecnologia2" style="width: 32px;" src="/images/cobre.png" alt="" width="20%">
                     </div>
                          Cobre </h6>
                     </div>
                     <div   v-if="offer.tecnologia == 4 ">
                       <h6 class="text-dark-blue" style="text-align: center;">
                         <div style="width:126px;display:inline-block;">
                        <img class="logo-movil-planes2"  style="width: 32px;" src="/images/radio.png" alt="" width="20%">
                    </div>
                         Radio </h6>
                     </div>
                     <div   v-if="offer.tecnologia == 5 ">
                        <!--poner aca la imagen de vozIP --> 
                       <h6 class="text-dark-blue " style="text-align: center;">
                        <div style="width:126px;display:inline-block;">
                        <img class="logo-movil-planes2" style="width: 32px;" src="/images/vozip.png" alt="" width="20%"> 
                    </div>
                    VozIp </h6>
                     </div>
                  </div>
               </div>
               <div class="row p-4 mb-4" style="background-color: #0bdcf3; width:104%;color: white;margin: -4 !important;">
               
                   <h4>{{offer.tariff}} por mes.</h4>
               
               </div>
               <!-- //////////////////////////// LOGO TIPO DE TECNOLOGIA//////////////////////////////////// -->
               <div class="p-2 mt-4 pt-4">
               <div class="row py-1 mx-0 px-2">{{offer.titulo1}}</div>
               <div class="row py-1 mx-0 px-2">{{offer.titulo2}}</div>
               <div class="row py-1 mx-0 px-2">{{offer.titulo3}}</div>
               <div class="row py-1 mx-0 px-2">{{offer.titulo4}}</div>
               </div>
               <div class="row py-3">
                 <hr>
                 <div>
                  <a class="col-12 btn btn-main-blue rounded-pill" style="font-family: 'Heebo';     font-weight: 800; font-size:3em; color: white;" >$ {{offer.tariff}}</a>
              </div>
                  <hr>
               </div>
                
               <div class="row"></div>
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
