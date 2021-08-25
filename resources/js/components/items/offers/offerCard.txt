<template>
  <div class="offer-card d-flex flex-column">
    <div class="offer-card-header">
      <img :src="baseUrl+'/storage/'+offer.company_logo" alt="logo" class="offer-card-logo">
    </div>
    <div :class="'offer-card-separator '+(index%2?'bg-main-blue':'bg-main-pink')"></div>
    <div class="offer-card-content">
      <div class="row">
        <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6>
      </div>
      <div class="row">
        <h6 class="col-12 offer-card-benefits text-wrap" style="font-family:Montserrat-regular">{{offer.benefits}}</h6>
      </div> 
      <div class="row">
        <h5 class="col-12 offer-card-price">$ {{showPrice(offer.tariff)}}</h5>
      </div>
    </div>
    <div class="offer-card-footer">
      <div class="col-10">
        <button @click="emitContact" data-toggle="modal" data-target="#modalConsultOffer"
          :class="'btn btn-block text-white offer-card-btn rounded-pill '+(index%2?'bg-main-blue':'bg-main-pink')">
          CONTACTAR
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:['offer','index'],
  data(){
    return{
      baseUrl:baseUrl,
    }
  },

  methods:{
    showPrice(price){
      //here
        return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    emitContact(){
      this.$emit("contactOffer",this.index);
    }
  }
}
</script>
