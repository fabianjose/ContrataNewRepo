<template>
    <div class="card card-info" id="createOfferAccordion">
      <a class="card-header collapsed" @click="active=!active" data-parent="#createOfferAccordion" href="#collapseOne" aria-expanded="false" data-toggle="collapse">
        <h3 class="card-title text-wrap col-10">Destacar Oferta</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool ml-auto " >
            <personal-fab :active="active" />
          </button>
        </div>
      </a>

      <div id="collapseOne" class="panel-collapse in collapse" >
        <div class="card-body">

          <div class="d-flex flex-row w-100 justify-content-around flex-wrap">
            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
              <label>Empresa</label>
              <select class="custom-select" v-model="company">
                <option value="" class="d-none" selected>Empresa</option>
                <option v-for="(company,index) in companies" :key="index" :value="company.name">{{company.name}}</option>
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
              value="id"
              ></autocomplete-vue> -->
            </div>
            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
              <label>Servicio</label>
              <select class="custom-select" v-model="service">
                <option :value="service.id" v-for="service in services" :key="service.id">{{service.name}}</option>
              </select>
            </div>
          </div>

          <zone-select :notNullable="true" middle="col-xl-6 col-lg-6 col-md-6 col-12" @newDepartment="newDepartment" @newMunicipality="newMunicipality"  >
          </zone-select>


          <div class="row my-3 px-4">
            <button type="button" class="btn btn-outline-success my-2" @click="highlightedOffers">Buscar ofertas</button>
          </div>

          <div class="row w-100 flex-wrap justify-content-around">
            <div class="col-12">

              <div class="card card-primary" id="OffersAccordion">
                <a class="card-header collapsed" @click="active2=!active2" data-parent="#OffersAccordion"
                    href="#OffersList" aria-expanded="false" data-toggle="collapse">
                    <h3 class="card-title col-10">Seleccione una oferta</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool ml-auto " >
                          <personal-fab :active="active2" />
                      </button>
                    </div>
                </a>

                <div id="OffersList" class="panel-collapse in collapse" >
                  <div class="card-body w-100">

                      <div class="d-flex justify-content-around w-100 flex-wrap">
                        <offer v-for="(offer,k) in offersByArea" :key="k"
                          :offer="offer" :index="k" :pick="true"
                          @pick="selectOffer" @view="viewModal"
                        ></offer>
                      </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">

              <div class="card card-success" id="SelectedOfferAccordion">
                <a class="card-header collapsed" @click="active3=!active3" data-parent="#SelectedOfferAccordion" href="#SelectedOffer" aria-expanded="false" data-toggle="collapse">
                    <h3 class="card-title col-10">Oferta Seleccionada</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool ml-auto " >
                          <personal-fab :active="active3" />
                      </button>
                    </div>
                </a>

                <div id="SelectedOffer" class="panel-collapse in collapse" >
                  <div class="card-body">

                    <div v-if="selectedOffer" class="d-flex flex-row justify-content-around w-100 wlex-wrap">
                      <offer v-if="selectedOffer" 
                        :offer="selectedOffer" :remove="true"
                        @delete="selectedOffer=null;" @view="viewSelected"
                      ></offer>
                    </div>

                    <div v-if="selectedOffer" class="col-8 form-group px-4">
                      <label>Fecha de expiracion</label>
                    </div>

                      <datetimepicker class="w-100" value-type="YYYY-MM-DD HH:mm:ss" v-model="expiration" type="datetime"></datetimepicker>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <button type="button" class="btn btn-outline-success" @click="highlightOffer">Destacar</button>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  data(){
    return {
      services:[],
      active:false,
      active2:false,
      active3:false,
      company: "",
      department: "",
      municipality: "",
      selectedOffer:null,
      offersByArea:[],
      expiration:null,
      companies: [],
      service:null,
    }
  },
  mounted(){
    this.refreshData();
  },
  methods:{
    refreshData(){
      let loader = this.$loading.show();
      axios.get(baseUrl+'/api/services')
      .then(res=>{
        console.log("response from server", res);
        this.services = res.data;
      }).catch(err=>{
        if(err.response.status===403){
          window.location.replace(baseUrl+"/login");
        }
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      }).finally(()=>loader.hide());
      
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
        }else{
          toastr.error('Error al obtener las empresas');
        }
      }).finally(()=>loader.hide());
    },
    newDepartment(department){
      this.department=department;
    },
    newMunicipality(municipality){
      this.municipality=municipality;
    },
    OpenAccordion(parentId,childId,activeIndex){
      if(!$(parentId).hasClass("collapsed")) $(parentId).addClass("collapsed");
      else return;
      if(!$(childId).hasClass("show")) $(childId).addClass("show");
      else return;
      this[activeIndex]= !this[activeIndex];
    },

    highlightOffer(){
      let fd= new FormData();

      if(!this.selectedOffer) return toastr.error("Primero seleccione una oferta")

      if(this.department) fd.append("department", this.department);

      else return toastr.error("rellene los campos requeridos");
      
      if(this.municipality) fd.append("municipality", this.municipality);

      else return toastr.error("rellene los campos requeridos");

      if(this.expiration) fd.append("highlighted_expiration", this.expiration);
      
      else return toastr.error("Debe introducir una fecha de expiración");

      let loader = this.$loading.show();

      axios.post(baseUrl+'/api/offers/highlight/'+this.selectedOffer.id,fd)
      .then(res=>{
        console.log("RESPONSE FROM SERVER ",res);
        toastr.success("Oferta Destacada con éxito");
        this.selectedOffer = null;
        //this.offersByArea = [];
        //this.company = "";
        this.OpenAccordion("#OffersAccordion","#OffersList", "active2");
        this.OpenAccordion("#SelectedOfferAccordion","#SelectedOffer", "active3");
        this.highlightedOffers()
        this.$emit('refresh');
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
    selectOffer(index){
      this.selectedOffer=this.offersByArea[index];
      this.OpenAccordion("#SelectedOfferAccordion","#SelectedOffer", "active3");
    },
    viewModal(index){
      this.$emit("viewOffer", this.offersByArea[index]);
    },
    viewSelected(){
      this.$emit("viewOffer", this.selectedOffer);
    },
    highlightedOffers(){
      this.OpenAccordion("#OffersAccordion","#OffersList", "active2");
      let fd= new FormData();
      console.log("items:")
      console.log(this.company, this.municipality, this.department);
      console.log(typeof this.company, typeof this.municipality, typeof this.department);

      if(this.company) fd.append("company", this.company);

      if(this.department) fd.append("department", this.department);

      if(this.municipality) fd.append("municipality", this.municipality);

      if(this.service) fd.append("service", this.service);

      let loader = this.$loading.show();

      axios.post(baseUrl+'/api/offers/area',fd)
      .then(res=>{
        console.log("RESPONSE FROM SERVER ",res);
        this.offersByArea=res.data;
      }).catch(err=>{
        if(err.response.status===404){
          this.offersByArea=[];
          return toastr.info("No hay ofertas sin destacar")
        }
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
        if(err.response.status===404){
          this.offersByArea=[];
        }
        //toastr.error("Error al cargar las ofertas del área");
      }).finally(()=>loader.hide());
    }
  }
}
</script>
