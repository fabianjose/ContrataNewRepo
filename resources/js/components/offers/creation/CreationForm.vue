<template>
    <div class="card card-info" id="createOfferAccordion">
      <a class="card-header collapsed" @click="active=!active" data-parent="#createOfferAccordion" href="#collapseOne" aria-expanded="false" data-toggle="collapse">
        <h3 class="card-title text-wrap col-10">Nueva Oferta</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool ml-auto " >
            <personal-fab :active="active" />
          </button>
        </div>
      </a>

      <div id="collapseOne" class="panel-collapse in collapse" >
        <div class="card-body">
  
          <div class="d-flex flex-row w-100 justify-content-around flex-wrap">

            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
            <label>Empresa</label>
            <select class="custom-select" v-model="company">
              <option value="" class="d-none" selected>Empresa</option>
              <option v-for="(company,index) in companies" :key="index" :value="company.name">{{company.name}}</option>
            </select>
            <!-- 
            <autocomplete-vue
            v-model="company"
            url="/api/companies"
            requestType="get"
            placeholder="Empresa"
            property="name"
            :required="true"
            inputClass="form-control"
            ></autocomplete-vue> 
            -->
            </div>

          <!--<company-select @company="setCompany" :companies="companies" ></company-select>-->
          
            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
              <label>Servicio</label>
              <select @change="getFields" class="custom-select" v-model="service">
                <option :value="service.id" v-for="service in services" :key="service.id">{{service.name}}</option>
              </select>
            </div>
            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12" v-for="(field,index) in fields" :key="index" >
              <label>{{field.name+(field.unit?" ("+field.unit+")":"")}} </label>
              <input v-model="fieldsValues[index]" class="form-control">
               
            </div>
          </div>

        <div class="d-flex flex-row w-100 justify-content-around flex-wrap my-3" >
            <div class="form-group col-12" style="display:none">
              <label>Descripcion</label>
              <textarea class="form-control" rows="3" placeholder="Descripcion..." v-model="benefits" style="resize: none;"></textarea>
            </div>
          </div>

          <div class="d-flex flex-row w-100 justify-content-around flex-wrap my-3">
            <div class="form-group col-3">
              <label>Titulo 1 (max 18 caracteres)</label>
              <input type="text" name="" id="" class="form-control" maxlength="18" placeholder="Ingresa primera descripcion" v-model="titulo1" >
             
            </div>
             <div class="form-group col-3">
              <label>Titulo 2 (max 21 caracteres)</label>
              <input type="text" name="" id="" class="form-control" maxlength="21" placeholder="Ingresa segunda descripcion" v-model="titulo2" >
             
            </div>
             <div class="form-group col-3">
              <label>Titulo 3 (max 21 caracteres)</label>
              <input type="text" name="" id="" class="form-control" maxlength="21" placeholder="Ingresa tercera descripcion" v-model="titulo3" >
             
            </div>
             <div class="form-group col-3">
              <label>Titulo 4 (max 21 caracteres)</label>
              <input type="text" name="" id="" class="form-control" maxlength="21" placeholder="Ingresa cuarta descripcion" v-model="titulo4" >
             
              </div>
          </div>



          <zone-custom-selection @departments="setDepartments" @municipalities="setMunicipalities" 
          ref="zoneSelectRef" ></zone-custom-selection>



          <div class="d-flex flex-row w-100 justify-content-around flex-wrap my-3">
            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12">
              <label>Valor del servicio en pesos (sin puntos, comas o simbolos)</label>
              <input v-model="tariff" class="form-control">

               <label style="color:red">
               telefonia
              </label>
              <select class="custom-select" v-model="telefonia">
                <option value="0" selected>N/A</option>
                <option value="1">Ilimitada</option>
              </select>



            
             
              <div class="form-group ">
              <label style="color:red">Cantidad de Canales</label>
              <input type="text" name="" id="" class="form-control" value="N/A" maxlength="21" v-model="canales" >
             
              </div>
            </div>



            <div class="form-group col-3 ">
              <label>Selecciones El tipo de cliente <br> para este servicio</label>
              <select class="custom-select" v-model="type">
                <option :value="null" selected>Todos</option>
                <option value="private">Hogar</option>
                <option value="company">Empresa</option>
                <option value="isp">ISP</option>
                <option value="pyme">Pyme</option>
              </select>
            </div>


             
            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12">

                 <label>
               Tipo de plan para logo
              </label>
              <select class="custom-select" v-model="tipo_plan_logos">
                <option value="0" selected>internet</option>
                <option value="1">duo</option>
                <option value="2">trio</option>
                 <option value="3">vozip</option>
                  
           
              </select>
              <label>
                Puntuacion
              </label>
              <select class="custom-select" v-model="points">
                <option value="0" selected>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
                <p class="text-muted text-sm mb-1" >
                  <span class="text-danger">*</span> Este campo es opcional.
                </p>

                
                 <label style="color:red">
               confirma Tecnologia
              </label>
              <select class="custom-select" v-model="tecnologia">
                <option value="0" selected>Fibra Óptica</option>
                <option value="1">Satelital</option>
                <option value="2">Híbrido</option>
                 <option value="3">Cobre</option>
                 <option value="4">Radio</option>
                  <option value="5">VozIP</option>
           
              </select>
            </div>

            
          </div>
        </div>


