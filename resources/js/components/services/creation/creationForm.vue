<template>
    <div class="card card-info" id="createServiceAccordion">
      <a class="card-header collapsed" @click="active=!active" data-parent="#createServiceAccordion"
        href="#collapseCreateService" aria-expanded="false" data-toggle="collapse">
          <h3 class="card-title">
            Nuevo Servicio
            <i class="fas fa-question-circle text-md" data-toggle="tooltip"
            data-placement="top"
            title="Aquí podrás definir campos adicionales de los servicios, ya hay definidos por defecto como lo son: Descripción, Tarifa y Puntuación"></i>
          </h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool ml-auto " >
              <personal-fab :active="active" />
            </button>
          </div>
        </a>

      <div id="collapseCreateService" class="panel-collapse in collapse" >
        <div class="card-body">
          <div class="form-group">
            <label>Nombre del Servicio</label>
            <input v-model="name" class="form-control">
          </div>
          <div class="form-group">
            <label>Campos del servicio</label>
          </div>
            <div class="row w-100 flex-wrap justify-content-around">
              <div class="col-md-6 col-sm-10 col-10 col-lg-6 col-xl-6">
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
                      <input v-model="newFieldName" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tipo de Campo</label>
                      <select v-model="newFieldType" class="form-control select2 " style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected value="string" data-select2-id="1">Texto</option>
                        <option value="numeric" data-select2-id="2">Numero</option>
                        <!-- <option value="select" data-select2-id="3">Seleccionable</option> -->
                      </select>

                    </div>
                    <div v-if="newFieldType=='numeric'" class="form-group">
                      <label>
                        Unidad del campo
                        <p class="text-muted text-sm mb-1" >
                          <span class="text-danger">* </span> este campo es opcional
                        </p>
                      </label>
                      <input v-model="newFieldUnit" class="form-control">
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="button" class="btn btn-outline-success" @click="submitNewField">Agregar Campo</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-10 col-10 col-lg-6 col-xl-6">
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
                            <li v-for="(field,k) in fields" :key="k" class="list-group-item">
                                <b>{{JSON.parse(field).name}}</b>
                                <a class="float-right">{{getFieldType(JSON.parse(field).type, JSON.parse(field).unit)}}
                                  <button type="button" class="btn btn-tool p-1" @click="deleteField(k)">
                                    <i class="float-button fas fa-plus-circle active text-danger"></i>
                                  </button>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer">
            <button type="button" class="btn btn-outline-success" @click="submitNewService">Agregar</button>
        </div>
      </div>
    </div>
</template>

<script>
import 'bootstrap/js/dist/tooltip.js';
const $ = require('jquery');
export default {
  name: 'companyCreation',
  data(){
    return {
      active:false,
      active2:false,
      active3:false,
      name:"",
      logo:null,
      nit:"",
      phone:"",
      web:"",
      fields:[],
      newFieldName:"",
      newFieldType:"",
      newFieldUnit:"",
    }
  },
  mounted(){
    $('[data-toggle="tooltip"]').tooltip();
    console.log(baseUrl);
  },
  methods:{

    uploadFile: function(){
      console.log("[File] Change")
      let uploadFile=this.$refs.SelectFile.files[0]
      if(!uploadFile){
        console.log("[File] None")
        return;
      }
      this.logo=uploadFile;
    },
    submitNewField(){

      if(!this.newFieldName||this.newFieldName=="") return toastr.error("rellene todos los campos requeridos ");
      if(!this.newFieldType||this.newFieldType=="") return toastr.error("rellene todos los campos requeridos ");

      this.OpenAccordion("#ServicesFieldsAccordion","#collapseServicesFields", "active3");
      if (this.fields.length >= 2){
        toastr.error('Solo puedes añadir hasta 2 campos');
      }else{
        if (!this.newFieldName || !this.newFieldType) {
          return toastr.error('Debe llenar ambos campos');
        }
        this.fields.push(JSON.stringify({
          name:this.newFieldName,
          type:this.newFieldType,
          unit:this.newFieldUnit?this.newFieldUnit:null,
        }));
        toastr.success('Campo '+ this.newFieldName +' añadido');
        this.newFieldName = "";
        this.newFieldType = "";
        this.newFieldUnit =""
      }
    },

    getFieldType(label="",unit=null){
      switch (label) {
        case "string":
        return "Texto"
        break;
        case "numeric":
        return "Numero"+(unit?" ("+unit+")":"")
        break;

        default:
        break;
      }
    },

    submitNewService: function(){
      console.log(this.fields);
      let fd= new FormData();
      fd.append("name", this.name);
      fd.append("fields", JSON.stringify(this.fields));

      let loader = this.$loading.show();
      axios.post(baseUrl+'/api/service',fd)
      .then(res=>{
        console.log("RESPONSE FROM SERVER ",res);
        toastr.success(res.data);
        this.name = "";
        this.fields = [];
        this.$emit("creatingDone")
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
    deleteField(index){
      console.log("index ",index)
      this.fields.splice(index,1);
    },
    OpenAccordion(parentId,childId,activeIndex){
      if(!$(parentId).hasClass("collapsed")) $(parentId).addClass("collapsed");
      else return;
      if(!$(childId).hasClass("show")) $(childId).addClass("show");
      else return;
      this[activeIndex]= !this[activeIndex];
    },
  }
}
</script>
