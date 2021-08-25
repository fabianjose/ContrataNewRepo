<template>
<div class="modal fade" id="modalCloneOffer" aria-modal="true" style="padding-right: 15px; display: block;">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark-blue text-white">
        <h4 class="modal-title">Clonar Oferta</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="d-flex flex-row w-100 justify-content-around flex-wrap" v-if="!offer.fields_values.length&&fields.length">
          <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12" v-for="(field,index) in fields" >
            <label>{{field.name+(field.unit?" ("+field.unit+")":"")}}</label>
            <input v-model="fields_values[index]" class="form-control">
          </div>
        </div>
        <div class="d-flex flex-row w-100 justify-content-around flex-wrap" v-else>
          <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12" v-for="(field,index) in offer.fields_values" >
            <label>{{field.field_name+(field.unit?" ("+field.unit+")":"")}}</label>
            <input v-model="offer.fields_values[index].value" class="form-control">
          </div>
        </div>
        <div class="d-flex flex-row w-100 justify-content-around flex-wrap">
         <div class="d-flex flex-row w-100 justify-content-around flex-wrap">
          <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <label>titulo1</label>
           <!-- <textarea class="form-control" rows="3" placeholder="Descripcion..." v-model="offer.benefits" style="resize: none;"></textarea>-->
                    <input v-model="offer.titulo1" class="form-control">            
          </div>

                  <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <label>titulo2</label>
           <!-- <textarea class="form-control" rows="3" placeholder="Descripcion..." v-model="offer.benefits" style="resize: none;"></textarea>-->
                    <input v-model="offer.titulo2" class="form-control">            
            
          </div>



        </div>
         <div class="d-flex flex-row w-100 justify-content-around flex-wrap">
          <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <label>titulo3</label>
           <!-- <textarea class="form-control" rows="3" placeholder="Descripcion..." v-model="offer.benefits" style="resize: none;"></textarea>-->
                    <input v-model="offer.titulo3" class="form-control">            
            
          </div>

                  <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <label>titulo4</label>
           <!-- <textarea class="form-control" rows="3" placeholder="Descripcion..." v-model="offer.benefits" style="resize: none;"></textarea>-->
                    <input v-model="offer.titulo4" class="form-control">            
            
          </div>



        </div>
        </div>

        

         <div class="d-flex flex-row w-100 justify-content-around flex-wrap">
          <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12">
            <label>Tarifa</label>
            <input v-model="offer.tariff" class="form-control">
          </div>
          <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12">
            <label>Tipo</label>
            <select class="custom-select" v-model="offer.type">
               <option :value="null" selected>Todos</option>
                <option value="private">Hogar</option>
                <option value="company">Empresa</option>
                <option value="isp">ISP</option>
                <option value="pyme">Pyme</option>
              
            </select>
          </div>
          <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12">
            <label>Puntuacion (Opcional)</label>
            <select class="custom-select" v-model="offer.points">
              <option value="0" selected>0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
        </div>




        <div class="d-flex flex-row w-100 justify-content-around flex-wrap">
          <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12">
            <label>Telefonia</label>
         <select class="custom-select" v-model="offer.telefonia">
                <option value="0" selected>N/A</option>
                <option value="1">Ilimitada</option>
              </select>
          </div>
        

       <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12">
                 <label style="color:red">
               confirma Tecnologia
              </label>
              <select class="custom-select" v-model="offer.tecnologia">
                <option value="0" selected>Fibra optica</option>
                <option value="1">Satelital</option>
                <option value="2">Híbrido</option>
                 <option value="3">Cobre</option>
                 <option value="4">Radio</option>
                 <option value="5">VozIP</option>
           
              </select>
                </div>
          </div>
        </div>

        
        <div class="d-flex flex-row w-100 justify-content-around flex-wrap">
        
          <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12">
            <label>Cantidad de Canales</label>
            <input class="form-control" v-model="offer.canales" >


          </div>
          <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12">
            <label>Tipo de plan para logo</label>
             <select class="custom-select" v-model="offer.tipo_plan_logos">
                <option value="0" selected>internet</option>
                <option value="1">duo</option>
                <option value="2">trio</option>
                 <option value="3">vozip</option>
           
              </select>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-outline-info" @click="cloneOffer">Clonar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>

