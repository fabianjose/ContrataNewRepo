<template>
  <div class="modal fade" id="modalViewService" aria-modal="true" style="padding-right: 15px; display: block;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h4 class="modal-title">Detalle de Servicio</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="card-body d-flex flex-column box-profile">
          <h2 class="text-center">{{service.name}}</h2>
          <h5 class="">Campos</h5>
          <ul class="list-group list-group-unbordered mb-3 mt-3">
            <li class="list-group-item" v-for="field in service.fields" :key="field.id">
              <b class="text-capitalize">{{field.name}}</b> <a class="float-right">{{getFieldType(field.type)}} <span v-if="field.unit">({{field.unit}})</span> </a>
            </li>
          </ul>
          <button href="#" class="btn btn-outline-danger btn-block" data-dismiss="modal"><b>Cerrar</b></button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:["service"],
  data(){
    return {
      baseUrl: baseUrl,
    }
  },
  methods:{
    getFieldType(label=string){
          switch (label) {
              case "string":
                    return "Texto"
                  break;
              case "numeric":
                    return "Numero"
                  break;

              default:
                  break;
          }
      },
  }
}
</script>
