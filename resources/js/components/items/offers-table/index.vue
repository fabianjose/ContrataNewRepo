<template>
  <div class="col-12">
    <div class="d-flex flex-column w-100">
      <div
        class="d-flex flex-row w-100 justify-content-around mb-2 mt-3 bloque-proveedor-precios"
      >
        <div class="col-6 col-sm-4 hidden-xs hidden-sm">
          <div
            class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap"
          >
            <div class="row">
              <div class="col-6 sol-sm-8">
                <p class="text-tabla-detalles">Descripcion</p>
              </div>
              <div class="col-6 sol-sm-4">
                <p class="text-tabla-detalles">Proveedor</p>
              </div>
            </div>
          </div>
        </div>




        <div
          v-for="(field, k2) in compFields"          :key="k2"          :class="'col-6 col-sm-2 offer-benefits \ ' + (!k2 ? 'd-lg-flex' : '')" >          <div
            class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap"
          >
            <p @click="emitSpeed" class="text-tabla-detalles">
              {{ field.name }}

             
                <i v-if="field.name == 'Velocidad'" :class="    'fa fa-angle-' + (sortByDesc && sortBy != '' ? 'up' : 'down') "></i>
            </p>
          </div>
        </div>



        

        <div class="col-6 col-sm-2">
          <div
            class="text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap"
          >
            <p @click="emitPrice" class="text-tabla-detalles">
              Precio

              <i
                :class="
                  'fa fa-angle-' + (sortByDesc && sortBy != '' ? 'up' : 'down')
                "
              ></i>
            </p>
          </div>
        </div>

        <div
          class="col-6 col-sm-2 text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap"
        >
          <p class="text-tabla-detalles"></p>
        </div>
      </div>
    </div>

    <div      v-for="(offer, k) in compItems"      :key="k"      class="justify-content-around my-1 mb-3 offer offers-pagination-item pb-3"
    >
      <div class="row" style="">
        <div class="row hidden-sm hidden-lg hidden-md logo-empresa-mobile">
          <div class="col">
            <img
              :src="baseUrl + '/storage/' + offer.company_logo"
              class="hidden-sm hidden-lg hidden-md"
              style="width: 40%"
            />
          </div>
        </div>
        <div
          class="text-wrap col-6 col-sm-4 text-center flex-column align-items-center justify-content-center d-xl-flex d-lg-flex d-md-flex hidden-sm titulos"
          style=""
        >
          <div class="row">
            <div class="col-sm-8 col-xs-8">
              <div>
                <div
                  class="tecnologia-movil text-center p-2 offer-table-label w-100 text-white mx-auto bg-dark-blue rounded-pill p-1 text-wrap"
                ></div>
                <h5 style="" class="titulo1">{{ offer.titulo1 }}</h5>
              </div>

              <div>
                <h6 style="font-weight: 300">{{ offer.titulo2 }}</h6>
                <h6 style="line-height: 0px; font-weight: 300">
                  {{ offer.titulo3 }}
                </h6>
                <h6 style="font-weight: 300">{{ offer.titulo4 }}</h6>
              </div>
            </div>
            <div class="col-sm-4 col-xs-4" style="">
              <div class="col-6 align-items-center justify-content-center">
                <img
                  :src="baseUrl + '/storage/' + offer.company_logo"
                  class="imagen-proveedor hidden-xs"
                  width="200%"
                />
              </div>
            </div>
          </div>
        </div>

        <div class="col-6 col-sm-2 columna-tecnologia">
          <div
            class="row fila-resultado-busqueda raya-vertical-tecnologia"
            style=""
          >
            <span class="texto-tecnologia-resultado-busqueda">
              <div class="" v-if="offer.tecnologia == 0">Fibra</div>
              <div class="" v-if="offer.tecnologia == 1">Satelital</div>
              <div class="" v-if="offer.tecnologia == 2">Híbrido</div>
              <div class="" v-if="offer.tecnologia == 3">Cobre</div>
              <div class="" v-if="offer.tecnologia == 4">Radio</div>
              <div v-if="offer.tecnologia == 5">Voz Ip</div>
            </span>
          </div>
        </div>

        <div
          class="col-6 col-sm-2 columna-velocidad 'hidden-md hidden-sm '+(!k3?'d-lg-flex':'hidden-lg ')"
        >
          <div  class="row fila-resultado-busqueda raya-vertical-velocidad" style="" >

             
             
             
             <span  v-if=" offer.fields_values[1].value != 1">
            
             <span class="texto-velocidad-resultado-busqueda" style="">
              {{ offer.fields_values[1].value }}

              <span v-if="offer.tecnologia == 5"> Kb </span>

              <span v-if="offer.tecnologia != 5"> Mb </span>
            </span>
            </span>

             <span  v-if=" offer.fields_values[1].value == 1">
            
             <span class="texto-velocidad-resultado-busqueda" style="">
            

              <span v-if="offer.tecnologia == 5">
                <a href="https://api.whatsapp.com/send?phone=3003079287&text=hola elmejorinternet.co, me gustaria saber de los planes">Consultar </a>
                 
                 
                  </span>

              <span v-if="offer.tecnologia != 5">  
                
                <a class="texto-velocidad-resultado-busqueda" href="https://api.whatsapp.com/send?phone=3003079287&text=hola elmejorinternet.co, me gustaria saber de los planes">Consultar </a> </span>
            </span>
            </span>






          </div>
        </div>

        <div class="col-6 col-sm-2 columna-precio">
          <div class="row fila-resultado-busqueda">
            <span  v-if="offer.tariff == 1" class="texto-precio-resultado-busqueda">
         <a class="texto-velocidad-resultado-busqueda" href="https://api.whatsapp.com/send?phone=3003079287&text=hola elmejorinternet.co, me gustaria saber de los planes">Consultar </a> 

            </span>

             <span  v-if="offer.tariff != 1" class="texto-precio-resultado-busqueda">
              $ {{ showPrice(offer.tariff) }}
            </span>

          </div>
        </div>

        <div
          class="col-6 col-sm-2 hidden-xs hidden-sm py-2 text-center d-flex flex-column align-items-center justify-content-center"
        >
          <div
            class="stars-container flex-row justify-content-center mb-2"
          ></div>
          <div class="d-flex flex-row">
            <button
              type="button"
              data-toggle="modal"
              @click="emitConsult(offer)"
              data-target="#modalConsultOffer"
              class="hidden-xs hidden-sm btn-adquierelo btn btn-lx btn-lg btn-main-blue rounded-pill mx-1 px-1 text-uppercase img-fluid"
            >
              Solicitar Plan
            </button>
          </div>
        </div>
      </div>
      <div
        class="row hidden-md hidden-sm hidden-lg boton-solicitarplan-mobile text-center"
        style="justify-content: center"
      >
        <button
          type="button"
          data-toggle="modal"
          @click="emitConsult(offer)"
          data-target="#modalConsultOffer"
          class="hidden-md hidden-sm hidden-lg btn-adquierelo btn btn-lx btn-lg btn-main-blue rounded-pill mx-1 px-1 text-uppercase img-fluid"
        >
          Solicitar Plan
        </button>
      </div>
    </div>

    <div
      class="d-flex flex-row w-100 justify-content-around py-3 pt-5 align-items-center p-2"
    >
      <button
        :disabled="currentpage == 1"
        @click="setPage"
        class="col-2 col-md-1 col-lg-1 col-xl-1 d-flex justify-content-center align-items-center page-item rounded-pill btn btn-light"
      >
        <i class="fas fa-arrow-left"></i>
      </button>
      <div
        class="d-flex flex-row justify-content-center col-8 col-lg-6 col-xl-6"
      >
        <button
          :disabled="currentpage == item"
          v-for="(item, k1) in compLastpage"
          @click="setPage(item)"
          :key="k1"
          :class="
            'mx-2 d-flex justify-content-center align-items-center btn btn-sm py-2 text-white rounded-pill page-item' +
            (currentpage == item ? ' bg-main-blue' : ' bg-dark-blue')
          "
        >
          <span class="text-center pr-1">
            {{ item }}
          </span>
        </button>
      </div>
      <button
        :disabled="currentpage == compLastpage"
        @click="setPage(currentpage)"
        class="col-2 col-md-1 col-lg-1 col-xl-1 d-flex justify-content-center align-items-center page-item rounded-pill btn btn-light"
      >
        <i class="fas fa-arrow-right"></i>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["items", "fields", "lastpage", "currentpage", "searchKey", "query"],

  data() {
    return {
      baseUrl: baseUrl,
      sortBy: "",
      sortByDesc: true,
    };
  },

  mounted() {
    console.log("current page ", this.currentpage);
  },

  methods: {
    showPrice(price) {
      return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    setPage(pageNumber = 1) {
      this.$emit("pageSwitch", pageNumber);
    },

    emitPrice(index) {
      var kk = new URLSearchParams(this.query);
      kk.set("sortBy", "tariff");
      this.sortBy = "tariff";
      this.sortByDesc = !this.sortByDesc;
      if (this.sortByDesc) kk.append("sortByDesc", "true");
      else kk.delete("sortByDesc");
      console.log(kk.toString());
      console.log(this.query);

      this.$emit("customFiltering", kk.toString());
    },
    emitSpeed(index) {
      var kk = new URLSearchParams(this.query);
      kk.set("sortBy", "speed");
      this.sortBy = "speed";
      this.sortByDesc = !this.sortByDesc;
      if (this.sortByDesc) kk.append("sortByDesc", "true");
      else kk.delete("sortByDesc");
      console.log(kk.toString());
      console.log(this.query);

      this.$emit("customFiltering", kk.toString());
    },
    emitConsult(index) {
      this.$emit("consultItem", index);
    },

    emitView(index) {
      this.$emit("viewItem", index);
    },
  },

  computed: {
    compFields: {
      get() {
        console.log("new ", this.fields);
        return this.fields;
      },
    },
    sortBy: {
      get() {
        return this.sortBy;
      },
    },
    sortByDesc: {
      get() {
        return this.sortByDesc;
      },
    },
    compLastpage: {
      get() {
        console.log("new ", this.lastpage);
        return this.lastpage;
      },
    },
    compItems: {
      get() {
        console.log("new ", this.items);
        return this.items;
      },
    },
    compQuery: {
      get() {
        console.log("new " + this.query);
        return this.query;
      },
    },
  },
};
</script>
