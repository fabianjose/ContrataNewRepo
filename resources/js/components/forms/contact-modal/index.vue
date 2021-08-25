<template>
    <div class="modal fade" id="modalConsultOffer" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-xl-xl d-flex flex-row justify-content-center align-items-center">
            <div class="consult-card p-0 flex-wrap modal-content">
                <div class="col-lg-7 col-xl-7 col-md-12 col-12 d-flex flex-column p-4">
                    <div class="consult-card-content">
                        <div class="consult-card-header pt-4 pb-3">
                            <img :src="baseUrl+'/storage/'+offer.company_logo" alt="logo" class="consult-card-logo img-fluid">
                            <h6 class="col-12 consult-card-company">{{offer.company_name}}</h6>
                        </div>
                        <div class="consult-card-benefits py-3">
                            <h6 class="col-12 consult-card-sub-title py-1 m-0">Beneficios:</h6>
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
                <contact-form :offer="offer">
                </contact-form>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    props:["offer", "fields"],

    data(){
        return {
            baseUrl:baseUrl,
        }
    },

}
</script>
