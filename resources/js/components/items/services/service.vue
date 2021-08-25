<template>
  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
    <h5 class="px-2 mt-2 card-text text-capitalize" style="color: #006494;">{{title}}</h5>
    <div class="btn-group flex-wrap">
      <button type="button" class="btn btn-app rounded mx-1" @click="emitView" data-toggle="modal" data-target="#modalViewService">
        <i class="fas fa-eye"></i>
      </button>
      <button type="button" class="btn btn-app rounded mx-1" @click="emitEdition" data-toggle="modal" data-target="#modalEditService">
        <i class="fas fa-edit"></i>
      </button>
      <button type="button" class="btn btn-app rounded mx-1" @click="emitRemove">
        <i class="fas fa-trash"></i>
      </button>
    </div>
  </li>
</template>

<script>
export default {
  props:["title", "index"],
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
  }
}
</script>
