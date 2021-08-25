<template>
    <div class="d-flex flex-row w-100 flex-wrap py-2 pb-5 justify-content-around">

        <div v-if="departments&&departments.length" class="col-10 col-xl-6">
            <div class="card card-info" id="departmentsDetailedAccordion">
                <a class="card-header collapsed" @click="active=!active" data-parent="#departmentsDetailedAccordion"
                href="#departmentsDetailedOfferList" aria-expanded="false" data-toggle="collapse">
                <h3 class="card-title col-10">Departamentos</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool ml-auto " >
                    <personal-fab :active="active" />
                    </button>
                </div>
                </a>
                <div id="departmentsDetailedOfferList" class="panel-collapse in collapse" >
                    <div class="card-body w-100">
                    
                        <div class="d-flex justify-content-around w-100 flex-wrap">
                            <ul class="list-group list-group-unbordered mb-3 w-100">
                            <li v-for="(department,k) in departments" :key="k" class="list-group-item px-0">
                                <b>{{department}}</b>
                            </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div v-if="municipalities&&municipalities.length" class="col-10 col-xl-6">
            <div class="card card-info" id="municipalitiesAccordion">
                <a class="card-header collapsed" @click="active2=!active2" data-parent="#municipalitiesAccordion"
                href="#MunicipalitiesOfferList" aria-expanded="false" data-toggle="collapse">
                <h3 class="card-title col-10">Municipios</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool ml-auto " >
                    <personal-fab :active="active2" />
                    </button>
                </div>
                </a>
                <div id="MunicipalitiesOfferList" class="panel-collapse in collapse" >
                    <div class="card-body w-100">
                    
                        <div class="d-flex justify-content-around w-100 flex-wrap">
                            <ul class="list-group list-group-unbordered mb-3 w-100">
                            <li v-for="(municipality,k2) in municipalities" :key="k2" class="list-group-item px-0">
                                <b>{{municipality}}</b>
                            </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props:["departments", "municipalities"],

    data(){
        return{
            active:false,
            active2:false
        }
    }
}
</script>