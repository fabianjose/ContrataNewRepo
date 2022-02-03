
<template>

   


  <div class="registration-form">
        <form>
           <div class="row">

                          <div class="col">
                  
                  
                                    <div class="custom-control custom-radio" @click="offerType='private';">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input"  :checked="offerType=='private'">
                                                    <label class="custom-control-label" for="customRadio1"> <p class="texto-radios" > Hogar</p>  </label><span> <img style="    margin-top: -14px; " src="images/Icono-Hogar.png" height="35px" alt=""> </span>
                                    </div>
                          </div>

                          <div class="col">
                    
                                    <div class="custom-control custom-radio "  @click="offerType='company';">
                                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input"  :checked="offerType=='company'">
                                        <label class="custom-control-label" for="customRadio2"> <p class="texto-radios" >Empresa </p> </label><span> <img style="    margin-top: -14px;" src="images/Icono-Empresas.png" height="35px" alt=""> </span>
                                    </div>
                          </div>             

           </div>
           <br>

            <div class="row">

                        <div class="col">
                            <div class="custom-control custom-radio" :checked="offerType=='Pyme'">
                              <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" :checked="offerType=='Pyme'">
                                <label class="custom-control-label" for="customRadio3"> <p class="texto-radios" >Pymes </p> </label><span> <img style="    margin-top: -14px;" src="images/Icono-Pymes.png" height="35px" alt=""> </span>
                            </div>
                        </div>


                        <div class="col">
                                <div class="custom-control custom-radio" @click="offerType='isp';">
                                    <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input" :checked="offerType=='isp'" >
                                    <label class="custom-control-label" for="customRadio4"> <p class="texto-radios" >ISPs </p> </label><span> <img style="    margin-top: -14px;" src="images/Icono-ISPs.png" height="35px" alt=""> </span>
                                </div>

                        </div>
            
  
            </div>

                    <br>
                        <div class="form-group">
                        <select class="custom-select custom-select-sm " v-model="service">
                        <option value="" class="d-none" selected>Servicio</option>
                        <option v-for="(service,index) in services" :key="index"
                            :value="service.name">{{service.name}}
                        </option>
            </select>
                        </div>
                        <div class="form-group">
                        <select class="custom-select custom-select-sm" v-model="department" @change="getMunicipalities">
                         <option value="" class="d-none" selected>Departamento</option>
                         <option v-for="(department,index) in departments" :key="index" :value="department.name">{{department.name}}</option>
            </select>
                        </div>
                        <div class="form-group">
                        <select class="custom-select custom-select-sm" v-model="municipality">
                        <option value="" class="d-none" selected>Municipio</option>
                        <option v-for="(municipality,index) in municipalities" :key="index" :value="municipality.name">{{municipality.name}}</option>
            </select>

            <div class="form-group" style="text-align: -webkit-center;">
                <button type="button" class="btn btn-block create-account" @click="search">Buscar</button>
            </div>
            </div>
         
        </form>
       
    </div>


<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

   
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









