<template>
  <div class="card card-info" id="createDepartmentAccordion">
    <a class="card-header collapsed" @click="active=!active" data-parent="#createDepartmentAccordion" href="#collapseCreateDepartment" aria-expanded="false" data-toggle="collapse">
      <h3 class="card-title">Nuevo Departamento</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool ml-auto " >
          <personal-fab :active="active" />
        </button>
      </div>
    </a>
    <div id="collapseCreateDepartment" class="panel-collapse in collapse" >
      <div class="card-body">
        <div class="form-group">
          <label>Nombre del Departamento</label>
          <input v-model="name" class="form-control">
        </div>
      </div>
      <div class="card-footer">
        <button type="button" class="btn btn-outline-success" @click="submitNewDepartment">Agregar</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      active:false,
      name:""
    }
  },
  mounted(){
  },
  methods:{
    submitNewDepartment: function(){
      let fd= new FormData();
      fd.append("name", this.name);
      let loader = this.$loading.show();

      axios.post(baseUrl+'/api/department',fd)
      .then(res=>{
        console.log("RESPONSE FROM SERVER ",res);
        toastr.success('Departamento creado exitosamente');
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
