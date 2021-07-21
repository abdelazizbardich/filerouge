<template>
  <router-view></router-view>
</template>


<style lang="css">

</style>

</style>

<script>

export default {
  name: 'App',
  created(){
    this.$store.dispatch("getProducts")
    this.$store.commit("SET_CART_COUNT")
  },

}
</script>
