<template>
  <div class="col-md-8 col-xl-4 col-10 col-lg-6 col-sm-8">
    <div class="card card-primary py-3">
      <div class="card-body d-flex flex-column align-items-center">
        <div style="height:120px" class="d-flex flex-column justify-content-center align-items-center">
          <img class="image-logo-banner" :src="baseUrl+'/storage/'+offer.company_logo">
        </div>
        <h4 class="px-2 mt-3 text-dark card-text text-capitalize">{{offer.service_name}}</h4>
        <h6 class="px-2 mt-1 text-dark card-text text-capitalize">{{offer.company_name}}</h6>
        <p v-if="this.highlighted" :class="'px-2 mt-1 card-text'+getDaysClass()">Expira en: {{getExpiration()}}</p>
      </div>
      <div class="card-footer">
        <div class="card-tools row justify-content-around">
          <div v-if="pick" class="btn btn-success rounded-circle text-lg icon-btn-sm" @click="emitPick">
            <i class="fas fa-plus"></i>
          </div>
          <div class="btn btn-info rounded-circle text-lg icon-btn-sm" @click="emitView" data-toggle="modal" data-target="#modalViewOffer">
            <i class="fas fa-eye"></i>
          </div>
          <div v-if="!pick&&!remove&&!highlighted" class="btn btn-success rounded-circle text-lg icon-btn-sm" @click="emitEdition" data-toggle="modal" data-target="#modalEditOffer">
            <i class="fas fa-edit"></i>
          </div>
          <div v-if="!pick" class="btn btn-danger rounded-circle text-lg icon-btn-sm" @click="emitRemove">
            <i class="fas fa-trash"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props:["offer", "index", "remove", "pick", "highlighted","notUpdate"],

    data(){
        return {
            baseUrl:baseUrl,
        }
    },

    methods:{
        getDaysClass(){
          let daysRemaining=this.getDays();
          return daysRemaining>5?' text-info':' text-danger';
        },
        getDays(){
          console.log("offer", this.offer.highlighted_expiration)
          let Expiration= (this.offer.highlighted_expiration.split(' ')[0]).split('-');

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
          return daysRemaining>0?( daysRemaining+' '+(daysRemaining>1?'días':'día')):' Hoy';
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
        }
    }
}
</script>
