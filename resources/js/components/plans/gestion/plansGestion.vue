<template>
<div class="container-fluid">
    <div class="row justify-content-center py-4">
        <div class="col-12 col-sm-10">
            <plans-creation @viewOffer="viewSelected" @refresh="refreshData"></plans-creation>
        </div>
    </div>
    <h5 class="mt-4 mb-2 text-center">Ofertas Disponibles</h5>
    <div class="row justify-content-center py-4">
      <div class="col-12 col-sm-10">
        <div class="card card-primary ">
          <div class="card-header">
            <h3 class="card-title">Busqueda Avanzada</h3>
          </div>
          <div class="card-body">
            
            <zone-select :notNullable="true" @newDepartment="newDepartment" @newMunicipality="newMunicipality"  ></zone-select>

            <div class="row my-3 px-4">
              <button type="button" class="btn btn-outline-success" @click="refreshData">Buscar ofertas por municipio</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-around py-4 col-10 mx-auto">
      <offer v-for="(offer,k) in offers" :key="k"
      :index="offer.id" :offer="offer" :highlighted="true"
      @delete="trash" @view="viewModal"
      ></offer>
    </div>
    <offer-details v-if="currentOffer&&viewMode" :offer="currentOffer">
    </offer-details>
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
      municipality:'',
      department:'',
    }
  },
  mounted(){
    toastr.info('Puedes buscar las ofertas activas por su municipio');
  },
  methods:{

    newDepartment(department){
      this.department=department;
    },

    newMunicipality(municipality){
      this.municipality=municipality;
    },

    refreshData(){

      let fd = new FormData();

      if(this.department) fd.append("department", this.department);
      else return;

      if(this.municipality) fd.append("municipality", this.municipality);
      else return;
      let loader = this.$loading.show();

      axios.post(baseUrl+'/api/offers/area/highlight', fd)
      .then(res=>{
        console.log(res);
        this.offers = res.data;
        console.log("andamo ruleta")
      }).catch(err=>{
        if(err.response.status===404) {
          this.offers=[];
          return toastr.info("No se encontraron ofertas destacadas en esta zona")
        }
        else if(err.response.status===403){
          window.location.replace(baseUrl+"/login");
        }
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      }).finally(()=>loader.hide());
    },
    async trash(id){
        
      let loader = this.$loading.show();
      
      axios.delete(baseUrl+'/api/offers/highlight/'+id)
      .then(res=>{
        
        console.log(res);
        toastr.success("Oferta Descartada con éxito");
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
      await this.setOffer(id)
      this.viewMode=true;
    },
    viewSelected(offer){
      console.log("offer from selected one" , offer, this.currentOffer, this.viewMode);
      this.currentOffer=offer;
      this.viewMode=true;
    },
  }
}

</script>
