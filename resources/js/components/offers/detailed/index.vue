<template>
    <div class="container-fluid">
        <div class="row justify-content-center py-1">
            <div class="col-12 col-sm-10">
                <div class="card card-info" id="detailedOffer">
                    <a class="card-header collapsed" @click="active=!active" data-parent="#detailedOffer" href="#collapseOne" aria-expanded="false" data-toggle="collapse">
                        <h3 class="card-title text-wrap col-10">Detalles de Oferta</h3>
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool ml-auto " >
                            <personal-fab :active="active" />
                        </button>
                        </div>
                    </a>

                    <div id="collapseOne" class="panel-collapse collapse show" >
                        <div class="card-body d-flex flex-column box-profile">

                            <img class="align-self-center img-fluid col-10" :src="baseUrl+'/storage/'+offer.company_logo" alt="Offer picture" style="max-height: 300px;">

                            <h2 class="profile-username text-center">{{offer.service_name}}</h2>

                            <h3 class="profile-username text-center">{{offer.company_name}}</h3>

                            <p class="text-muted text-center">{{offer.benefits}}</p>

                            <ul class="list-group list-group-unbordered mb-3 px-3">

                                <li v-if="offer.highlighted&&offer.highlighted_expiration" class="list-group-item">
                                  <b>Expiración en "Destacadas"</b> <a class="float-right">{{offer.highlighted_expiration}}</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Tipo de cliente</b> <a class="float-right">{{offer.type?(offer.type=="private"?"Hogar":"Empresa"):"Todos"}}</a>
                                </li>

                                <li class="list-group-item">
                                <b>Tarifa</b> <a class="float-right">{{showPrice(offer.tariff)}}</a>
                                </li>

                                <li class="list-group-item">
                                <b>Puntuación</b> <a class="float-right">{{offer.points}}</a>
                                </li>

                                <li v-if="!JSON.parse(offer.departments)||!JSON.parse(offer.departments.length)" class="list-group-item">
                                <b>Departamento</b> <a class="float-right">
                                    <span >
                                        Disponible para todos
                                    </span>
                                </a>
                                </li>

                                <li v-if="!JSON.parse(offer.municipalities)||!JSON.parse(offer.municipalities.length)" class="list-group-item">
                                <b>Municipio</b> <a class="float-right">
                                    <span>
                                        Disponible para todos
                                    </span>
                                </a>
                                </li>

                            </ul>

                            <ul class="list-group list-group-unbordered mb-3 mt-3">
                                <li class="list-group-item" v-for="(field,index) in offer.fields_values">
                                <b class="text-capitalize">{{field.field_name}}</b> <a class="float-right">{{field.value+(field.unit?(" ("+field.unit+")"):"")}}</a>
                                </li>
                            </ul>

                            <offer-zone :municipalities="JSON.parse(offer.municipalities)" :departments="JSON.parse(offer.departments)"></offer-zone>


                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    props:["offer"],

    data(){
        return {
            baseUrl:baseUrl,
            active:true,
        }
    },

    methods:{
        showPrice(price){
            return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
    }
    
}
</script>