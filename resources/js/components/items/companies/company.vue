<template>
    <li class="list-group-item d-flex justify-content-around align-items-center px-2 flex-wrap">
        <div style="height:120px;" class=" d-flex flex-row justify-content-center col-12 col-sm-5 col-md-4 col-lg-4 col-xl-4">
            <img class="company-logo-item" :src="baseUrl+'/storage/'+logo" alt="">
        </div>
        <div class="d-flex flex-row col-12 col-sm-7 col-md-8 col-lg-8 col-xl-8 flex-wrap">  
            <h5 class="px-2 mt-3 card-text text-capitalize text-center col-12 col-md-6 col-lg-6 col-xl-6 text-wrap-all" style="color: #006494;">{{title}}</h5>
            <div class="d-flex col-12 col-md-6 col-lg-6 col-xl-6 py-3 px-0 justify-content-center">
                
                <button v-if="picked" style="height:40px; width:40px;" type="button" class="btn btn-sm btn-primary rounded-pill mx-1" disabled>
                    <i class="fas fa-check"></i>
                </button>
                <button v-if="pick&&!picked" style="height:40px; width:40px;" type="button" class="btn btn-sm btn-success rounded-pill mx-1" @click="emitPick">
                    <i class="fas fa-plus"></i>
                </button>
                <button style="height:40px; width:40px;" type="button" class="btn btn-sm btn-info rounded-pill mx-1" @click="emitView" data-toggle="modal" data-target="#modalViewCompany">
                    <i class="fas fa-eye"></i>
                </button>
                <button v-if="!pick" style="height:40px; width:40px;" type="button" class="btn btn-sm btn-success rounded-pill mx-1" @click="emitEdition" data-toggle="modal" data-target="#modalEditCompany">
                    <i class="fas fa-edit"></i>
                </button>
                <button v-if="!pick" style="height:40px; width:40px;" type="button" class="btn btn-sm btn-danger rounded-pill mx-1" @click="emitRemove">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </li>
</template>

<script>
export default {
    props:["title", "logo", "index", 'noEdit', "pick", "picked"],

    data(){
        return {
            baseUrl:baseUrl,
        }
    },

    methods:{
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
            this.$emit("pick",this.index)
        }
    }
}
</script>