</div>
</template>

<script>
export default {
  props:["offer","services"],

  data(){
    return{
      active2:false,
      fields_values:[],
      fields:[],
    }
  },

  mounted(){
    if(!this.offer.fields_values) this.getFields()
  },

  methods:{

    getFields(){
      console.log("ser-vice",this.offer.service)
      axios.get(baseUrl+"/api/service/"+this.offer.service+"/fields")
      .then(res=>{
        console.log("campos  ", res)
        this.fields=res.data;
        this.offer.fields_values=null;
      }).catch(err=>{console.error(err);toastr.error("error al obtener los campos del servicio")})
    },

    async cloneOffer(){

      let valuesArray=[];

      if(this.fields.length){
        let continueCreation=true;

        await this.fields.map((field, i)=>{
          if (!this.fieldsValues[i]||this.fieldsValues[i]==""){
            continueCreation=false;
          }
          else valuesArray.push({
            "field_id":field.id,
            "value":this.fieldsValues[i]
          });
        });

        if(!continueCreation) {
          return toastr.error('Debe llenar los campos referentes al servicio seleccionado');
        }

      }else if(this.offer.fields_values.length){
        if(this.offer.fields_values.length){
          for(let i=0; i< this.offer.fields_values.length; i++){
            if(!this.offer.fields_values[i].value){
              toastr.error('Debe llenar los campos referentes al servicio seleccionado');
              return false;
            }
            else {
              let {field_id,value}=this.offer.fields_values[i];
              valuesArray.push({
                field_id,
                value
              });
            }
          }
        }
        else return toastr.error('Debe llenar los campos referentes al servicio seleccionado');
      }

      let fd= new FormData();
      fd.append("company", this.offer.company_name);
      fd.append("service", this.offer.service);
      fd.append("benefits", this.offer.benefits);
      fd.append("titulo1", this.offer.titulo1);
      fd.append("titulo2", this.offer.titulo2);
      fd.append("titulo3", this.offer.titulo3);
      fd.append("titulo4", this.offer.titulo4);
      fd.append("telefonia", this.offer.telefonia);
      fd.append("tecnologia", this.offer.tecnologia);
      fd.append("canales", this.offer.canales);
      fd.append("tipo_plan_logos", this.offer.tipo_plan_logos);

      if(this.offer.departments) 
        if(JSON.parse(this.offer.departments)&&JSON.parse(this.offer.departments).length)
          fd.append("departments", this.offer.departments);

      if(this.offer.municipalities) 
        if(JSON.parse(this.offer.municipalities)&&JSON.parse(this.offer.municipalities).length)
          fd.append("municipalities", this.offer.municipalities);
          
      fd.append("tariff", parseInt(this.offer.tariff));
      if(this.offer.type) fd.append("type", this.offer.type);
      fd.append("points", this.offer.points);
      fd.append("fields_values", valuesArray.length?JSON.stringify(valuesArray):null);

      axios.post(baseUrl+"/api/offer", fd)
      .then(res=>{
        console.log("RESPONSE FROM SERVER ",res);

        toastr.success("Oferta clonada con éxito");
        setTimeout(function(){
          window.location.reload();
        }, 2000);
      })
      .catch(err=>{
        if(err.response.status===403){
          window.location.replace(baseUrl+"/login");
        }
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }else {
          let allErrors = err.response.data;
          for (var errorkey in allErrors) {
            if (allErrors[errorkey]){
              for (var error of allErrors[errorkey]) {
                toastr.error(error);
              }
            }
          }
        }
      });
    }
  }
}
</script>
