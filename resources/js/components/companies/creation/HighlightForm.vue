<template>
    <div class="card card-info" id="highlightCompanyAccordion">
      <a class="card-header collapsed" @click="active=!active" data-parent="#highlightCompanyAccordion" href="#collapseOne" aria-expanded="false" data-toggle="collapse">
        <h3 class="card-title">Destacar Empresa</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool ml-auto " >
            <personal-fab :active="active" />
          </button>
        </div>
      </a>

      <div id="collapseOne" class="panel-collapse in collapse" >
        <div class="card-body">
          <div class="form-group">
              <label>Empresa</label>
              <select class="custom-select" v-model="company">
                <option value="" class="d-none" selected>Empresa</option>
                <option v-for="(company,index) in companies" :key="index" :value="company.id">{{company.name}}</option>
              </select>
              <!-- <autocomplete-vue
              v-model="company"
              url="/api/companies"
              requestType="get"
              placeholder="Empresa"
              property="name"
              :required="true"
              :threshold="1"
              inputClass="form-control"
              ></autocomplete-vue> -->
          </div>
          <div class="form-group d-flex flex-column">
              <label>Fecha de expiracion</label>
              <datetimepicker value-type="YYYY-MM-DD HH:mm:ss" v-model="expiration" type="datetime"></datetimepicker>
          </div>
        </div>

        <div class="card-footer">
          <button type="button" class="btn btn-outline-success" @click="highlightCompany">Destacar</button>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    data(){
      return {
        active:false,
        company:"",
        expiration:null,
        companies: []
      }
    },

    mounted(){
      this.refreshData();
    },
    methods:{
      refreshData(){
        let loader = this.$loading.show();
        axios.get(baseUrl+'/api/companies/notHighlighted')
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
          }else{
            toastr.error('Error al obtener las empresas');
          }
        }).finally(()=>loader.hide());
      },
      highlightCompany(){
        if (!this.company){
          toastr.error('Debe ingresar una empresa');
          return false;
        }
        let fd= new FormData();
        fd.append("highlighted_expiration", this.expiration);
        fd.append("_method", 'put');

        let loader = this.$loading.show();

        axios.post(baseUrl+'/api/company/'+this.company+'/highlight',fd)
        .then(res=>{
          console.log("RESPONSE FROM SERVER ",res);
          toastr.success("Empresa destacada con éxito");
          this.company = "";
          this.expiration = null;
          this.$emit('refresh');
          this.refreshData();
        }).catch(err=>{
        if(err.response.status===403){
          window.location.replace(baseUrl+"/login");
        }
          console.log("ERROR FROM SERVER ",err.response);
          if (err.response.data.errorMessage){
            toastr.error(err.response.data.errorMessage);
          }else {
            let allErrors = err.response.data;
            for (let errorkey in allErrors) {
              if (allErrors[errorkey]){
                for (let error of allErrors[errorkey]) {
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
