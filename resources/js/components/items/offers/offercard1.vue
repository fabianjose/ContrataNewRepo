<template>

  <div class="offer-card d-flex flex-column">
    
    <div class="offer-card-header">
      <div class="offer-card-header" >
       
         <div class="ribbon">Planes
            <span v-if="offer.type =='private'"> Hogar  </span> 
            <span v-if="offer.type =='isp'"> ISP  </span> 
            <span v-if="offer.type =='company'"> Empresa  </span> 
            <span v-if="offer.type =='pyme'"> pyme  </span> 
             </div> 
       
    
      <img :src="baseUrl+'/storage/'+offer.company_logo" alt="logo" class="h-100 ">

    
    </div>
      </div>
      
    <div :class="'offer-card-separator '+(index%2?'bg-main-blue':'bg-main-pink')"></div>

    <div class="offer-card-content">
      <div class="row" style="    padding-left: 30px;  padding-right:30px; margin-top: -12px;">
       <!-- <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6> -->
       <h6 class="col-12 offer-card-title">
         
     <!--    {{offer.fields_values[0].value}} -->
          <span v-if="offer.tecnologia ==0">Fibra Óptica</span> 
          <span v-if="offer.tecnologia ==1">Satelital</span> 
          <span v-if="offer.tecnologia ==2">Híbrido</span> 
          <span v-if="offer.tecnologia ==3">Cobre</span> 
          <span v-if="offer.tecnologia ==4">Radio</span> 
          <span v-if="offer.tecnologia ==5">Voz Ip</span> 
         </h6>       
      </div>
      <div class="row text-center">
       <!--  <h6 class="col-12 offer-card-benefits text-wrap" style="font-family:heebo">{{offer.benefits}}</h6>-->
        <p class="col-12" style="font-family: 'Heebo';    margin-top: -9px; color:#88868b">velocidad</p>
        <!-- <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6>  ACA VA EL VALOR DE LA VELOCIDAD -->
        <h1 class="col-12 " style="font-family: 'Heebo';    color: #5b5b5f;    margin-top: -18px; font-weight: 800;"> 
   
               
              {{offer.fields_values[1].value}} 
  <span> <span v-if="offer.company_name =='Net2Phone' || offer.company_name =='SkyNet' "> Kbps  </span> 
   <span v-if="offer.company_name != 'Net2Phone' && offer.company_name !='SkyNet'"> Mbps </span>  </span>

          
      
  </h1>
         

          



       
      </div> 
          <div :class="'offer-card-separator '+(index%2?'bg-main-blue':'bg-main-pink')"></div>

            <div class="row text-center">
       <!--  <h6 class="col-12 offer-card-benefits text-wrap" style="font-family:heebo">{{offer.benefits}}</h6>-->
        <p class="col-12 " style="font-family: 'Heebo';    color:#88868b">Cantidad de Canales</p>
        <!-- <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6>  ACA VA EL VALOR DE CANALES DE BASE DEDATOS -->
        <h1 class="col-12 " style="font-family: 'Heebo';    color: #5b5b5f;     margin-top: -19px;  font-weight: 800;   "> {{offer.canales}}</h1>
      </div> 

         <div :class="'offer-card-separator '+(index%2?'bg-main-blue':'bg-main-pink')"></div>

            <div class="row text-center">
       <!--  <h6 class="col-12 offer-card-benefits text-wrap" style="font-family:heebo">{{offer.benefits}}</h6>-->
        <p class="col-12 " style="font-family: 'Heebo';    color:#88868b">Telefonía</p>
        <!-- <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6>  ACA VA EL VALOR DE CANALES DE BASE DEDATOS -->
        
        
               <h1   v-if="offer.telefonia==0" class="col-12 " style="font-family: 'Heebo';    color: #5b5b5f;     margin-top: -19px; font-weight: 800; text-center ">N/A</h1>



       
             <h1   v-if="offer.telefonia==1" class="col-12 " style="font-family: 'Heebo';    color: #5b5b5f;     margin-top: -19px; font-weight: 800; ">ILIMITADA</h1>

        
        



      </div> 

       <div   v-if="offer.titulo1!=NULL && offer.titulo2!=NULL && offer.titulo3!=NULL">
                                 
                         
        <div class="row"  style="    padding-left: 30px;  padding-right:30px; margin-top: ;">
             <h6 class="col-12 offer-card-title">{{offer.titulo1}}<br>{{offer.titulo2}}<br>{{offer.titulo3}}</h6>  
        </div>

           </div>

           <div   v-if="offer.titulo1!=NULL && offer.titulo2!=NULL && offer.titulo3==NULL">
                                 
                         
        <div class="row"  style="    padding-left: 30px;  padding-right:30px; margin-top: ;">
             <h6 class="col-12 offer-card-title">{{offer.titulo1}}<br>{{offer.titulo2}}<br><br></h6>  
        </div>

           </div>
            <div   v-if="offer.titulo1!=NULL && offer.titulo2==NULL && offer.titulo3==NULL">
                                 
                         
        <div class="row"  style="    padding-left: 30px;  padding-right:30px; margin-top: ;">
             <h6 class="col-12 offer-card-title" style="font"><br>{{offer.titulo1}}<br><br></h6>  
        </div>

           </div>
                  
    <p class="col-12 " style="font-family: 'Heebo';    color:#88868b">Desde</p>

      <div class="row" >
        <h5 class="col-12 offer-card-price" >$ {{showPrice(offer.tariff)}}</h5>
      </div>
    </div>
    <div class="offer-card-footer">
      <div class="col-10">
        <div>
 
        
                        <a target="_blank"href="https://api.whatsapp.com/send?phone=573212120281&text=hola, me gustaria saber de los planes"> 
                         <button onclick="llamaAWhatsapp();" data-toggle="modal" data-target="#modalConsultOffer" 
          :class="'btn  text-white offer-card-btn rounded-pill '+(index%2?'bg-main-blue':'bg-main-pink')" style="box-shadow: 0px 0px 7px 0px black;">
          ADQUIÉRELO
        </button>
                        </a>
        <!-- <button @click="emitContact" data-toggle="modal" data-target="#modalConsultOffer" 
          :class="'btn  text-white offer-card-btn rounded-pill '+(index%2?'bg-main-blue':'bg-main-pink')" style="box-shadow: 0px 0px 7px 0px black;">
          ADQUIÉRELO
        </button>-->
        </div>
      
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