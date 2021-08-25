<template>
<div class="container-fluid">
    <div class="row justify-content-center py-4">
        <div class="col-12 col-sm-10">
            <company-highlight ref="cHighlight" @refresh="refreshData" :companies="companies"></company-highlight>
        </div>
    </div>
    <h5 class="mt-4 mb-2 text-center">Empresas Destacadas</h5>
    <div class="row justify-content-space-between py-4">
        
    </div>
    <div class="row justify-content-center py-1">
      <div class="col-12 col-sm-10">
        <div class="card card-info" id="companiesHighlightList">
          <a class="card-header collapsed" @click="active=!active" data-parent="#companiesHighlightList" href="#companiesHighlightCollapsed" aria-expanded="false" data-toggle="collapse">
            <h3 class="card-title">Empresas Disponibles</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool ml-auto" >
                <personal-fab :active="active" />
              </button>
            </div>
          </a>
          <div id="companiesHighlightCollapsed" class="panel-collapse in collapse">
            <div class="card-body p-0">
              <ul class="list-group p-0">
                <company v-for="(company,k) in companies" :key="k"
                  :title="company.name" :logo="company.logo" :index="company.id"
                  @view="viewModal" @delete="trash" :noEdit="true"></company>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
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
      viewMode:false,
    }
  },
  mounted(){
    this.refreshData();
  },
  methods:{
    refreshData(){
      let loader = this.$loading.show();
      axios.get(baseUrl+'/api/companies/highlighted')
      .then(res=>{
        console.log( "copmpanies ",res);
        this.companies=res.data;
      }).catch(err=>{
        if(err.response.status===403){
          window.location.replace(baseUrl+"/login");
        }
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }else{
          toastr.error('Error al obtener las empresas destacadas');
        }
      }).finally(()=>loader.hide());
    },
    async setCompany(id){
      let currentCompany = await this.companies.find(company=>company.id===id);
      this.currentCompany= currentCompany;
    },
    trash(id){
      let loader = this.$loading.show();
      axios.put(baseUrl+'/api/company/'+id+'/dehighlight')
      .then(res=>{
        console.log(res);
        toastr.success("Compañía sacada de destacadas");
        this.refreshData();
      }).catch(err=>{
        if(err.response.status===403){
          window.location.replace(baseUrl+"/login");
        }
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }

      }).finally(()=>{
        loader.hide();
        this.$refs.cHighlight.refreshData()
      });
    },
    async viewModal(id){
      await this.setCompany(id)
      this.viewMode=true;
    }
  }
}


</script>
