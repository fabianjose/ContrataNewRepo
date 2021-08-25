<template>
    <div class="modal fade" id="offerView" aria-modal="true">
      <div class="modal-dialog modal-xl d-flex flex-row justify-content-center">
        <div class="offer-card-lg modal-content">
          <div class="offer-card-header col-10">
            <img :src="baseUrl+'/storage/'+offer.company_logo" alt="logo" class="offer-card-logo">
          </div>
          <div :class="'offer-card-separator '+(index%2?'bg-main-blue':'bg-main-pink')"></div>
          <div class="consult-card-content p-3 pb-5">
              <div class="row text-center w-100">
                <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6>
              </div>
              <div class="row text-center w-100">
                <h5 class="col-12 offer-card-price">$ {{showPrice(offer.tariff)}}</h5>
              </div>
              <div class="consult-card-benefits py-3">
                  <h6 class="col-12 consult-card-sub-title py-1 m-0">Descripcion:</h6>
                  <h6 class="col-12 benefits-content text-wrap">{{offer.benefits}}</h6>
              </div>
              <div class="consult-card-fields">
                  <div class="consult-card-field col-6" v-for="(fieldValue,k) in offer.fields_values" :key="k">
                      <h6 class="consult-card-sub-title py-1 m-0">{{fieldValue.field_name}}:</h6>
                      <h6 class="field-content">{{fieldValue.value}} {{fieldValue.unit?fieldValue.unit:""}}</h6>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {

  props:["offer", "index"],

  data(){
    return{
      baseUrl:baseUrl,
    }
  },

  methods:{
    showPrice(price){
      return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
  }

}
</script>
