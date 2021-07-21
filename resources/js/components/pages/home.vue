<template>
    <div>
        <MainHeader/>
        <slider/>
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
        axios.get('http://127.0.0.1:8000/api/product/')
            .then(response => {
                this.products = response.data.data
        })
    }
}
</script>
