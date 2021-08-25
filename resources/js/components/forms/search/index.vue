
<template>
    <div class="main-middle text-ws" >
        <div class="main-search-form py-1 px-1 mt-3" >

          <div class="row text-center fila-iconos-buscador"  >
             <div class=" text-center text-heebo custom-control custom-radio form-group has-search col-6 col-sm-3" @click="offerType='private';" >
                    <input type="radio" class="custom-control-input " :checked="offerType=='private'" id="privateOffer" >
                    <label class="custom-control-label" style="font-weight: medium;color: #606060;" for="privateOffer">Hogar  </label> <span> <img style="    margin-top: -14px;" src="images/Iconos-11.png" height="35px" alt=""> </span> 
                </div>
             
                <div class=" text-center text-heebo custom-control custom-radio form-group has-search col-6 col-sm-3" @click="offerType='Pyme';" >
                    <input type="radio" class="custom-control-input " :checked="offerType=='Pyme'" id="pymeOffer" >
                    <label class="custom-control-label" style="font-weight: medium;color: #606060;" for="pymeOffer">Pyme</label>   <span> <img style="    margin-top: -14px;" src="images/Iconos-12.png" height="35px" alt=""> </span> 
                </div>               

                <div class=" text-center text-heebo custom-control custom-radio form-group has-search col-6 col-sm-3" @click="offerType='company';" >
                    <input type="radio" class="custom-control-input " :checked="offerType=='company'" id="companyOffer">
                    <label class="custom-control-label" style="font-weight: medium;color: #606060;" for="companyOffer">Empresa</label>  <span> <img style="    margin-top: -14px;" src="images/Iconos-13.png" height="35px" alt=""> </span> 
                </div>
                 <div class=" text-center text-heebo custom-control custom-radio form-group has-search col-6 col-sm-3" @click="offerType='isp';" >
                    <input type="radio" class="custom-control-input " :checked="offerType=='isp'" id="ispOffer" >
                    <label class="custom-control-label" style="font-weight: medium;color: #606060;" for="ispOffer">ISP</label>  <span> <img style="    margin-top: -14px;" src="images/Iconos-14.png" height="35px" alt=""> </span> 
                </div>
          </div>

           
         
          <div :class="' '+(index%2?'bg-main-blue':'bg-main-pink')" style=" width: 73%; height: 1px; background: #585e5e;
    margin-left: 67px;
"></div>
<br>

            <div class="d-flex flex-row flex-wrap justify-content-around borde-caja-buscador" >
               
             
                <div class="form-group has-search ci-select-container col-md-6 col-sm-10 col-lg-3">
                  
                    <select  class="custom-select ci-select "  v-model="service">
                        <option value="" class="d-none" selected>Servicio</option>
                        <option v-for="(service,index) in services" :key="index"
                            :value="service.name">{{service.name}}
                        </option>
                    </select>
                </div>

                <div class="form-group has-search col-md-6 col-sm-10 col-lg-4">
                 
                    <select class="custom-select ci-select" v-model="department" @change="getMunicipalities">
                      <option value="" class="d-none" selected>Departamento</option>
                      <option v-for="(department,index) in departments" :key="index" :value="department.name">{{department.name}}</option>
                    </select>
                 
                </div>

                <div class="form-group has-search col-md-6 col-sm-10 col-lg-4">
                
                    <select class="custom-select ci-select" v-model="municipality">
                      <option value="" class="d-none" selected>Municipio</option>
                      <option v-for="(municipality,index) in municipalities" :key="index" :value="municipality.name">{{municipality.name}}</option>
                    </select>
               
                </div>
                 <div class="form-group has-search col-md-6 col-sm-10 col-lg-1 " @click="search" >
                 <img class="lupa"  src="images/Iconos_lupa-14.png"  alt=""> 
                   </div>
            </div>
          </div>
            
    </div>
    
</template>

<script>
export default {
  props:['errors'],
  data(){
    return{
      municipality:"",
      department:"",
      service:"",
      baseUrl:baseUrl,
      offerType:"private",
      services:[],
      departments:[],
      municipalities:[],
    }
  },

  mounted(){
    if (this.errors){
      let allErrors = this.errors;
      for (var errorkey in allErrors) {
        if (allErrors[errorkey]){
          for (var error of allErrors[errorkey]) {
            toastr.error(error);
          }
        }
      }
    };
    this.getServices();
    this.getDepartments();
  },
  methods:{
    getServices(){
      axios.get(baseUrl+"/api/services")
      .then(res=>{
        this.services=res.data;
      })
      .catch(err=>{
        console.log("ERROR FROM SERVER ", err,err.response);
        toastr.error("error al cargar los servicios");
      });
    },
    getDepartments(){
      axios.get(baseUrl+"/api/departments")
      .then(res=>{
        this.departments = res.data;
      })
      .catch(err=>{
        console.log("ERROR FROM SERVER ", err,err.response);
        toastr.error("error al cargar los departamentos");
      });
    },
    setDepartment(val){
      this.getMunicipalities();
    },
    setMunicipality(val){
      console.log("new val ",val);
      this.municipality=val;
    },
    setService(val){
      console.log("new val ",val);
      this.service=val;
      if(!this.noRequest)this.getMunicipalities();
    },
    getMunicipalities(){
      axios.get(baseUrl+'/api/municipalities/'+this.department)
      .then(res=>{
        console.log(res);
        this.municipalities = res.data;
      }).catch(err=>{
        console.log("ERROR FROM SERVER ", err,err.response);
        toastr.error("Error al cargar los municipios");
      });
    },

    search(){
      console.log("type ", this.offerType)
      
      let loader = this.$loading.show();
      
      let query="?";
      
      if(this.department&&this.department!="") query+="department="+ encodeURIComponent(this.department);
      else {loader.hide();return toastr.error("rellene todos los campos");}
      
      if(this.municipality&&this.municipality!="") query+="&municipality="+encodeURIComponent(this.municipality);
      else {loader.hide();return toastr.error("rellene todos los campos");}
      
      if(this.service&&this.service!="")  query+="&service="+encodeURIComponent(this.service);
      else {loader.hide();return toastr.error('rellene todos los campos');}

      query+="&offer_type="+encodeURIComponent(this.offerType);
      
      window.location.replace(baseUrl+"/offers/search"+query)
    },
  },
}
</script>









