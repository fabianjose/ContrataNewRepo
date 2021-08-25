<template>
<div class="container-fluid">
    <div class="row justify-content-center py-4">
        <div class="col-12 col-sm-10">
            <company-creation @creatingDone="refreshData"></company-creation>
        </div>
    </div>
    <div class="row justify-content-center py-1">
      <div class="col-12 col-sm-10">
        <div class="card card-info" id="companiesListAccordion">
          <a class="card-header collapsed" @click="active=!active" data-parent="#companiesListAccordion" href="#companiesCollapsed" aria-expanded="false" data-toggle="collapse">
            <h3 class="card-title">Empresas Disponibles</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool ml-auto" >
                <personal-fab :active="active" />
              </button>
            </div>
          </a>
          <div id="companiesCollapsed" class="panel-collapse in collapse">
            <div class="card-body p-0">
              <ul class="list-group p-0">
                <company v-for="(company,k) in companies" :key="k"
                  :title="company.name" :logo="company.logo" :index="company.id"
                  @view="viewModal" @edit="update" @delete="trash" ></company>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <company-update v-if="currentCompany&&updateMode" @updateDone="refreshData" :company="currentCompany">
    </company-update>
    <detailed-company v-if="currentCompany&&viewMode" :company="currentCompany">
    </detailed-company>
</div>
</template>

<script>
export default {
  data(){
    return{
      active:false,
      baseUrl: baseUrl,
      companies:[],
      currentCompany:null,
      updateMode:false,
      viewMode:false,
    }
  },
  mounted(){
    this.refreshData();
  },

  methods:{
    refreshData(){
      let loader = this.$loading.show();
      axios.get(baseUrl+'/api/companies')
      .then(res=>{
        console.log(res);
        this.companies=res.data;
      }).catch(err=>{
        if(err.response.status===403){
          window.location.replace(baseUrl+"/login");
        }
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      }).finally(()=>loader.hide());
    },
    async setCompany(id){
      let currentCompany = await this.companies.find(company=>company.id===id);
      this.currentCompany= currentCompany;
    },
    async update(id){
      await this.setCompany(id)
      this.updateMode=true
    },
    trash(id){
      let loader = this.$loading.show();
      axios.delete(baseUrl+'/api/company/'+id)
      .then(res=>{
        console.log(res);
        toastr.success("Compañía eliminada con éxito");
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
    async viewModal(id){
      await this.setCompany(id)
      this.viewMode=true;
    }
  }
}


</script>
