<template>
<div class="col-12 col-lg-8 col-xl-9">
      <div class="d-flex flex-column w-100">

      

        <div class="d-flex flex-row w-100 justify-content-around mb-2 mt-3 bloque-proveedor-precios">
          <div class="col-xl-2 col-lg-3 col-md-4 px-1">
            <div class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill  p-1 text-wrap "><p class="text-tabla-detalles" >Proveedor</p></div>
          </div>
          
          <div v-for="(field,k2) in compFields" :key="k2" :class="'col-xl-2 px-1 col-lg-3 col-md-4 col-sm-4 offer-benefits hidden-md hidden-xs hidden-sm '+(!k2?'d-lg-flex':'hidden-lg')">
            <div class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill  p-1 text-wrap ">   <p @click="emitSpeed"  class="text-tabla-detalles" > {{field.name}}
                <i v-if="field.name == 'Velocidad'"  :class="'fa fa-angle-' +( (sortByDesc && sortBy !='')?'up':'down')" ></i>
           
             </p>  </div>
          </div>

          <div class="col-xl-2 col-lg-3 col-md-4 co px-1 col-sm-4 hidden-xs hidden-sm">
            <div class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill  p-1 text-wrap "  > <p class="text-tabla-detalles" >  Beneficios </p> </div>
          </div>
          
          <div class="col-xl-2 col-lg-3 col-md-4 px-1">
            <div class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap ">   <p @click="emitPrice" class="text-tabla-detalles" >   Precio
              
             
                <i  :class="'fa fa-angle-' +( (sortByDesc && sortBy !='')?'up':'down')"></i>
           
              </p>
             </div>
          </div>

           
            <div class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap ">   <p class="text-tabla-detalles" >  </p> </div>
          </div>
        </div>
        <div v-for="(offer,k) in compItems" :key="k" class="d-flex w-100 justify-content-around my-1 mb-3 offer offers-pagination-item pb-3">

              <div class="row"  style="hover:  {box-shadow: 0px 0px 4px 5px rgb(0 0 0 / 61%); }  
