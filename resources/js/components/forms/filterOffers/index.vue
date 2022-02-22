<template> 
<div>
  <div class="card card-primary filter-card mb-5 p-3" style="box-shadow: none;">
    <div class="card-body d-flex flex-column align-items-center   pt-4" style="box-shadow: none;">
      <div class="d-flex flex-column justify-content-between" style="width: 100%;">
      
      <h4  class="filter-card-title font-weight-bold text-center" style="align-self: center;" >
      
      Filtro de búsqueda</h4>
        <!--<i class="fas fa-filter" style="display: inline-block;">    </i>-->
        
     </div>
         <br>

           <div class="form-horizontal my-2 col-12 flex-wrap" >
        <div  type="button" data-toggle="collapse" data-target="#collapsePlan" aria-expanded="false" aria-controls="collapsePlan" style="display:flex;justify-content: space-between;">
          <h4 class="btn-block texto-filtro" style="">  Tipo de Plan   </h4> <span><i  class="fas fa-angle-down" style="color: #055a76;
    font-size: 1.2em;"></i></span>
        </div>
        <div class="collapse" id="collapsePlan">
          <div class="card card-body" style="background-color: #f7f7f7;">
            <div v-for="(value) in plans" :key="value.id">
              <input type="checkbox" :value="value.id" v-model="checked_plans">
              <label class="text-ws" style="color: #606060; font-size: 0.8em;"  >{{value.name}}</label>
            </div>
          </div>
        </div>
      </div>
      <div class="form-horizontal my-2 col-12 flex-wrap" >
        <div  type="button" data-toggle="collapse" data-target="#collapseProveedor" aria-expanded="false" aria-controls="collapseProveedor" style="display:flex;justify-content: space-between;">
          <h4 class="btn-block texto-filtro" style="">  Proveedor   </h4> <span><i  class="fas fa-angle-down" style="color: #055a76;
    font-size: 1.2em;"></i></span>
        </div>
        <div class="collapse" id="collapseProveedor">
          <div class="card card-body" style="background-color: #f7f7f7;">
            <div v-for="(value) in providers" :key="value.id">
              <input type="checkbox" :value="value.id" v-model="checked_providers">
              <label class="text-ws" style="color: #606060;"  >{{value.name}}</label>
            </div>
          </div>
        </div>
      </div>
     
      <div class="form-horizontal my-2 col-12 flex-wrap">
        <div  type="button" data-toggle="collapse" data-target="#collapseTecnologia" aria-expanded="false" aria-controls="collapseTecnologia"  style="display:flex;justify-content: space-between;">
        <h4 class="btn-block text-ws texto-filtro" style="">  Tecnología   </h4> <span><i  class="fas fa-angle-down" style="color: #055a76;
    font-size: 1.2em;"></i></span>    
 
        </div>
        <div class="collapse" id="collapseTecnologia">
          <div class="card card-body" style="background-color: #f7f7f7;">
            <div v-for="(value) in technologies" :key="value.id">
              <input type="checkbox" :value="value.type" v-model="checked_technologies">
               <label class="text-ws" style="color: #606060" v-if="value.type == 0 ">Fibra</label>
               <label class="text-ws" style="color: #606060"   v-if="value.type == 1 ">
           Satelital</label>
               <label class="text-ws" style="color: #606060"  v-if="value.type == 2 ">
          FTTH</label>
               <label class="text-ws" style="color: #606060"  v-if="value.type == 3 ">
            Cobre</label>
               <label class="text-ws" style="color: #606060"  v-if="value.type == 4 ">
           Radio</label>
            </div>
          </div>
        </div>
      </div>

      <div class="form-horizontal my-2 col-12 flex-wrap">
        <div type="button" data-toggle="collapse" data-target="#collapseVelocidad" aria-expanded="false" aria-controls="collapseVelocidad" style="display:flex;justify-content: space-between;">
          <h4 class="btn-block texto-filtro" style="">  Velocidad   </h4> <span><i  class="fas fa-angle-down" style="color: #055a76;
    font-size: 1.2em;"></i></span>
        </div>
