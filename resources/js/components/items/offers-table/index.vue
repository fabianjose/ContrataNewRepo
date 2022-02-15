<template>
<div class="col-12">
      <div class="d-flex flex-column w-100">

      

        <div class="d-flex flex-row w-100 justify-content-around mb-2 mt-3 bloque-proveedor-precios">
           
           
            <div class="col-6 col-sm-4 hidden-xs hidden-sm">
          
          
            <div class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill  p-1 text-wrap "  >
              <div class="row">
                <div class="col-6 sol-sm-8">
                    <p class="text-tabla-detalles" >  Descripcion </p>
                                    </div>
                                    <div class="col-6 sol-sm-4">
                    <p class="text-tabla-detalles" >  Proveedor </p>
                </div>
              </div>
               
               
                </div>
          </div>

            <div v-for="(field,k2) in compFields" :key="k2" :class="'col-6 col-sm-2 offer-benefits \ '+(!k2?'d-lg-flex':'')">
                    <div class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill  p-1 text-wrap ">  
                    
                    
                    
                    
                      <p @click="emitSpeed"  class="text-tabla-detalles" > 
                        {{field.name}} 
                        <i v-if="field.name == 'Velocidad'" 
                        :class="'fa fa-angle-' +( (sortByDesc && sortBy !='')?'up':'down')" ></i>  </p> 
                        
                  </div>
         
          </div>

   
          
        

        
          
          <div class="col-6 col-sm-2 ">
            <div class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap ">   
              <p @click="emitPrice" class="text-tabla-detalles" >  
                 Precio
              
             
                <i  :class="'fa fa-angle-' +( (sortByDesc && sortBy !='')?'up':'down')"></i>
           
              </p>
             </div>
          </div>

           
            <div class="col-6 col-sm-2 text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap "> 
                <p class="text-tabla-detalles" >  </p> 
           </div>


          </div>



        </div>




        <div v-for="(offer,k) in compItems" :key="k" class=" justify-content-around my-1 mb-3 offer offers-pagination-item pb-3">

              <div class="row"  style="hover:  {box-shadow: 0px 0px 4px 5px rgb(0 0 0 / 61%); }">
               <div class="row hidden-sm hidden-lg hidden-md logo-empresa-mobile ">
                        <div class="col">
                           <img  :src="baseUrl+'/storage/'+offer.company_logo" class="hidden-sm hidden-lg hidden-md " style="width:40%"  >
                        </div>
                      </div>
                  <div class=" text-wrap  col-6  col-sm-4 text-center flex-column align-items-center   justify-content-center d-xl-flex d-lg-flex d-md-flex  hidden-sm titulos" style="">
                     
                      
                        <div class="row">
                          
                          <div class=" col-sm-8 col-xs-8">
                              <div >
                                  <div class=" tecnologia-movil  text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap " >
                                       
                                       </div>
                                  <h5 style="" class="titulo1" >{{offer.titulo1}}</h5> 
                                </div>

                                  <div >
                                    <h6 style="font-weight: 300;">{{offer.titulo2}}</h6> 
                                  <h6 style="line-height : 0px; font-weight: 300;">{{offer.titulo3}}</h6> 
                                  <h6 style="font-weight: 300;">{{offer.titulo4}}</h6> 
                                  </div>

                          </div>
                          <div class=" col-sm-4 col-xs-4 " style="">

                                    <div class="col-6  align-items-center justify-content-center">
               
               
                                         <img   :src="baseUrl+'/storage/'+offer.company_logo" class="imagen-proveedor hidden-xs"  width="200%">
                  

                                  </div>
                          </div>
                        </div>
                 
                    

                  <!--  <h6 class="text-sm">              
                    {{offer.benefits}}
                    </h6>-->
                  </div>

                
            
              
            
              
                
                 
                
  <!-- 
                            <div   v-if="offer.tipo_plan_logos == 0 ">
                    <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes" src="/images/service-2.png" width="30%" alt=""> </h6> 
                            </div>
                            <div   v-if="offer.tipo_plan_logos == 1 ">
                    <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes" src="/images/Icono-duo.png" width="30%" alt=""> </h6> 
                            </div>
                            <div   v-if="offer.tipo_plan_logos == 2 ">
                    <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes" src="/images/Icono-trio.png" width="30%" alt=""> </h6> 
                            </div>
                            <div   v-if="offer.tipo_plan_logos == 3 ">-->
       <!--aca logito vozip-->      <!--       <h6 class="text-dark-blue pt-2" style="text-align: center;"> <img class="logo-movil-planes" src="/images/service-2.png" width="30%" alt=""> </h6> 
                            </div>

                            <div   v-if="offer.tipo_plan_logos != 0 && offer.tipo_plan_logos != 1 && offer.tipo_plan_logos != 2  && offer.tipo_plan_logos != 3">
                            <img class="logo-movil-planes"  src="/images/Icono-trio.png" width="30%" alt="">
                            </div> -->
                   

                    <!--<h6 class="text-dark-blue pt-2">{{offer.company_name}}</h6> -->
                 





                 
                      
                  <div  class="col-6 col-sm-2  columna-tecnologia  ">
                              
                                       <div class="row fila-resultado-busqueda raya-vertical-tecnologia" style="">

                                    <span class="texto-tecnologia-resultado-busqueda ">

                                 
                                     <div class=""   v-if="offer.tecnologia == 0">
                                      Fibra
                                    </div>
                                    <div  class=""  v-if="offer.tecnologia == 1">
                                      Satelital
                                    </div>
                                    <div  class=""  v-if="offer.tecnologia == 2">
                                      Híbrido
                                    </div>
                                    <div  class=""  v-if="offer.tecnologia == 3">
                                      Cobre
                                    </div>
                                    <div   class="" v-if="offer.tecnologia == 4">
                                      Radio
                                    </div>
                                     <div   v-if="offer.tecnologia == 5">
                                      Voz Ip
                                    </div>
                                 </span>
                              </div>
                        
                          
                               

                          <!--     <div class="bloque-tecnologia">
                            <div   v-if="offer.tecnologia == 0">
                                  <img class="logo-tecnologia"  src="/images/Fibra1.png"  alt="" style="transform: rotate(90deg); margin-top: -5px;">
                            </div>
                            <div   v-if="offer.tecnologia == 1 ">
                                  <img class="logo-tecnologia" style="margin-top: -5px;" src="/images/satelital11.png" alt="">
                            </div>
                            <div   v-if="offer.tecnologia == 2"> --> 
      <!--poner aca la imagen de Hibrido -->     <!-- <img class="logo-tecnologia" style="margin-top: -5px;" src="/images/hibrido.png" alt="">-->
                        <!--    </div>
                            <div   v-if="offer.tecnologia == 3 ">
                                  <img class="logo-tecnologia" style="margin-top: -5px;" src="/images/cobre.png" alt="">
                            </div>
                            <div   v-if="offer.tecnologia == 4 ">
                                  <img class="logo-tecnologia" style="margin-top: -5px;" src="/images/radio.png" alt="">
                            </div>

                               <div   v-if="offer.tecnologia == 5 "> -->
  <!--poner aca la imagen de vozIP --> <!-- <img class="logo-tecnologia" style="margin-top: -5px;" src="/images/vozip.png" alt=""> 
                            </div>
                            
                            </div>-->

                         
                              
                  </div>



                    <div  class="col-6 col-sm-2  columna-velocidad  'hidden-md  hidden-sm '+(!k3?'d-lg-flex':'hidden-lg ')">
                      <div class="row fila-resultado-busqueda raya-vertical-velocidad" style="">

                   

                    <!--    <div class="icono-ondas"  >
                            <img src="/images/icono-ondas.png" width="50%" alt="" style="margin-top: 15px;">
                      </div> -->
                   
                    <span class="texto-velocidad-resultado-busqueda"   style=""> 

                    {{offer.fields_values[1].value}}
                    
                     <span v-if="offer.tecnologia == 5"> Kb  </span>
                  
                     <span v-if="offer.tecnologia != 5"> Mb </span>  </span>
                   
                  </div>

                     </div>

                 

              

                  <div class="col-6 col-sm-2       columna-precio">
                     <div class="row  fila-resultado-busqueda">

                  <span class="texto-precio-resultado-busqueda ">
                    $ {{showPrice(offer.tariff)}}
                  </span>
                    
                      </div>
                    
                  </div>

                  <div class="col-6 col-sm-2  hidden-xs  hidden-sm     py-2 text-center d-flex flex-column align-items-center justify-content-center">
                    <div class="stars-container flex-row justify-content-center mb-2">
                    <!--  <i v-for="(starCount,k4) in 5" :key="k4" :class="(starCount>offer.points?'far':'fas')+' fa-star'"></i>-->
                    </div>
                    <div class="d-flex flex-row">
                      
                        
                        <button  type="button" data-toggle="modal" @click="emitConsult(k)" data-target="#modalConsultOffer" class=" hidden-xs  hidden-sm     btn-adquierelo btn btn-lx btn-lg btn-main-blue rounded-pill mx-1 px-1 text-uppercase img-fluid" >Solicitar Plan</button>

                      <!--
                                              <button  type="button" data-toggle="modal" @click="emitConsult(k)" data-target="#modalConsultOffer" class="btn-adquierelo btn btn-lx btn-lg btn-main-blue rounded-pill mx-1 px-1 text-uppercase img-fluid" >ADQUIÉRELO</button>

                        <button type="button" data-toggle="modal" @click="emitView(k)" data-target="#offerView" class="btn btn-sm btn-main-pink rounded-pill mx-1 hidden-xl hidden-xl-xl"><i class="fas fa-eye"></i></button>
                      -->
                    </div>
                  </div>
                          
              </div>
                <div class="row hidden-md  hidden-sm hidden-lg boton-solicitarplan-mobile text-center" style="justify-content: center;">
                          <button  type="button" data-toggle="modal" @click="emitConsult(k)" data-target="#modalConsultOffer" class="hidden-md  hidden-sm hidden-lg  btn-adquierelo btn btn-lx btn-lg btn-main-blue rounded-pill mx-1 px-1 text-uppercase img-fluid" >Solicitar Plan</button>

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





      <!--
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css' />

