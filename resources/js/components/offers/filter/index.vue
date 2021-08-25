<template>
    <div class="planComparator-bg py-4 px-lg-4 px-md-4">
        <div class="d-flex flex-row h-100 w-100 flex-wrap justify-content-around align-items-start">
            <div class="filterCard col-10 col-lg-4 col-xl-3">
                <filter-card @customFiltering="refreshData" :fields="compFields" :technologies="compTechnologies" :speeds="compSpeeds" :max_price="compMaxPrice" :min_price="compMinPrice"  :providers="compProviders" :plans="compPlans"/>
            </div>
            <filter-table @consultItem="consultItem" :query="compQuery" @customFiltering="refreshData" @viewItem="viewItem" @pageSwitch="changePage" :fields="compFields" :items="compPagination.data" :currentpage="compPagination.current_page" :lastpage="compLastpage" ></filter-table>
        </div>
        <offer-consult v-if="currentItem&&consultMode" :offerMode="true" :offer="currentItem"></offer-consult>
        <offer-modal v-if="currentItem&&viewMode" :offer="currentItem" ></offer-modal>
    </div>

    
</template>

<script>
export default {
    props:["pagination", "fields", "query", "lastpage","providers", "plans","technologies","max_price","min_price","speeds", "plans"],

    data(){
        return {
            compPagination:this.pagination,
            compFields:this.fields,
            compLastpage:this.lastpage,
            compProviders:this.providers,
            compTechnologies: this.technologies,
            compSpeeds: this.speeds,
            compMaxPrice: this.max_price,
            compMinPrice: this.min_price,
            compPlans: this.plans,
            compQuery:this.query,
            customFilters:null,
            pageIndex:"&page=1",
            currentItem:null,
            viewMode:false,
            consultMode:false,
        };
    },

    mounted(){
   //     console.log("wi pagination", this.pagination);
    },

    methods:{

        consultItem(index){
            this.currentItem= this.pagination.data[index];
            this.consultMode=true;
            this.viewMode=false;

        },

        viewItem(index){
            this.currentItem= this.pagination.data[index];
            this.viewMode=true;
            this.consultMode=false;

        },

        changePage(page=1){
            this.pageIndex="&page="+page;
            this.refreshData();
        },

        refreshData(filters=this.customFilters){
            //window.location.replace(baseUrl+"/offers/search"+this.query+(filters?filters:"")+this.pageIndex)
            console.log(baseUrl+"/offers/search"+this.query+(filters?filters:"")+this.pageIndex)

            let loader = this.$loading.show();

            this.loading=true;

            
            axios.get(baseUrl+"/offers/search"+this.query+(filters?filters:"")+this.pageIndex)
            .then(res=>{
                console.log("response ", res)
                this.compPagination=res.data.pagination;
                this.compLastpage=res.data.last_page;
                this.compFields=res.data.fields;
                this.compQuery=res.date.query;
            }).catch(err=>{
                console.log(err)
            })
            .finally(()=>{loader.hide()})
             
        }
    }
    
}
</script>



