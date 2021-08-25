/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// window.baseUrl+ 'http://127.0.0.1:8000';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('companies-gestion', require('./components/companies/gestion/CompaniesGestion.vue').default);

Vue.component('personal-fab', require('./components/items/personalFab.vue').default);

Vue.component('company-creation', require('./components/companies/creation/CreationForm.vue').default);

Vue.component('company-update', require('./components/companies/update/updateForm.vue').default);

Vue.component('company', require('./components/items/companies/company.vue').default);

Vue.component('detailed-company', require('./components/items/companies/detailedCompany.vue').default);

Vue.component('c-modal', require('./components/items/modal/modal.vue').default);

Vue.component('banners-gestion', require('./components/companies/gestion/BannersGestion.vue').default);
Vue.component('company-highlight', require('./components/companies/creation/HighlightForm.vue').default);

Vue.component("company-select", require("./components/items/companies/select.vue").default);


// Ofertas
Vue.component('offers-gestion', require('./components/offers/gestion/OffersGestion.vue').default);
Vue.component('offer-creation', require('./components/offers/creation/CreationForm.vue').default);
Vue.component('offer', require('./components/items/offers/offer.vue').default);
Vue.component('offerItem', require('./components/items/offers/offerItem.vue').default);
Vue.component('offer-details', require('./components/items/offers/detailedOffer.vue').default);
Vue.component('offer-update', require('./components/offers/update/updateForm.vue').default);
Vue.component("offer-card", require("./components/items/offers/offerCard.vue").default);
Vue.component("offers-filter", require("./components/offers/filter").default);
Vue.component("offer-consult", require("./components/forms/contact-modal").default);
Vue.component("offer-modal", require("./components/items/offers/offerCardDetailed.vue").default);
Vue.component("offer-detailed", require("./components/offers/detailed").default);
Vue.component("offer-clone", require("./components/offers/cloning").default);
Vue.component("offer-zone", require("./components/items/zone/offerZone.vue").default);

// Servicios
Vue.component('service-creation', require("./components/services/creation/creationForm.vue").default);
Vue.component('service-gestion', require("./components/services/gestion/gestion.vue").default);
Vue.component('service', require('./components/items/services/service.vue').default);
Vue.component('service-details', require('./components/items/services/detailedService.vue').default);
Vue.component('service-update', require('./components/services/update/updateForm.vue').default);

Vue.component('location-creation', require("./components/locations/creation/creationForm.vue").default);
Vue.component('sub-location-creation', require("./components/locations/creation/subCreationForm.vue").default);
Vue.component('locations-gestion', require("./components/locations/gestion/gestion.vue").default);
Vue.component('zone-item', require('./components/items/zone/zoneItem.vue').default);

Vue.component("zone-custom-selection", require("./components/items/zone/ZoneSelectOffer.vue").default)
// Vue.component('location-details', require('./components/items/locations/detailedLocation.vue').default);
// Vue.component('location-update', require('./components/locations/update/updateForm.vue').default);

Vue.component('plans-creation', require("./components/plans/creation/creationForm.vue").default);
Vue.component('plans-gestion', require("./components/plans/gestion/plansGestion.vue").default);
Vue.component("high-plans", require("./components/items/offers/highPlans.vue").default);

Vue.component('zone-select', require('./components/items/zone/zoneSelect.vue').default);

Vue.component("contact-form", require("./components/forms/contact-form").default);
Vue.component("general-contact", require("./components/forms/general-contact").default);
Vue.component("search-form", require("./components/forms/search").default);
Vue.component("filter-card", require("./components/forms/filterOffers").default);
Vue.component("companies-slider", require("./components/companies/listSlider").default);
Vue.component("filter-table", require("./components/items/offers-table").default);

Vue.component("contact-main", require("./components/contact").default);

Vue.component("config-gestion", require("./components/config/gestion").default);

Vue.component("config-counters", require("./components/config/counters").default);

Vue.component("counter", require("./components/items/counters/counter.vue").default);

//Vue.component('plans', require('./components/items/plans/plans.vue').default);
//Vue.component('plans-details', require('./components/items/services/detailedService.vue').default);
//Vue.component('plans-update', require('./components/services/update/updateForm.vue').default);

// Libreria de autocompletado
import AutocompleteVue from 'autocomplete-vue';
Vue.component('autocomplete-vue', AutocompleteVue);

// Datepicker para las fechas;
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
Vue.component('datetimepicker', DatePicker);

import VueRecaptcha from "vue-recaptcha";
Vue.component('vue-recaptcha', VueRecaptcha);

import VueResource from 'vue-resource';
Vue.use(VueResource);
import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/default.css'
//Loader usado
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

Vue.use(Loading,{
    loader:"spinner",
    color:"#20adf4",
    isFullPage:true,
    height:170,
    width:170,
    backgroundColor:"#050b0f",
    opacity: 0.3,
});

// Carrusel usado
import { VueperSlides, VueperSlide } from 'vueperslides'
import 'vueperslides/dist/vueperslides.css'
Vue.component('vueper-slides', VueperSlides);
Vue.component('vueper-slide', VueperSlide);

import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps'
Vue.component('vue-slider',VueSlider);
Vue.use(VueGoogleMaps, {
  load: {
    key: "AIzaSyBL0ZT5AWyMHUGkuGVuSbqHwZx_3dr6MU0",
    libraries: 'places', // This is required if you use the Autocomplete plugin
    // OR: libraries: 'places,drawing'
    // OR: libraries: 'places,drawing,visualization'
    // (as you require)
 
    //// If you want to set the version, you can do so:
    // v: '3.26',
},});

let jwtToken = document.head.querySelector('meta[name="jwt-token"]');

if (jwtToken) {
    console.log("header setting", 'Bearer '+jwtToken.content)
    Vue.http.headers.common['Authorization'] = 'Bearer '+jwtToken.content;
} else {
    console.error('JWT token not found');
}

/**

 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components:{
       
    }
});


