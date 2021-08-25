<template>
    <div class="d-flex w-100 flex-row flex-wrap justify-content-around">

      <slot></slot>

      <div v-if="!hideDepartment" :class="'form-group'+(middle?middle:' col-6')">
        <label>Departamento</label>
        <select class="custom-select ci-select rounded-pill" v-model="department" @change="getMunicipalities">
          <option value="" class="d-none" selected>Departamento</option>
          <option v-for="(department,index) in departments" :key="index" :value="department.name">{{department.name}}</option>
        </select>
        <!-- <autocomplete-vue
        v-model="department"
        url="/api/departments"
        requestType="get"
        placeholder="Departamento"
        property="name"
        @selected="setDepartment"
        :required="true"
        :threshold="1"
        inputClass="form-control"
        ></autocomplete-vue> -->
      </div>

      <div v-if="!hideMunicipality" :class="'form-group'+(middle?middle:' col-6')">
        <label>Municipio</label>
        <select class="custom-select ci-select rounded-pill" v-model="municipality" @change="setMunicipality">
          <option value="" class="d-none" selected>Municipio</option>
          <option v-for="(municipality,index) in municipalities" :key="index" :value="municipality.name">{{municipality.name}}</option>
        </select>
        <!-- <autocomplete-vue
        ref="municipalitiesList"
        v-model="municipality"
        placeholder="Municipio"
        property="name"
        @selected="setMunicipality"
        :required="true"
        :threshold="1"
        inputClass="form-control"
        ></autocomplete-vue> -->
      </div>

    </div>
</template>

<script>
export default {
    props:["middle", "notNullable", "hideDepartment", "hideMunicipality", "noRequest","defaultDepartment","defaultMunicipality"],
    data(){
        return {
          departments:[],
          municipalities:[],
          municipality:this.defaultMunicipality?this.defaultMunicipality:null,
          department:this.defaultDepartment?this.defaultDepartment:null,
        }
    },
    mounted(){
      if(this.department) this.getMunicipalities();
      this.getDepartments();
    },
    methods:{
      reset(){
        this.municipality=null;
        this.department=null;
      },
      getDepartments(){
        axios.get(baseUrl+'/api/departments')
        .then(res=>{
          console.log(res);
          this.departments=res.data;
        }).catch(err=>{
          console.log("ERROR FROM SERVER ",err.response);
          if (err.response.data.errorMessage){
            toastr.error(err.response.data.errorMessage);
          }
        });
      },
        async setDepartment(){
            console.log("new val ",this.department);
            await this.$emit("newDepartment",this.department);
            // if(!this.noRequest)this.getMunicipalities();
        },

        async setMunicipality(){
            await this.$emit("newMunicipality", this.municipality);
        },

        async getMunicipalities(){
          await this.setDepartment();
          if(!this.department) return;
            axios.get(baseUrl+'/api/municipalities/'+this.department)
            .then(res=>{
                // console.log(res);
                // console.log(this.$refs);
                // if(!this.hideMunicipality) this.$refs.municipalitiesList.setEntries(res.data)
                if(!this.hideMunicipality) this.municipalities=res.data;
                else this.$emit("newMunicipalities", res.data);

            }).catch(err=>{
                console.log("ERROR FROM SERVER ", err,err.response);
                toastr.error("error al cargar los municipios");
            });
        },
    },
}
</script>
