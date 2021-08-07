<template>
    <div>
        <MainHeader/>
        <slider :products=[products[0],products[1],products[2],products[3],products[4]] />
        <productsMansory :products=products :limit=12 :loadMore=true />
        <Footer/>
    </div>
</template>

<style lang="css" scoped>

</style>
<style>
    .main-header {
    border-bottom: 2px solid var(--bs-primary);
    }
    .main-header:after {
        display: none;
    }
</style>
<script>
import MainHeader from '../core/header.vue'
import slider from '../core/slider.vue'
import productsMansory from '../core/productsMansory.vue'
import Footer from '../core/footer.vue'
export default {
    components:{
        MainHeader,
        slider,
        productsMansory,
        Footer
    },
    data:()=>{
        return {
            products :[]
        }
    },
}
</script>
