<template>
<div class="container-fluid">
    <div class="row justify-content-center py-1">
        <div class="col-12 col-sm-10">
            <offer-creation :services="services" @refresh="refreshData"></offer-creation>
        </div>
    </div>
    <div class="row justify-content-center py-1">
      <div class="col-12 col-sm-10">
        <div class="card card-info" id="offerListAccordion">
          <a class="card-header collapsed" @click="active=!active" data-parent="#offerListAccordion" href="#collapseOffers" aria-expanded="false" data-toggle="collapse">
            <h3 class="card-title">Ofertas Disponibles</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool ml-auto" >
                <personal-fab :active="active" />
              </button>
            </div>
          </a>
          <div id="collapseOffers" class="panel-collapse in collapse">
            <div class="card-body p-0">
              <ul class="list-group p-0">
                <offerItem v-for="(offer,k) in offers" :key="k"
                :offer="offer" :index="offer.id" :clone="true"
                @delete="trash" @view="viewModal" @edit="update" @clone="openCloning"
                />
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <offer-details v-if="currentOffer&&viewMode" :offer="currentOffer">
    </offer-details>
    <offer-update v-if="currentOffer&&updateMode" :offer="currentOffer" :services="services"></offer-update>
    <offer-clone v-if="currentOffer&&cloneMode" :offer="currentOffer" :services="services"></offer-clone>
</div>
</template>

<script>
export default {
  data(){
    return{
      baseUrl: baseUrl,
      offers:[],
      currentOffer:null,
      viewMode:false,
      updateMode: false,
      services: null,
      active: false,
      cloneMode:false,
      selectedMunicipalities:[],
      selectedDepartments:[],
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

      axios.get(baseUrl+'/api/offers')
      .then(res=>{
        console.log(res.data);
        this.offers=res.data;
      }).catch(err=>{
        
        if(err.response.status===404){
          this.offers=[];
          return toastr.info(err.response.data.errorMessage)
        }

        if(err.response.status===403){
          window.location.replace(baseUrl+"/login");
        }
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      }).finally(()=>loader.hide());

    },
    trash(id){
      let loader = this.$loading.show();
      axios.delete(baseUrl+'/api/offer/'+id)
      .then(res=>{
        console.log(res);
        toastr.success("Oferta eliminada con éxito");
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
    async setOffer(id){
      let currentOffer = await this.offers.find(offer=>offer.id===id);
      this.currentOffer= currentOffer;
    },
    async viewModal(id){
      this.viewMode=false;
      await this.setOffer(id)
      this.viewMode=true;
    },
    async update(id){
      this.updateMode=false;
      await this.setOffer(id);
      this.updateMode=true;
    },
    async openCloning(id){
      this.cloneMode=false;
      await this.setOffer(id);
      this.cloneMode=true;
    },
  }
}
</script>
