<template>
  <li class="list-group-item d-flex justify-content-between">
    <h5 class="px-2 mt-2 card-text text-capitalize text-break" style="color: #006494;">{{title}}</h5>
    <div class="btn-group flex-wrap">
      <!-- <button type="button" class="btn btn-app rounded mx-1" @click="emitEdition" data-toggle="modal" data-target="#modalEditService">
        <i class="fas fa-edit"></i>
      </button> -->
      <button type="button" class="btn btn-app rounded mx-1" @click="emitRemove">
        <i class="fas fa-trash"></i>
      </button>
    </div>
  </li>
</template>

<script>
export default {
  props:["title", "index", "zone"],

  methods:{
    emitEdition(){
      let {index,zone}=this;
      this.$emit('edit', {id:index, zone})
    },
    emitRemove(){
      let {index,zone}=this;      
      this.$emit('delete', {id: index, zone})
    },
  }
}
</script>