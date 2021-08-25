<template>
<div class="modal fade" id="modalEditService" aria-modal="true" style="padding-right: 15px; display: block;">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h4 class="modal-title">Editar Servicio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Nombre del Servicio</label>
            <input v-model="service.name" class="form-control">
          </div>

          <div class="form-group">
            <label>Campos del servicio</label>
          </div>

        <div class="card card-success" id="createServiceFieldAccordion">
            <a class="card-header collapsed" @click="active2=!active2" data-parent="#createServiceFieldAccordion"
                href="#collapseCreateServiceField" aria-expanded="false" data-toggle="collapse">
                <h3 class="card-title">Nuevo Campo</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool ml-auto " >
                    <personal-fab :active="active2" />
                </button>
                </div>
            </a>

            <div id="collapseCreateServiceField" class="panel-collapse in collapse" >
                <div class="card-body">

                <div class="form-group">
                    <label>Nombre del Campo</label>
                    <input v-model="newFieldLabel" class="form-control">
                </div>

                <div class="form-group">

                    <label>Tipo de Campo</label>

                    <select v-model="newFieldType" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected value="string" data-select2-id="1">Texto</option>
                        <option value="number" data-select2-id="2">Numero</option>
                        <!-- <option value="select" data-select2-id="3">Seleccionable</option> -->
                    </select>

                </div>

                </div>

                <div class="card-footer">
                    <button type="button" class="btn btn-outline-success" @click="submitNewField">Agregar Campo</button>
                </div>
            </div>
        </div>

        <div class="card card-primary" id="ServicesFieldsAccordion">
            <a class="card-header collapsed" @click="active3=!active3" data-parent="#ServicesFieldsAccordion"
                href="#collapseServicesFields" aria-expanded="false" data-toggle="collapse">
                <h3 class="card-title">Lista de Campos</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool ml-auto " >
                    <personal-fab :active="active3" />
                </button>
                </div>
            </a>

            <div id="collapseServicesFields" class="panel-collapse in collapse" >
                <div class="card-body">

                    <ul class="list-group list-group-unbordered mb-3">
                        <li v-for="(field,index) in service.fields" :key="index" class="list-group-item">
                            <b>{{field.label}}</b>
                            <a class="float-right">{{getFieldType(field.type)}}
                              <button type="button" class="btn btn-tool p-1" @click="deleteField(field.label)">
                                <i class="float-button fas fa-plus-circle active text-danger" style=""></i>
                              </button>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-outline-info" @click="editService">Editar</button>
      </div>
    </div>
  </div>

</div>
</template>

<script>
export default {
  props:["service"],
  data(){
    return{
      active:false,
      active2:false,
      active3:false,
      newFieldLabel:"",
      newFieldType:"",
    }
  },
  methods:{
    deleteField(label){
      console.log('label ', label);
      this.service.fields = this.service.fields.filter((el)=> el.label != label);
    },
    submitNewField(){
      if (this.service.fields.length >= 2){
        toastr.error('Solo puedes añadir hasta 2 campos');
      }else{
        this.service.fields.push({
          label:this.newFieldLabel,
          type:this.newFieldType,
        })
      }
    },
    getFieldType(label=string){
      switch (label) {
        case "string":
        return "Texto"
        break;
        case "number":
        return "Numero"
        break;
        case "select":
        return "Seleccionable"
        break;

        default:
        break;
      }
    },
    editService(){
      let fd= new FormData();
      fd.append("name", this.service.name);
      fd.append("fields", this.service.fields.length?JSON.stringify(this.service.fields):"");
      fd.append("_method","put");

      let loader = this.$loading.show();

      axios.post(baseUrl+"/api/service/"+this.service.id, fd)
      .then(res=>{
        console.log("RESPONSE FROM SERVER ",res);
        toastr.success("Servicio editado con éxito");
        setTimeout(function(){
          window.location.reload();
        }, 2000);
      })
      .catch(err=>{
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
