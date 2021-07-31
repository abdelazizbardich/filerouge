<template>
    <div>
        <MainHeader/>
        <slider :products=[products[0],products[1],products[2],products[3],products[4]] />
        <productsMansory :products=products :limit=12 :loadMore=true />
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
            products :[]
        }
    },
    created(){
        this.getProducts()
    },
    methods:{
        async getProducts(){
            axios.get('http://127.0.0.1:8000/api/product/')
                .then(response => {
                    console.log(response);
                    this.products = response.data.data
            })
        }
    }
}
</script>
