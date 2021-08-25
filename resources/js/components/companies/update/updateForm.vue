<template>
<div class="modal fade" id="modalEditCompany" aria-modal="true" style="padding-right: 15px; display: block;">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h4 class="modal-title">Editar Empresa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="d-flex flex-column align-items-center py-4">
                <h4 class="px-2 my-3 text-dark card-text">Logo de la Empresa</h4>
                <img class="img-fluid" style="max-height:150px;" :src="onPreview?onPreview:(baseUrl+'/storage/'+company.logo)" alt="">
          </div>
          <div class="form-group">
              <label>Nombre de la Empresa</label>
              <input v-model="company.name" class="form-control">
          </div>

          <div class="form-group">
              <label for="exampleInputFile">Subir Imagen</label>
              <div class="input-group">
              <div class="custom-file">
                  <input type="file" class="custom-file-input" @change="uploadFile" ref="SelectFileForUpdate" id="InputFile">
                  <label class="custom-file-label" for="InputFile">Seleccionar Archivo</label>
              </div>
              </div>
          </div>

          <div class="form-group">
              <label>NIT de la Empresa</label>
              <input v-model="company.nit" class="form-control">
          </div>

          <div class="form-group">
              <label>Teléfono de la Empresa</label>
              <input v-model="company.phone" class="form-control">
          </div>

          <div class="form-group">
              <label>Web de la Empresa</label>
              <input v-model="company.web" class="form-control">
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-outline-info" @click="editCompany">Editar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>

</div>
</template>

<script>
export default {
  props:["company"],
  data(){
    return{
      onPreview:null,
      baseUrl:baseUrl
    }
  },
  methods:{
    uploadFile: function(){
      console.log("[File] Change")
      let uploadFile=this.$refs.SelectFileForUpdate.files[0]
      if(!uploadFile){
        console.log("[File] None")
        return;
      }
      this.company.logo=uploadFile;
      this.onPreview=URL.createObjectURL(uploadFile);
    },
    editCompany(){
      let fd= new FormData();
      fd.append("name", this.company.name);
      fd.append("nit", this.company.nit);
      fd.append("phone", this.company.phone);
      fd.append("logo", this.company.logo);
      fd.append("web", this.company.web);
      fd.append("_method","put")

      let loader = this.$loading.show();
      axios.post(baseUrl+"/api/company/"+this.company.id, fd)
      .then(res=>{
        console.log("RESPONSE FROM SERVER ",res);
        toastr.success("Empresa editada con éxito");
        setTimeout(function(){
          window.location.reload();
        }, 2000);
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
    }
  }
}
</script>
