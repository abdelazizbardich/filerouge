<template>
    <div>
        <MainHeader/>
        <productsMansory :products=products />
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
    },
    data:()=>{
        return {
            products : []
        }
    },
    created(){
        this.$store.dispatch('showLoader')
        axios.get(this.$store.state.apiUrl+'/product/')
            .then(response => {
                this.products = response.data.data
                this.$store.dispatch('hideLoader')
        })
    }
}
</script>