<div class="collapse" id="collapseVelocidad">
  <div class="card card-body" style="background-color: #f7f7f7;">
    <vue-slider
      v-model="value"
      :order="true"
      :min="speeds.mins"
      :max="speeds.maxs"
      :interval="1"
      :tooltip-formatter="formatter2"
    > </vue-slider>
       <div class="row">
     <div class="col text-left">
        <span>{{value[0]}} Mbps</span>
     </div>
     <div class="col text-right">
       <span  >{{value[1]}} Mbps</span> 
     </div>
   </div>
      
  </div>
</div>
</div>


<div class="form-horizontal my-2 col-12 flex-wrap" >
  <div  type="button" data-toggle="collapse" data-target="#collapsePrecio" aria-expanded="false" aria-controls="collapseExample" style="display:flex;justify-content: space-between;">
 <h4 class="btn-block texto-filtro" style="">  Precio   </h4> <span><i  class="fas fa-angle-down" style="color: #055a76;
    font-size: 1.2em;"></i></span>

  </div>

<div class="collapse" id="collapsePrecio">
  <div class="card card-body" style="background-color: #f7f7f7;" v-if="orderBy">

            <input class="form-control" style="    border-radius: 9px;
" id="precio_bajo" v-model="fromPrice" placeholder=" $ Desde">
            <br>
            <input class="form-control" style="    border-radius: 9px;
" id="precio_alto" v-model="toPrice" placeholder=" $ Hasta">
                
      
 
  </div>
</div>



    </div>

  </div>
    <div class="card-footer d-flex justify-content-center pb-4" style="background-color: #f7f7f7;">
      <div class="col-lg-8 col-md-10 col-sm-10">
        <i class="fa fa-search icon-btn"></i>
        <button @click="emitFilter" class="btn btn-block btn-dark-blue ">
          Buscar
        </button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {

  props:["fields","providers","plans", "max_price", "min_price","technologies","speeds"],

  data(){
    return{
      orderBy:"tariff",
      fromPrice:this.min_price,
      toPrice:this.max_price,
      orderBySort:"desc",
      checked_technologies:[],
      checked_providers:[],
      checked_plans: [],
      value: [this.speeds.mins,this.speeds.maxs],
      patron:new RegExp(/\d{1,3}(?:,\d{3})*(?:\.\d+)?/),
      formatter2: v => `${('' + (v)).replace(/\B(?=(\d{3})+(?!\d))/g, ',')} Mbps`
    }
  },

  methods:{
    emitFilter(){
      //console.log(max_price);
     // return;
      let searchKey="";
      if(this.orderBy){
        searchKey+="&sortBy="+this.orderBy;
        if(this.orderBySort=="desc") searchKey+="&sortByDesc=true";
      }
 if(this.fromPrice&&this.fromPrice!=""){
        
        if(!isNaN(this.fromPrice)) searchKey+="&from="+parseFloat(this.fromPrice);

        else return toastr.error("El campo 'Desde' es de valor numérico")
        
      }
     if(this.toPrice&&this.toPrice!=""){
        
        if(!isNaN(this.toPrice)) searchKey+="&to="+parseFloat(this.toPrice);

        else return toastr.error("El campo 'Hasta' es de valor numérico")
        
      }
      if(this.checked_technologies.lenght != 0){
        searchKey+="&technologies="+this.checked_technologies;
      }
        searchKey+="&mins="+this.value[0];
        searchKey+="&maxs="+this.value[1];
      
      if(this.checked_technologies.lenght != 0){
        searchKey+="&providers="+this.checked_providers;
      }
      if(this.checked_plans.lenght != 0){
        searchKey+="&plans="+this.checked_plans;
      }
     console.log(searchKey);
      this.$emit("customFiltering", searchKey);

    },
  },

  computed:{
    compFields:{
      get(){
        return this.fields;
      }
    }
  }

}
</script>
