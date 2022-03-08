<template>
 
  <div class="offer-card d-flex flex-column" style="background-image: url('images/imf-footer.png'); background-repeat: no-repeat;
    background-size: contain; background-position: bottom;
    border-radius: 23px;">
    
    <div class="offer-card-header">
      <div class="offer-card-header" >     
   <!--  <div :class="'ribbon ' + 'fondo-'+offer.company_name.replace(' ','_')" >Planes    
            <span v-if="offer.type =='private'"> Hogar  </span> 
            <span v-if="offer.type =='isp'"> ISP  </span> 
            <span v-if="offer.type =='company'"> Empresa  </span> 
            <span v-if="offer.type =='pyme'"> pyme  </span> 
             </div> -->

           
    
      <img :src="baseUrl+'/storage/'+offer.company_logo" alt="logo" class="h-100 " style="    ">

    
    </div>
<!--<p >{{offer.company_name.replace('_',' ')}}</p>-->
    
      </div>
      
   <!--  <div :class="'offer-card-separator '+(index%2?'bg-main-blue':'bg-main-pink')"></div> -->

    <div  class="offer-card-content ">
      <div class="row" style=" justify-content: center; ">
       <!-- <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6> -->
     <!--  <h6 :class="'col-12 offer-card-title ' + 'fondo-'+offer.company_name.replace(' ','_')"  >         
       {{offer.fields_values[0].value}} -->
      <!--      <span v-if="offer.tecnologia ==0">Fibra Óptica</span> 
          <span v-if="offer.tecnologia ==1">Satelital</span> 
          <span v-if="offer.tecnologia ==2">Híbrido</span> 
          <span v-if="offer.tecnologia ==3">Cobre</span> 
          <span v-if="offer.tecnologia ==4">Radio</span> 
          <span v-if="offer.tecnologia ==5">Voz Ip</span> 
         </h6>   -->

    <span class="texto-card-nuevo" style="" v-if="offer.tipo_plan_logos == 0 ">internet</span> 
    <span class="texto-card-nuevo" style="" v-if="offer.tipo_plan_logos ==1">Internet + Telefonia</span> 
    <span class="texto-card-nuevo" style=""  v-if="offer.tipo_plan_logos ==2">Internet + Telefonia + Tv</span> 
    <span class="texto-card-nuevo" style=""  v-if="offer.tipo_plan_logos ==3">VozIp</span> 


      </div>
      <div class="row text-center" style="justify-content: center;">
       <!--  <h6 class="col-12 offer-card-benefits text-wrap" style="font-family:heebo">{{offer.benefits}}</h6>-->
        <!-- <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6>  ACA VA EL VALOR DE LA VELOCIDAD -->
      
     <h1 class="col-12 " style="font-family: 'Poppins', sans-serif;    color: #145b77;    margin-top: -18px; font-weight: 600; font-size: 2.5em"> 
   
               
            <span v-if="offer.fields_values[1].value != 1">  
              
             
                    {{offer.fields_values[1].value}}
             
               </span>
                <span v-if="offer.fields_values[1].value == 1" style="font-size: 0.8em !important">  
              
             
                  Consultar
             
               </span>
               <br>   </h1><span style="font-size: 1.2em;
    font-family: poppins-regular;
    margin-top: -22px;
    font-weight: bold;">Megas</span>



 



    
  <!--<span> <span v-if="offer.company_name =='Net2Phone' || offer.company_name =='SkyNet' "> Kbps  </span> 
   <span v-if="offer.company_name != 'Net2Phone' && offer.company_name !='SkyNet'"> Mbps </span>  </span>-->
   

          
      

         

          



       
      </div> 
                <!-- <div :class="'offer-card-separator '+(index%2?'bg-main-blue':'bg-main-pink')"></div> 

            <div class="row text-center">
         <h6 class="col-12 offer-card-benefits text-wrap" style="font-family:heebo">{{offer.benefits}}</h6>
        <p class="col-12 " style="font-family: 'Heebo';    color:#88868b">Cantidad de Canales</p>-->
        <!-- <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6>  ACA VA EL VALOR DE CANALES DE BASE DEDATOS 
        <h5 class="col-12 " style="font-family: 'Heebo';    color: #5b5b5f;     margin-top: -19px;  font-weight: 800;   "> {{offer.canales}}</h5>
      </div> 

          <div :class="'offer-card-separator '+(index%2?'bg-main-blue':'bg-main-pink')"></div> 

            <div class="row text-center">-->
       <!--  <h6 class="col-12 offer-card-benefits text-wrap" style="font-family:heebo">{{offer.benefits}}</h6>-->
      <!--   <p class="col-12 " style="font-family: 'Heebo';    color:#88868b">Telefonía</p>
        <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6>  ACA VA EL VALOR DE CANALES DE BASE DEDATOS 
        
        
               <h5   v-if="offer.telefonia==0" class="col-12 " style="font-family: 'Heebo';    color: #5b5b5f;     margin-top: -19px; font-weight: 800; text-center ">N/A</h5>



       
             <h5   v-if="offer.telefonia==1" class="col-12 " style="font-family: 'Heebo';    color: #5b5b5f;     margin-top: -19px; font-weight: 800; ">ILIMITADA</h5>

        
        



      </div> -->

       <div  >
                                 
                         
        <div class="row" >
             <h5 :class="'col-12 offer-card-title ' " >
               <div  v-if="offer.titulo1!=NULL">
                  {{offer.titulo1}}
               </div>
                <div  v-if="offer.titulo1==NULL">
                  <br>
               </div>
               
               
            
               
               {{offer.titulo2}}<br>
             
               <div class="row" style="justify-content: center;" >
     <!-- <h1 class="col-12 card-precios-nuevos" >$ {{showPrice(offer.tariff)}}</h1>-->
      
    
      <span  v-if="offer.tariff == 1" class="">
                   <a class="" href="https://api.whatsapp.com/send?phone=573212083412&text=hola elmejorinternet.co, me gustaria saber de los planes">
                   <h1 class="card-precios-nuevos"> Consultar </h1>
                   </a> 
          </span>

          <span  v-if="offer.tariff != 1" class="">

                  <h1 class="card-precios-nuevos" style="">
                    $ {{showPrice(offer.tariff)}} </h1> 
                      
                     
                                 
           </span> 
    
        </div>
            
            
                <div  v-if="offer.titulo3!=NULL">
                  {{offer.titulo3}}
               </div>
                <div  v-if="offer.titulo3==NULL">
                  <br>
               </div>
             
           <div  v-if="offer.titulo4!=NULL">
                  {{offer.titulo4}}
               </div>
                <div  v-if="offer.titulo4==NULL">
                  <br>
               </div>
             
            
             
              </h5>  
        </div>

           </div>

        
            
                
    <!-- <p class="col-12 " style="font-family: 'Heebo';  #00c2d6   color:#88868b">Desde</p> --> 

    <div class="row" >
      <div class="col text-center">
        <span style="font-family: Poppins, sans-serif;    color: #535353;  
    font-weight: 500;
   "> Saber mas..</span>
      </div>
    </div>

     
    </div>
    <div class="offer-card-footer" >
        <div>
        
          

                        <a @click="emitContact" data-toggle="modal" data-target="#modalConsultOffer" > 
                         <button  data-toggle="modal" data-target="#modalConsultOffer" 
          :class="'btn  text-white offer-card-btn rounded-pill '+(index%2?'bg-main-blue':'bg-main-pink')">         Solocitar plan
        </button>
                        </a>
        <!-- <button @click="emitContact" data-toggle="modal" data-target="#modalConsultOffer" 
          :class="'btn  text-white offer-card-btn rounded-pill '+(index%2?'bg-main-blue':'bg-main-pink')" style="box-shadow: 0px 0px 7px 0px black;">
          ADQUIÉRELO
        </button>-->
        </div>
      
      </div>
    </div>

     
 

  



  
</template>



<script>

    

export default {
  props:['offer','index'],
  data(){
    return{
      baseUrl:baseUrl,
    }
  },

  methods:{
    showPrice(price){
        return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    emitContact(){
      this.$emit("contactOffer",this.index);
    }
  }
}
</script>