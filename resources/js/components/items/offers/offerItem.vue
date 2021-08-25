<template>
  <li class="list-group-item d-flex justify-content-between">
    <div style="height:120px" class=" d-flex flex-row justify-content-center col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <img class="company-logo-item" :src="baseUrl+'/storage/'+offer.company_logo" alt="">
    </div>
    <div class="d-flex flex-row col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8 flex-wrap align-items-center">
      <h5 class="px-2 mt-2 card-text text-capitalize text-center col-12 col-md-6 col-lg-6 col-xl-6 text-wrap-all" 
      style="color: #006494;">{{offer.company_name}} - {{showPrice(offer.tariff)}}</h5>
      <div class="d-flex col-12 col-md-6 col-lg-6 col-xl-6 py-3 px-0 justify-content-center">
        <button style="height:39px; width:40px;" type="button" class="btn btn-sm btn-info rounded-pill mx-1" 
         @click="emitView" data-toggle="modal" data-target="#modalViewOffer">
          <i class="fas fa-eye"></i>
        </button>
        <button style="height:39px; width:40px;" v-if="!pick&&!remove&&!highlighted" type="button" 
         class="btn btn-sm btn-success rounded-pill mx-1" @click="emitEdition" data-toggle="modal" data-target="#modalEditOffer">
          <i class="fas fa-edit"></i>
        </button>
        <button style="height:39px; width:40px;" v-if="!pick" type="button" class="btn btn-sm btn-danger rounded-pill mx-1"
         @click="emitRemove">
          <i class="fas fa-trash"></i>
        </button>
        <button data-toggle="modal" data-target="#modalCloneOffer" style="height:40px; width:40px;" type="button" class="btn btn-sm bg-dark-blue text-white rounded-pill mx-1"
         @click="emitClone">
          <i class="fas fa-clone"></i>
        </button>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  props:["offer", "index","pick", "remove", "highlighted"],
  data(){
    return {
      baseUrl,
    }
  },
  methods:{
    showPrice(price){
        return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    getDaysClass(){
      let daysRemaining=this.getDays();
      return daysRemaining>5?' text-info':' text-danger';
    },
    getDays(){
      let Expiration= (this.offer.highlightExpiration.split(' ')[0]).split('-');
      console.log('expiration date : ', Expiration);
      let date1 = new Date(Expiration[0], parseInt(Expiration[1])-1, Expiration[2]);
      let date2 = new Date();
      console.log("dates : ",date1, " and ", date2 )

      // To calculate the time difference of two dates
      let TimeDifference = date1.getTime() - date2.getTime();
      console.log("time difference : ", TimeDifference )

      // To calculate the no. of days between two dates
      let DaysDifference = TimeDifference / (1000 * 3600 * 24);
      console.log("days difference : ", DaysDifference);
      return parseInt(DaysDifference);
    },
    getExpiration(){
      let daysRemaining=this.getDays();
      return daysRemaining+' '+(daysRemaining>1?'días':'día');
    },
    emitView(){
      this.$emit('view', this.index)
    },
    emitEdition(){
      this.$emit('edit', this.index)
    },
    emitRemove(){
      this.$emit('delete', this.index)
    },
    emitPick(){
      this.$emit('pick', this.index);
    },
    emitClone(){
      this.$emit("clone", this.index);
    }
  }
}
</script>