<div class="row">------------Informacion para el modal----------------</div> <br>
        <div class="row">
          
                <div class="col">
                    <label style="color:red">
                    Permanencia
                    </label>
                    <select class="custom-select" v-model="permanencia">
                      <option value="Con Permancencia" selected>Con Permancencia</option>
                      <option value="Sin Permancencia">Sin Permancencia</option>
                      
                
                    </select>
                </div>
                <div class="col">
                          <label style="color:red">
                    Fijo
                    </label>
                    <select class="custom-select" v-model="fijo">
                      <option value="Si" selected>Si</option>
                      <option value="No">NO</option>
                      
                
                    </select>
                </div>
                <div class="col">
                    <label style="color:red">
                    Movil
                    </label>
                    <select class="custom-select" v-model="movil">
                      <option value="Si" selected>Si</option>
                      <option value="No">NO</option>
                      
                
                    </select>
                </div>
                <div class="col">

                  <label  style="color:red">Deco (max 21 caracteres)</label>
                    <input type="text" name="" id="" class="form-control" maxlength="21" placeholder="Ingresa descripcion para deco" v-model="deco" >
                  
                    </div>
        </div> 
          
          
          <br><br><br><br>
        
       

        <div class="card-footer">
          <button type="button" class="btn btn-outline-success" @click="createOffer">Agregar</button>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  props: ['services'],
  data(){
    return {
      active:false,
      active2:false,
      company: "",
      departments: [],
      municipalities: [],
      type: null,
      tariff: "",
      benefits: 1234512345123456,
      service: null,
      titulo1:"" ,
      titulo2:"" ,
      titulo3:"" ,
      titulo4:"" ,
      canales:"" ,
      points: 0,
      fields: [],
      fieldsValues: [],
      companies: [],
      tipo_plan_logos:"",
      tegnologia:"",
      telefonia:"",
      permanencia:"" ,
      fijo:"" ,
      movil:"" ,
      deco:"" 
      
    }
  },

  mounted(){
    this.refreshData();
  },
  methods:{
    refreshData(){
      let loader = this.$loading.show();
      axios.get(baseUrl+'/api/companies')
      .then(res=>{
        console.log(res);
        this.companies=res.data;
      }).catch(err=>{
        if(err.response.status===403){
          window.location.replace(baseUrl+"/login");
        }
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }else{
          toastr.error('Error al obtener las empresas');
        }
      }).finally(()=>loader.hide());
    },
    
    setDepartments(departments){
      this.departments=departments;
    },

    setMunicipalities(municipalities){
      this.municipalities=municipalities;
    },

    getFields(){
      axios.get(baseUrl+"/api/service/"+this.service+"/fields")
      .then(res=>{
        this.fields=res.data
      }).catch(err=>toastr.error("error al obtener los campos del servicio"))
    },

    /*setCompany(company){
      this.company=company.name
    },*/

    async createOffer(){
      let continueCreation=true;
      let valuesArray=[];

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

      let fd= new FormData();
      fd.append("company", this.company);
      if(this.departments.length) fd.append("departments", JSON.stringify(this.departments));
      if(this.municipalities.length) fd.append("municipalities", JSON.stringify(this.municipalities));
      if(this.type) fd.append("type", this.type);
      fd.append("tariff", parseInt(this.tariff));
      fd.append("benefits", this.benefits);
      fd.append("titulo1", this.titulo1);
      fd.append("titulo2", this.titulo2);
      fd.append("titulo3", this.titulo3);
      fd.append("titulo4", this.titulo4);
      fd.append("permanencia", this.permanencia);
      fd.append("fijo", this.fijo);
      fd.append("movil", this.movil);
      fd.append("deco", this.deco);
      fd.append("canales", this.canales);
      fd.append("service", this.service);
      fd.append("points", this.points);
      fd.append("tecnologia", this.tecnologia);
      fd.append("telefonia", this.telefonia);
      fd.append("tipo_plan_logos", this.tipo_plan_logos);
      fd.append("fields_values", valuesArray.length?JSON.stringify(valuesArray):null);

      let loader = this.$loading.show();

      axios.post(baseUrl+'/api/offer',fd)
      .then(res=>{
        console.log("RESPONSE FROM SERVER ",res);
        toastr.success("Oferta creada con éxito");
        this.company = "";
        this.departments = [];
        this.municipalities = [];
        this.type = "private";
        this.tariff = "";
        this.benefits = "";
        this.titulo1 = "";
        this.titulo2 = "";
        this.titulo3 = "";
        this.titulo4 = "";
        this.permanencia = "";
        this.fijo = "";
        this.movil = "";
        this.deco = "";
        this.canales = "";
        this.tipo_plan_logos = 0;
        this.tecnologia = 0;
        this.telefonia = 0;
        this.service = null;
        this.points = 0;
        this.fields_values = [];
        this.$refs.zoneSelectRef.reset();
        this.$emit('refresh');
      }).catch(err=>{
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
      }).finally(()=>loader.hide());
    }
  }
}

</script>
