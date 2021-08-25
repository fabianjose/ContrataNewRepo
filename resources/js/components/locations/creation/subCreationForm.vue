<template>
  <div class="card card-info" id="createMunicipalityAccordion">
    <a class="card-header collapsed" @click="active=!active" data-parent="#createMunicipalityAccordion" 
        href="#collapseCreateMunicipality" aria-expanded="false" data-toggle="collapse">
      <h3 class="card-title">Nuevo Municipio</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool ml-auto " >
          <personal-fab :active="active" />
        </button>
      </div>
    </a>
    <div id="collapseCreateMunicipality" class="panel-collapse in collapse" >
      <div class="card-body">
        <zone-select :hideMunicipality="true" :noRequest="true" @newDepartment="newDepartment" >
            <div class="form-group col-6">
              <label>Nombre del Municipio</label>
              <input v-model="name" class="form-control">
            </div>        
        </zone-select>
      </div>
      <div class="card-footer">
        <button type="button" class="btn btn-outline-success" @click="submitNew">Agregar</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      active:false,
      name:"",
      department:"",
    }
  },
  mounted(){
  },
  methods:{
    newDepartment(val){
        this.department=val;
    },
    submitNew(){
      let fd= new FormData();

      fd.append("name", this.name);
      
      fd.append("department", this.department);

      let loader = this.$loading.show();

      axios.post(baseUrl+'/api/municipalities',fd)
      .then(res=>{
        console.log(res);
        toastr.success('Municipio creado exitosamente');
        this.name = "";
        this.$emit("creatingDone");
      }).catch(err=>{
        if(err.response.status===403){
          window.location.replace(baseUrl+"/login");
        }
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }else {
          let allErrors = err.response.data;
          for (var errorkey in allErrors) {
            if (allErrors[errorkey]){
              for (var error of allErrors[errorkey]) {
                toastr.error(error);
              }
            }
          }
        }
      }).finally(()=>loader.hide());

    },
  }
}
</script>
