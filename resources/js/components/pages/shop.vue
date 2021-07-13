<template>
    <div>
        <MainHeader/>
        <productsMansory :limit="7"/>
    </div>
</template>

<style lang="css" scoped>

</style>
<script>
import MainHeader from '../core/header.vue'
import slider from '../core/slider.vue'
import productsMansory from '../core/productsMansory.vue'
export default {
    components:{
        MainHeader,
        slider,
        productsMansory
    }
}
</script>