">



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
                            <div   v-if="offer.tipo_plan_logos == 3 ">
       <!--aca logito vozip-->             <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes" src="/images/service-2.png" width="30%" alt=""> </h6> 
                            </div>

                            <div   v-if="offer.tipo_plan_logos != 0 && offer.tipo_plan_logos != 1 && offer.tipo_plan_logos != 2  && offer.tipo_plan_logos != 3">
                            <img class="logo-movil-planes"  src="/images/Icono-trio.png" width="30%" alt="">
                            </div>
                   

                    <!--<h6 class="text-dark-blue pt-2">{{offer.company_name}}</h6> -->
                  </div>
                      
                      
                  <div  class="col-6 order-3   order-sm-2    text-wrap col-xl-2 col-lg-3 text-center flex-column align-items-center justify-content-center bloque-3">
                            
                              <div class="bloque-tecnologia">
                            <div   v-if="offer.tecnologia == 0">
                                  <img class="logo-tecnologia"  src="/images/Fibra1.png"  alt="" style="transform: rotate(90deg); margin-top: -5px;">
                            </div>
                            <div   v-if="offer.tecnologia == 1 ">
                                  <img class="logo-tecnologia" style="margin-top: -5px;" src="/images/satelital11.png" alt="">
                            </div>
                            <div   v-if="offer.tecnologia == 2">
      <!--poner aca la imagen de Hibrido -->    <img class="logo-tecnologia" style="margin-top: -5px;" src="/images/hibrido.png" alt="">
                            </div>
                            <div   v-if="offer.tecnologia == 3 ">
                                  <img class="logo-tecnologia" style="margin-top: -5px;" src="/images/cobre.png" alt="">
                            </div>
                            <div   v-if="offer.tecnologia == 4 ">
                                  <img class="logo-tecnologia" style="margin-top: -5px;" src="/images/radio.png" alt="">
                            </div>

                               <div   v-if="offer.tecnologia == 5 ">
  <!--poner aca la imagen de vozIP -->  <img class="logo-tecnologia" style="margin-top: -5px;" src="/images/vozip.png" alt="">
                            </div>
                            
                            </div>

                             <h6 class="text-lg">
                                <span class="texto-tecnologia-resultado-busqueda"> 
                                     <div class="texto-tecnologia-resultado-busqueda"   v-if="offer.tecnologia == 0">
                                      Fibra
                                    </div>
                                    <div  class="texto-tecnologia-resultado-busqueda"  v-if="offer.tecnologia == 1">
                                      Satelital
                                    </div>
                                    <div  class="texto-tecnologia-resultado-busqueda"  v-if="offer.tecnologia == 2">
                                      Híbrido
                                    </div>
                                    <div  class="texto-tecnologia-resultado-busqueda"  v-if="offer.tecnologia == 3">
                                      Cobre
                                    </div>
                                    <div   class="texto-tecnologia-resultado-busqueda" v-if="offer.tecnologia == 4">
                                      Radio
                                    </div>
                                     <div   v-if="offer.tecnologia == 5">
                                      Voz Ip
                                    </div>
                                </span> 
                                </h6>
                                <div class="raya-azul">
                                  <div :class="'offer-card-separator11 '+(index%2?'bg-main-blue':'bg-main-pink')"></div>

                                </div>
                               
                              
                  </div>

                  

                  <div  class="col-6 order-5   order-sm-3           'text-wrap col-2   col-xl-2 col-lg-3 text-center flex-column align-items-center justify-content-center d-xl-flex hidden-md  hidden-sm '+(!k3?'d-lg-flex':'hidden-lg')">
                  <div class=" tecnologia-movil  text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap " >   <p class="text-tabla-detalles" style="margin-top: -68px;">  Velocidad</p> </div>

                    <div class="icono-ondas"  >
                            <img src="/images/icono-ondas.png" width="50%" alt="" style="margin-top: 15px;">
                      </div>
                    <h6 class="text-lg">
                      
                  <span class="texto-velocidad-resultado-busqueda"   style=""> {{offer.fields_values[1].value}} <span v-if="offer.tecnologia == 5"> Kbps  </span> <span v-if="offer.tecnologia != 5"> Mbps </span>  </span>
                    </h6>
                  </div>

                  <div class="col-6 order-2  order-sm-4         text-wrap  col-2 col-xl-2 col-lg-3 col-md-4 col-sm-4 text-center flex-column align-items-center justify-content-center d-xl-flex d-lg-flex d-md-flex  hidden-sm" style="margin-top: 31px;">
                        
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
                      
                        
                        <button  type="button" data-toggle="modal" @click="emitConsult(k)" data-target="#modalConsultOffer"class="btn-adquierelo btn btn-lx btn-lg btn-main-blue rounded-pill mx-1 px-1 text-uppercase img-fluid" >Más Detalles</button>

                      <!--
                                              <button  type="button" data-toggle="modal" @click="emitConsult(k)" data-target="#modalConsultOffer" class="btn-adquierelo btn btn-lx btn-lg btn-main-blue rounded-pill mx-1 px-1 text-uppercase img-fluid" >ADQUIÉRELO</button>

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
   
</template>

<script>


export default {
    props:["items", "fields", "lastpage", "currentpage", "searchKey","query"],

    data(){
        return{
            baseUrl:baseUrl,
            sortBy:"",
            sortByDesc:true
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

      emitPrice(index){
        var  kk  = new URLSearchParams(this.query);
        kk.set("sortBy","tariff");
        this.sortBy = "tariff";
        this.sortByDesc = !this.sortByDesc;
        if(this.sortByDesc)kk.append("sortByDesc","true");
        else kk.delete("sortByDesc");
        console.log(kk.toString());
        console.log(this.query);

       
        this.$emit("customFiltering", kk.toString());
      }
      ,
      emitSpeed(index){
        var  kk  = new URLSearchParams(this.query);
        kk.set("sortBy","speed");
        this.sortBy = "speed";
        this.sortByDesc = !this.sortByDesc;
        if(this.sortByDesc)kk.append("sortByDesc","true");
        else kk.delete("sortByDesc");
        console.log(kk.toString());
        console.log(this.query);

       
        this.$emit("customFiltering", kk.toString());
      }
      ,

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
      sortBy:{
        get(){
          return this.sortBy;
        }
      }
      ,
      sortByDesc:{
        get(){
          return this.sortByDesc;
        }
      }
      ,
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
      },
      compQuery:{
        get(){
          console.log("new "  + this.query );
          return this.query;
        }
      }
    }
}
</script>
