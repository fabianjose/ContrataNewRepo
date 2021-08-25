<template>
    <i :class="'float-button '+(classIcon?classIcon:'fas fa-plus-circle')+(active?' active':'')"></i>    
</template>

<script>
export default {
    
    props: ["active", "classIcon"]

}
</script>

<style>

    .float-button{
        font-size: 1.5rem;
        transition: all 0.3s ease-in-out;    
        transform: rotate(90deg);
    }

    .float-button.active{
        transition: all 0.5s;
        transform: rotate(225deg);
    }

</style>


