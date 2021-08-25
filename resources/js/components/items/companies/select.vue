<template>
    <div class="d-flex flex-row w-100  py-3 pb-4justify-content-around flex-wrap">

        <!-- 
        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
        <label>Empresa</label>
        <select class="custom-select" v-model="company">
          <option value="" class="d-none" selected>Empresa</option>
          <option v-for="(company,index) in companies" :key="index" :value="company.name">{{company.name}}</option>
        </select>
        <autocomplete-vue
        v-model="company"
        url="/api/companies"
        requestType="get"
        placeholder="Empresa"
        property="name"
        :required="true"
        inputClass="form-control"
        ></autocomplete-vue> 
        </div>
        -->

        <div class="row w-100 flex-wrap justify-content-around">
            <div class="col-12">
              <div class="card card-primary" id="CompaniesField">
                <a class="card-header collapsed" @click="active=!active" data-parent="#CompaniesField"
                    href="#companySelectField" aria-expanded="false" data-toggle="collapse">
                    <h3 class="card-title">Empresas</h3>
                    <div class="card-tools">
                    <button type="button" class="btn btn-tool ml-auto " >
                        <personal-fab :active="active" />
                    </button>
                    </div>
                </a>

                <div id="companySelectField" class="panel-collapse in collapse" >
                    <div class="card-body">
                        
                        <h4 class="card-text col-10">Seleccionar Empresa</h4>

                        <div class="d-flex flex-row flex-wrap col-12 py-3 mx-auto justify-content-center">
                            <ul class="list-group p-0">
                                <company v-for="(company,k) in companies" :key="k"
                                :title="company.name" :logo="company.logo" :index="k" 
                                :pick="true" @pick="pickCompany" @view="viewCompany" :picked="company.id==currentCompany"
                                ></company>
                            </ul>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        <detailed-company v-if="currentCompanyView&&viewMode" :company="currentCompanyView">
        </detailed-company>
    </div>
</template>

<script>
export default {
    props:["companies"],

    data(){
        return{
            currentCompany:null,
            currentCompanyView:null,
            active:false,
            viewMode:false,
        }
    },

    methods:{
        pickCompany(index){
            this.$emit("company", this.companies[index]);
            this.currentCompany=this.companies[index].id;
        },

        viewCompany(index){
          this.viewMode=false;
          this.currentCompanyView=this.companies[index];
          this.viewMode=true;
        }
    }
}
</script>