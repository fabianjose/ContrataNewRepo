<template>
<div class="col-12 col-lg-8 col-xl-9">
      <div class="d-flex flex-column w-100">

      

        <div class="d-flex flex-row w-100 justify-content-around mb-2 mt-3 bloque-proveedor-precios" >
          <div class="col-xl-2 col-lg-3 col-md-4 px-1">
            <div class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill  p-1 text-wrap "><p class="text-tabla-detalles" >Proveedor</p></div>
          </div>
          
          <div v-for="(field,k2) in compFields" :key="k2" :class="'col-xl-2 px-1 col-lg-3 col-md-4 col-sm-4 offer-benefits hidden-md hidden-xs hidden-sm '+(!k2?'d-lg-flex':'hidden-lg')">
            <div class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill  p-1 text-wrap ">   <p class="text-tabla-detalles" > {{field.name}} </p>  </div>
          </div>

          <div class="col-xl-2 col-lg-3 col-md-4 co px-1 col-sm-4 hidden-xs hidden-sm">
            <div class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill  p-1 text-wrap "  > <p class="text-tabla-detalles" >  Descripcion </p> </div>
          </div>
          
          <div class="col-xl-2 col-lg-3 col-md-4 px-1">
            <div class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap ">   <p class="text-tabla-detalles" >   Precio</p> </div>
          </div>

            <div class="col-xl-2 col-lg-3 col-md-4 px-1">
            <div class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap ">   <p class="text-tabla-detalles" >  </p> </div>
          </div>
        </div>
            




         
        <div v-for="(offer,k) in compItems" :key="k" class="d-flex w-100 justify-content-around my-1 mb-3 offer offers-pagination-item pb-3">

              <div class="row">



                  <div class="col-6 order-1   order-sm-1     col-xl-2 col-lg-3 col-md-4 col-sm-4  d-flex flex-column align-items-center justify-content-center">
                    
                    
                           <img :src="baseUrl+'/storage/'+offer.company_logo" class="img-fluid p-2 logo-mb" >
                   <br>
               

                        <div :class="'offer-card-separator10 '+(index%2?'bg-main-blue':'bg-main-pink')"></div>

                      

                     
                        <div>
                                    <div class=" tecnologia-movil  text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap " >   <p class="text-tabla-detalles" style="margin-top: -20px;">  Tecnologia</p> </div>
                        </div>
                      

                            <div   v-if="offer.tipo_plan_logos == 0 ">
                    <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes" src="/images/service-2.png" width="30%" alt=""> </h6> 
                            </div>
                            <div   v-if="offer.tipo_plan_logos == 1 ">
                    <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes" src="/images/Icono-duo.png" width="30%" alt=""> </h6> 
                            </div>
                            <div   v-if="offer.tipo_plan_logos == 2 ">
                    <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes" src="/images/Icono-trio.png" width="30%" alt=""> </h6> 
                            </div>

                            <div   v-if="offer.tipo_plan_logos != 0 && offer.tipo_plan_logos != 1 && offer.tipo_plan_logos != 2">
                            <img class="logo-movil-planes"  src="/images/Icono-trio.png" width="30%" alt="">
                            </div>
                   

                    <!--<h6 class="text-dark-blue pt-2">{{offer.company_name}}</h6> -->
                  </div>
                      
                      
                  <div  class="col-6 order-3   order-sm-2    text-wrap col-xl-2 col-lg-3 text-center flex-column align-items-center justify-content-center bloque-3">
                            
                              <div class="bloque-tecnologia">
                            <div   v-if="offer.tecnologia == 0">
                                  <img class="logo-tecnologia" src="/images/Fibra1.png"  alt="" style="transform: rotate(90deg);">
                            </div>
                            <div   v-if="offer.tecnologia == 1 ">
                                  <img class="logo-tecnologia" src="/images/satelital11.png" alt="">
                            </div>
                            <div   v-if="offer.tecnologia == 2">
                                  <img class="logo-tecnologia" src="/images/ftth.png" alt="">
                            </div>
                            <div   v-if="offer.tecnologia == 3 ">
                                  <img class="logo-tecnologia" src="/images/cobre.png" alt="">
                            </div>
                            <div   v-if="offer.tecnologia == 4 ">
                                  <img class="logo-tecnologia" src="/images/radio.png" alt="">
                            </div>
                            
                            </div>

                             <h6 class="text-lg">
                                <span style="font-family: 'Heebo';  margin-top: 4px;    font-size: 1.59rem!important;     color: rgb(91, 87, 87);"> {{offer.fields_values[0].value}} </span> 
                                              
                                                     

                                </h6>
                                <div class="raya-azul">
                                  <div :class="'offer-card-separator11 '+(index%2?'bg-main-blue':'bg-main-pink')"></div>

                                </div>
                               
                              
                  </div>

                  

                  <div  class="col-6 order-5   order-sm-3           'text-wrap col-2   col-xl-2 col-lg-3 text-center flex-column align-items-center justify-content-center d-xl-flex hidden-md  hidden-sm '+(!k3?'d-lg-flex':'hidden-lg')">
                  <div class=" tecnologia-movil  text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap " >   <p class="text-tabla-detalles" style="margin-top: -68px;">  Velocidad</p> </div>

                    <div class="icono-ondas"  >
                            <img src="/images/icono-ondas.png" width="42%" alt="">
                      </div>
                    <h6 class="text-lg">
                      
                  <span style="font-family: 'Heebo';     font-size: 1.59rem!important;      color: rgb(91, 87, 87);"> {{offer.fields_values[1].value}}  Mbps </span>
                    </h6>
                  </div>

                  <div class="col-6 order-2  order-sm-4         text-wrap  col-2 col-xl-2 col-lg-3 col-md-4 col-sm-4 text-center flex-column align-items-center justify-content-center d-xl-flex d-lg-flex d-md-flex  hidden-sm">
                        
                    <div class="hbo">
                    <div class=" tecnologia-movil  text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap " >   <p class="text-tabla-detalles" style="margin-top: -50px;">  Beneficios</p> </div>
                    <h5 style="font-family: Heebo;font-size: 16px;color: rgb(91, 87, 87); font-weight: 800;" class="texto-hbo" >{{offer.titulo1}}</h5> 
                  </div>

                    <div >
                      <h6 style="font-weight: 300;">{{offer.titulo2}}</h6> 
                    <h6 style="line-height : 0px; font-weight: 300;">{{offer.titulo3}}</h6> 
                    <h6 style="font-weight: 300;">{{offer.titulo4}}</h6> 
                    </div>
                    

                  <!--  <h6 class="text-sm">              
                    {{offer.benefits}}
                    </h6>-->
                  </div>

                  <div class="col-6 order-4  order-sm-5         col-xl-2 col-lg-3 col-md-4 col-sm-4 py-2 text-center d-flex flex-column align-items-center justify-content-center">
                     <div class="precio-movil">

                  
                    <h6 class="text-dark-blue offer-table-price text-wrap-all precio-movil" style="color: rgb(91, 87, 87); margin-top: 30px;">$ {{showPrice(offer.tariff)}}</h6>
                      </div>
                    <div class="stars-container flex-row justify-content-center mb-2">
                    <!--  <i v-for="(starCount,k4) in 5" :key="k4" :class="(starCount>offer.points?'far':'fas')+' fa-star'"></i>-->
                    </div>
                    <div class="d-flex flex-row">
                     
                    </div>
                  </div>

                  <div class="col-6 order-6   order-sm-6         col-xl-2 col-lg-3 col-md-4 col-sm-4 py-2 text-center d-flex flex-column align-items-center justify-content-center">
                    <div class="stars-container flex-row justify-content-center mb-2">
                    <!--  <i v-for="(starCount,k4) in 5" :key="k4" :class="(starCount>offer.points?'far':'fas')+' fa-star'"></i>-->
                    </div>
                    <div class="d-flex flex-row">
                      <button  type="button" data-toggle="modal" @click="emitConsult(k)" data-target="#modalConsultOffer" class="btn-adquierelo btn btn-lx btn-lg btn-main-blue rounded-pill mx-1 px-1 text-uppercase img-fluid" >ADQUIERELO</button>
                      <!--
                        <button type="button" data-toggle="modal" @click="emitView(k)" data-target="#offerView" class="btn btn-sm btn-main-pink rounded-pill mx-1 hidden-xl hidden-xl-xl"><i class="fas fa-eye"></i></button>
                      -->
                    </div>
                  </div>

              </div>
         </div>
 
   
        

        <div class="d-flex flex-row w-100 justify-content-around py-3 pt-5 align-items-center p-2">
          <button :disabled="currentpage==1" @click="setPage" class="col-2 col-md-1 col-lg-1 col-xl-1 d-flex justify-content-center align-items-center page-item rounded-pill btn btn-light"><i class="fas fa-arrow-left"></i></button>
          <div class="d-flex flex-row justify-content-center col-8 col-lg-6 col-xl-6">
            <button :disabled="currentpage==item" v-for="(item,k1) in compLastpage" @click="setPage(item)" :key="k1" :class="'mx-2 d-flex justify-content-center align-items-center btn btn-sm py-2 text-white rounded-pill page-item'+(currentpage==item?' bg-main-blue':' bg-dark-blue')">
              <span class="text-center pr-1">
                {{item}}
              </span>
            </button>
          </div>
          <button :disabled="currentpage==compLastpage" @click="setPage(currentpage)" class="col-2 col-md-1 col-lg-1 col-xl-1 d-flex justify-content-center align-items-center page-item rounded-pill btn btn-light">
            
            <i class="fas fa-arrow-right"></i></button>
        </div>

      </div>
    </div>
</template>

<script>
export default {
    props:["items", "fields", "lastpage", "currentpage"],

    data(){
        return{
            baseUrl:baseUrl,
        }
    },

    mounted(){
      console.log("current page ", this.currentpage)
    },

    methods:{
      showPrice(price){
          return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      },
      setPage(pageNumber=1){
        this.$emit("pageSwitch", pageNumber);
      },

      emitConsult(index){
        this.$emit("consultItem",index);
      },

      emitView(index){
        this.$emit("viewItem",index);
      }
    },

    computed:{
      compFields:{
        get(){
          console.log("new ",this.fields);
          return this.fields
        }
      },
      compLastpage:{
        get(){
          console.log("new ", this.lastpage);
          return this.lastpage;
        }
      },
      compItems:{
        get(){
          console.log("new ",this.items);
          return this.items
        }
      }
    }
}
</script>
