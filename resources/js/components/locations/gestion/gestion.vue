<template>
  <div class="container-fluid">
    <div class="row justify-content-center py-1">
      <div class="col-8 col-sm-10">
        <location-creation @creatingDone="refreshData" />
      </div>
    </div>
    <div class="row justify-content-center py1">
      <div class="col-8 col-sm-10">
        <sub-location-creation></sub-location-creation>        
      </div>
    </div>
    <div class="row justify-content-center py-1">
      <div class="col-8 col-sm-10">
        <div class="card card-info" id="departmentsListAccordion">
          <a class="card-header collapsed" @click="active=!active" data-parent="#departmentsListAccordion" href="#collapseDepartments" aria-expanded="false" data-toggle="collapse">
            <h3 class="card-title">Departamentos Disponibles</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool ml-auto" >
                <personal-fab :active="active" />
              </button>
            </div>
          </a>
          <div id="collapseDepartments" class="panel-collapse in collapse">
            <div class="card-body p-0">
              <ul class="list-group p-0">
                <zone-item v-for="(department,k) in departments" :key="k" :title="department.name" :index="department.id" @delete="trash" @edit="update" zone="departments" />
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center py-4">
      <div class="col-8 col-sm-10">
        <div class="card card-primary ">
          <div class="card-header">
            <h3 class="card-title">Busqueda por Departamento</h3>
          </div>
          <div class="card-body">
            
            <zone-select @newDepartment="newDepartment" @newMunicipalities="setMunicipalities" :middle="true" :hideMunicipality="true" ></zone-select>

            <div class="row my-3 px-4">
              <button type="button" class="btn btn-outline-success" @click="refreshData">Buscar municipios por departamento</button>
            </div>
          </div>
        </div>

        <div class="card card-info" id="municipalitiesListAccordion">
          <a class="card-header collapsed" @click="active2=!active2" data-parent="#municipalitiesListAccordion" href="#collapseMunicipalities" aria-expanded="false" data-toggle="collapse">
            <h3 class="card-title">Municipios{{department!=''?' de '+department:''}} Disponibles</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool ml-auto" >
                <personal-fab :active="active2" />
              </button>
            </div>
          </a>

          <div id="collapseMunicipalities" class="panel-collapse in collapse">
            <div class="card-body p-0">
              <ul class="list-group p-0">
                <zone-item v-for="(municipality,i) in municipalities" :key="i" :title="municipality.name" :index="municipality.id" zone="municipalities" @delete="trash" @edit="update" />
              </ul>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      departments:[],
      currentLocation:null,
      viewMode:false,
      updateMode: false,
      municipalities:[],
      active:false,
      active2:false,
      department:""
    }
  },
  mounted(){
    this.refreshData();
  },
  methods:{

    OpenAccordion(parentId,childId,activeIndex){
      if(!$(parentId).hasClass("collapsed")) $(parentId).addClass("collapsed");
      else return;
      if(!$(childId).hasClass("show")) $(childId).addClass("show");
      else return;
      this[activeIndex]= !this[activeIndex];
    },

    setMunicipalities(items){
      this.municipalities=items;
      console.log("setting current municipalities",this.municipalities);
      this.OpenAccordion("#municipalitiesListAccordion","#collapseMunicipalities","active2");
    },

    newDepartment(department){
      this.department=department;
    },


    refreshData(){
      axios.get(baseUrl+'/api/departments')
      .then(res=>{
        console.log(res);
        this.departments=res.data;
      }).catch(err=>{
        if(err.response.status===403){
          window.location.replace(baseUrl+"/login");
        }
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      });
    },
    trash(data){
      let loader = this.$loading.show();

      axios.delete(baseUrl+'/api/'+data.zone+'/'+data.id)
      .then(res=>{
        console.log(res);
        toastr.success("Eliminado con éxito");
        this.refreshData();
      }).catch(err=>{
        if(err.response.status===403){
          window.location.replace(baseUrl+"/login");
        }
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      }).finally(()=>loader.hide());
    },
    async setService(id){
      let currentService = await this.services.find(service=>service.id===id);
      this.currentService= currentService;
    },
    async update(data){
      await this.setService(data.id);
      this.updateMode=true;
    }
  }
}
</script>