<div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="tile">
                    <div class="wrapper">

                      


                        <div class="stats">

                          

                            <div>
                                <strong>JOINED</strong> 562
                            </div>

                            <div>
                                <strong>DECLINED</strong> 182
                            </div>

                        </div>

                        <div class="stats">

                          

                            <div>
                                <strong>JOINED</strong> 562
                            </div>

                            <div>
                                <strong>DECLINED</strong> 182
                            </div>

                        </div>

                        <div class="stats">


                            <div>
                                <strong>JOINED</strong> 562
                            </div>

                            <div>
                                <strong>DECLINED</strong> 182
                            </div>

                        </div>

                      
                    </div>
                </div> 
            </div>

          
        </div>

        
    </div>-->

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
<style >
/*
.dates{
	border:1px solid #ebeff2;
	border-radius:5px;
	padding:20px 0px;
	margin:10px 20px;
	font-size:16px;
	color:#5aadef;
	font-weight:600;	
	overflow:auto;
}
.dates div{
	float:left;
	width:50%;
	text-align:center;
	position:relative;
}
.dates strong,
.stats strong{
	display:block;
	color:#adb8c2;
	font-size:11px;
	font-weight:700;
}
.dates span{
	width:1px;
	height:40px;
	position:absolute;
	right:0;
	top:0;	
	background:#ebeff2;
}
.stats{
	border-top:1px solid #ebeff2;
	background:#f7f8fa;
	overflow:auto;
	padding:15px 0;
	font-size:16px;
	color:#59687f;
	font-weight:600;
	border-radius: 0 0 5px 5px;
}
.stats div{
	border-right:1px solid #ebeff2;
	width:50%;
	float:left;
	text-align:center
}


div.footer {
	text-align: right;
	position: relative;
	margin: 20px 5px;
}

div.footer a.Cbtn{
	padding: 10px 25px;
	background-color: #DADADA;
	color: #666;
	margin: 10px 2px;
	text-transform: uppercase;
	font-weight: bold;
	text-decoration: none;
	border-radius: 3px;
}

div.footer a.Cbtn-primary{
	background-color: #5AADF2;
	color: #FFF;
}

div.footer a.Cbtn-primary:hover{
	background-color: #7dbef5;
}

div.footer a.Cbtn-danger{
	background-color: #fc5a5a;
	color: #FFF;
}

div.footer a.Cbtn-danger:hover{
	background-color: #fd7676;
}*/

 
</style>