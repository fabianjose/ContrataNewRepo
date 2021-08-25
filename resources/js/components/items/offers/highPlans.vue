<template  >
    <div class="high-plans py-4 pb-5 px-2">
      <vueper-slides
        v-if="offers.length"
        id="offer-cards"
        class="no-shadow high-plans-carousel text-center w-100"
        ref="plansSlider"
        :bullets="false"
        :autoplay="offers.length>1?true:false"
        :gap = "3"
        :duration="3000"
        :visible-slides="offers.length<3?offers.length:3"
        :slide-ratio="1 / 4"
        :dragging-distance="40"
        :arrows="false"
        :breakpoints="breakpoints" >
        <vueper-slide v-for="(offer,index) in offers" :key="index" class="align-self-center">
          <template v-slot:content>
            <div class="d-flex text-center justify-content-center mx-auto">
              <offer-card @contactOffer="contactOffer" :index="index" :offer="offer" />
            </div>
          </template>
        </vueper-slide>
      </vueper-slides>

      <div v-else style="height:200px;" class="w-100 d-flex flex-column justify-content-center align-items-center">
        <h4 class="text-dark-blue pt-5 p-4">No se encontraron ofertas destacadas</h4>
      </div>

        <offer-consult v-if="currentOffer&&consultMode" :offer="currentOffer"></offer-consult>

    </div>
</template>



<script>
export default {
  data(){
    return{
      currentOffer:null,
      latLng:"",
      offers: [],
      consultMode:false,
      breakpoints:{
        1200: {
          visibleSlides:3,
          slideRatio:0.55
        },
        900: {
          visibleSlides:2,
          slideRatio:0.65
        },
        750: {
          visibleSlides:2,
          slideRatio:0.75,
        },
        600: {
          visibleSlides: 1,
          slideRatio:0.9,
          autoplay: true
        },
        520: {
          visibleSlides: 1,
          slideRatio:1,
          autoplay: true
        },
        470: {
          visibleSlides:1,
          slideRatio:1.2,
          arrows: false,
          autoplay: true
        },
        400: {
          visibleSlides:1,
          slideRatio:1.3,
          arrows: false,
          autoplay: true
        },
        370: {
          visibleSlides:1,
          slideRatio:1.45,
          arrows: false,
          autoplay: true
        },
        355: {
          visibleSlides:1,
          slideRatio:1.55,
          arrows: false,
          autoplay: true
        }
      },

      inCapital:false,

      department:null,
      municipality:null,

      defaultDepartment:"bogota",
      defaultMunicipality:"bogota",
      onceActivation: false,
      apiKey:"AIzaSyBL0ZT5AWyMHUGkuGVuSbqHwZx_3dr6MU0",
    };
  },
  mounted(){
    this.initGeo();
    // this.$refs.plansSlider.pauseAutoplay();
    // this.$refs.plansSlider.resumeAutoplay();
    // this.$refs.plansSlider.justDragged();
    // console.log($(document).height());
    // console.log($(document).width());

  },
  methods:{
    initGeo(){
      if ("geolocation" in navigator) {

        navigator.geolocation.getCurrentPosition(location=>{
          console.log("location ", location);
          this.latLng="&latlng="+location.coords.latitude;
          this.latLng+=","+location.coords.longitude;
          this.callGmap();
        },err=>{
          console.log("error ", err)
          //this.department=""
          this.refreshData();
        },{timeout:10000})

      } else {

        this.refreshDefault();

      }
      

    },

    callGmap(){

      fetch("https://maps.googleapis.com/maps/api/geocode/json?key="+this.apiKey+this.latLng,{_method:"get"})
      .then(res=>{
        return res.json();
      })
      .then(async res => {
        console.log(res)

        this.department= await res.results[0].address_components.find(ad=>ad.types.indexOf("administrative_area_level_1")!=-1).long_name;

        if(this.department?false:true){
          this.refreshDefault()
        }

        this.municipality= await res.results[0].address_components.find(ad=>ad.types.indexOf("locality")!=-1).long_name;

        if(this.municipality?false:true){
          this.municipality = this.department;
        }

        await this.refreshData()

      })
    },

    refreshData(){
      let fd= new FormData();
      fd.append("department", this.department?this.department:this.defaultDepartment)
      fd.append("municipality", this.municipality?this.municipality:this.defaultMunicipality)
      axios.post(baseUrl+'/api/offers/area/highlight', fd)
      .then(res=>{
        console.log('Offers: ',res);
        this.offers=res.data;
        if(res.data.length>1) {
          this.$refs.plansSlider.pauseAutoplay();
          this.$refs.plansSlider.resumeAutoplay();
        }
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
        if(err.response.status==404){
          if(err.response.data.notMun) {
            this.refreshDefault();
          }
          else toastr.info('no se encontraron Ofertas destacadas');
        }
        else{

          if (err.response.data.errorMessage){
            // toastr.error(err.response.data.errorMessage);
          }else{
            toastr.error('Error al obtener las ofertas destacadas');
          }

        }
      });
    },
    contactOffer(index){
      this.consultMode=true;
      this.currentOffer=this.offers[index];
    },
    refreshDefault(){
      this.onceActivation = true;
      toastr.info("no se ha encontrado el departamento, mostrando planes destacados de la capital");
      this.department=null;
      this.municipality=null;
      this.refreshData();
    }
  }
}
</script>

<style>
</style>
