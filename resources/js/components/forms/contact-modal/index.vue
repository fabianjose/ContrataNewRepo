<template>
    <div class="modal fade" id="modalConsultOffer" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-xl-xl d-flex flex-row justify-content-center align-items-center">
            <div class="consult-card p-0 flex-wrap modal-content" >



           
                        


                            
               
                    <div class="col col-sm-4  " style="background-color:blue;">

                        <div class="row  pt-5 pb-5" style=" justify-content: center;">
                            <div class="consult-card-header pt-4 pb-3">
                            <img :src="baseUrl+'/storage/'+offer.company_logo" alt="logo" class="consult-card-logo img-fluid">
                        </div>
                        </div>
                        <div class="row  pt-5 pb-5" style=" justify-content: center;">
                                                <button  type="button" class="btn-adquierelo btn btn-lx btn-lg btn-main-blue rounded-pill mx-1 px-1 text-uppercase img-fluid" >ADQUIÉRELO</button>

                        </div>

                        <div class="row pt-5 pb-5" style="background-color:yellow;  justify-content: center;">

                            <img src="/images/logoCI-1.png" alt="" style="width:50%">

                        </div>
                        

                    </div>
                  
               




                      
               
                  <div class="col col-sm-8  " style="background-color:white">
                     
                     <!-- //////////////////////////// VELOCIDAD DE INTERNET //////////////////////////////////// -->

                     
                      <div class="row">
                          
     <h1 class="col-12 " style="font-family: 'Heebo';    color: #5b5b5f;    font-weight: 800; font-size: 3em">                
              {{offer.fields_values[1].value}} 
  <span> <span v-if="offer.company_name =='Net2Phone' || offer.company_name =='SkyNet' "> Kbps  </span> 
   <span v-if="offer.company_name != 'Net2Phone' && offer.company_name !='SkyNet'"> Mbps </span>  </span>
   de Internet     
      
  </h1>
                     </div>




                     <!-- //////////////////////////// LOGO TIPO DE PLAN //////////////////////////////////// -->

                      <div class="row">

                          
                            <div   v-if="offer.tipo_plan_logos == 0 ">
                    <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes2" src="/images/service-2.png" width="30%" alt=""> Internet</h6> 
                            </div>
                            <div   v-if="offer.tipo_plan_logos == 1 ">
                    <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes2" src="/images/Icono-duo.png" width="30%" alt="">Internet + Telefonía </h6> 
                            </div>
                            <div   v-if="offer.tipo_plan_logos == 2 ">
                             
                              <p> 
                                <img src="/images/Icono-trio.png" class="logo-movil-planes2"  width="30%" >Internet + Telefonía +tv      </p>        

                            </div>
                            <div   v-if="offer.tipo_plan_logos == 3 ">
       <!--aca logito vozip-->             <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes2" src="/images/service-2.png" width="30%" alt=""> </h6> 
                            </div>

                            <div   v-if="offer.tipo_plan_logos != 0 && offer.tipo_plan_logos != 1 && offer.tipo_plan_logos != 2  && offer.tipo_plan_logos != 3">
                            <img class="logo-movil-planes2"  src="/images/Icono-trio.png" width="30%" alt="">
                            </div>

            

                      </div>

                      <br><br>



<!-- //////////////////////////// LOGO TIPO DE TECNOLOGIA//////////////////////////////////// -->
                      <div class="row">

  <div class="bloque-tecnologia">
                            <div   v-if="offer.tecnologia == 0">
                                
                   <p>  <img src="/images/Fibra1.png" alt="" style="transform: rotate(90deg);" class="logo-tecnologia2 "  width="20%" > fibra Óptica     </p>                         </div>
                            <div   v-if="offer.tecnologia == 1 ">
                                 

                    <p>   <img  src="/images/satelital11.png"  class="logo-tecnologia2 "  width="20%" > Stelital     </p>
                            </div>
                            <div   v-if="offer.tecnologia == 2">
      <!--poner aca la imagen de Hibrido -->  
                  <p> <img class="logo-tecnologia2" src="/images/hibrido.png" alt="" width="20%"> Hibrido </p>  
                            </div>
                            <div   v-if="offer.tecnologia == 3 ">
                  <p> <img class="logo-tecnologia2" src="/images/cobre.png" alt="" width="20%"> Cobre </p>  
                            </div>
                            <div   v-if="offer.tecnologia == 4 ">
                  <p> <img class="logo-tecnologia2" src="/images/radio.png" alt="" width="20%"> Radio </p>  
                            </div>

                               <div   v-if="offer.tecnologia == 5 ">
  <!--poner aca la imagen de vozIP --> 
                  <p> <img class="logo-tecnologia2" src="/images/vozip.png" alt="" width="20%"> VozIp </p>  
                            </div>
                            
                            </div>

                      </div>




<!-- //////////////////////////// LOGO TIPO DE TECNOLOGIA//////////////////////////////////// -->
                      <div class="row"></div>
                      <div class="row"></div>
                      <div class="row"></div>
                      <div class="row"><h1 class="col-12 " style="font-family: 'Heebo';    color: #5b5b5f;    font-weight: 800; font-size:3em" >$ {{offer.tariff}}</h1></div>
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
