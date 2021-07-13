<template>
    <div>
        <mainHeader/>
        <div class="main-cart bg-dark">
            <div class="row m-0 h-100">
                <div class="col-8 text-light bg-light h-100 overflow-hidden">
                    <div class="p-5 h-100">
                        <h3 class="display-6 text-primary">Cart</h3>
                        <div class="cart-products pt-2 h-100">
                            <div class="overflow-auto h-100">
                                <product @remove="removeProduct(product)" v-for="(product,index) in products" :key="index" :id="product"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <checkout/>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="css" scoped>
.main-cart{
    height: calc(100vh - 85px);
}
</style>

<script>
import mainHeader from '../core/header.vue'
import checkout from '../core/checkout.vue'
import product from '../core/cart-product.vue'
export default {
    components:{
        mainHeader,
        checkout,
        product
    },
    data:()=>{
        return {products:[1,2,3,4,5,6]}
    },
    methods:{
        removeProduct(product){
            this.products.pop(product)
        }
    }
}
</script>
