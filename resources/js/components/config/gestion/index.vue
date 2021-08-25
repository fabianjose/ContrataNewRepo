<template>
    <div class="card card-info col-12 col-sm-10 col-md-10 col-lg-10 col-xl-8 mx-auto px-0">
      <div class="card-header">
        <h3 class="card-title text-wrap">Edite las configuraciones generales</h3>
      </div>
      <div class="card-body p-4">
        <div v-for="(item,k) in items" :key="k" class="form-group">
            <label>{{item.label}}</label>
            <input v-model="item.value"  class="form-control">
        </div>
      </div>
      <div class="card-footer">
          <button type="button" class="btn btn-outline-success" @click="saveChanges">Guardar cambios</button>
        </div>
    </div>
</template>

<script>
export default {
    
    data(){
        return{
            items:[],
        }
    },

    mounted(){
        this.refreshData()
    },

    methods:{
        refreshData(){
            axios.get(baseUrl+"/api/config")
            .then(res=>{
                this.items=res.data;
            });
        },

        saveChanges(){
            let fd= new FormData;
            fd.append("configs", JSON.stringify(this.items));
            axios.post(baseUrl+"/api/config",fd)
            .then(res=>{
                toastr.success("Configuración establecida con éxito")
            })
            .catch(err=>{
                toastr.error("Error al establecer la configuración")
            })
        }
    }

}
</script>