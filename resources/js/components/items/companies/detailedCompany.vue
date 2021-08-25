<template>
<div class="modal fade" id="modalViewCompany" aria-modal="true" style="padding-right: 15px; display: block;">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header bg-info text-white">
              <h4 class="modal-title">Perfil de la Empresa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="card-body d-flex flex-column box-profile">

            <img class="align-self-center img-fluid" :src="baseUrl+'/storage/'+company.logo" style="max-height: 300px;">

            <h2 class="profile-username text-center">{{company.name}}</h2>

            <p class="text-muted text-center" v-if="company.highlighted">Esta empresa está destacada</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>NIT de la Empresa</b> <a class="float-right">{{company.nit}}</a>
              </li>
              <li class="list-group-item">
                <b>Teléfono de la Empresa</b> <a class="float-right">{{company.phone}}</a>
              </li>
              <li class="list-group-item">
                <b>Web de la Empresa</b> <a class="float-right">{{company.web}}</a>
              </li>
            </ul>

            <button href="#" class="btn btn-outline-danger btn-block" data-dismiss="modal"><b>Cerrar</b></button>
          </div>
          <!-- /.card-body -->
    </div>
    <!-- /.modal-content -->
  </div>

</div>
</template>

<script>
export default {

    data(){
        return {
            baseUrl: baseUrl,
        }
    },

    props:[
        "company"
    ],
}
</script>
