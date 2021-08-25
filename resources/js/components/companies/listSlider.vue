<template>
  <vueper-slides
    class="no-shadow high-companies-carousel mt-4 text-center"
    :autoplay="false"
    slide-multiple="false"
    ref="companiesSlider"
    :duration="1000"
    :bullets="false"
    :arrows="false"
    :visible-slides="(companies.length < 4)?companies.length:4"
    :slide-ratio="0.1"
    :dragging-distance="70"
    :breakpoints="breakpoints">
    <vueper-slide v-for="company in companies" :key="company.id">
      <template v-slot:content>
        <div class="h-100 d-flex text-center justify-content-center mx-2">
          <img :src="baseUrl+'/storage/'+company.logo" class="high-companies-img align-self-center">
        </div>
      </template>
    </vueper-slide>
  </vueper-slides>
</template>

<script>
export default {
  data(){
    return{
      baseUrl:baseUrl,
      companies:[],
      breakpoints:{
        1200: {
          visibleSlides:3,
          slideRatio:0.15,
        },
        900: {
          visibleSlides:2,
          slideRatio:0.15
        },
        750: {
          visibleSlides:2,
          slideRatio:0.2,
        },
        600: {
          visibleSlides:1,
          slideRatio:0.2
        },
        520: {
          visibleSlides:1,
          slideRatio:0.3,
        },
        380: {
          visibleSlides:1,
          slideRatio:0.35,
        }
      }
    }
  },
  mounted(){
    this.refreshData();
  },
  methods:{
    refreshData(){
      axios.get(baseUrl+'/api/companies/highlighted')
      .then(res=>{
        console.log(res);
        this.companies=res.data;
        if(res.data.length>1) {
          this.$refs.companiesSlider.pauseAutoplay();
          this.$refs.companiesSlider.resumeAutoplay();
        }
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }else{
          toastr.error('Error al obtener las empresas destacadas');
        }
      });
    },
  }
}
</script>
