<template>
    <div>
        <mainHeader/>
        <div class="main-cart bg-white">
            <div class="row m-0 h-100">
                <div class="col-12 col-md-6 text-light bg-light h-100 overflow-hidden">
                    <div class="p-5 h-100">
                        <h3 class="display-6 text-primary">Cart</h3> <span class="text-danger">TotalCart: <span>{{ totalCart }}</span></span>
                        <div class="cart-products pt-2 h-100">
                            <div class="overflow-auto h-100">
                                <product @remove="removeProduct(product)" @addTotal="addTotal" v-for="(product,index) in cartData" :key="index" :id="product.productId" :product=product :qte="product.count"/>
                                <div v-if="cartData.length == 0" class="empty-cart">
                                    Your cart is empty, add some products to your cart to continue !
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 bg-primary">
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
.empty-cart {
    color: red;
    padding: 8px 16px;
    border: 1px solid red;
    border-radius: 5px;
    background: #ffe7ef;
}
</style>

<script>
import mainHeader from '../core/header.vue'
import checkout from '../core/checkout.vue'
import product from '../core/cart-product.vue'
import axios from 'axios'
export default {
    components:{
        mainHeader,
        checkout,
        product
    },
    data:()=>{
        return {
            cartData:[],
            // totalCart:0
        }
    },
    created(){
        if(this.getCart())
        this.getCart().forEach(pCart => {
            axios.get('http://127.0.0.1:8000/api/product/'+pCart.productId).then(response=>{
                response.data.count = pCart.count
                this.cartData.push(response.data)
            })
        });

    },
    computed:{
        totalCart(){
            return this.totalCart = this.$store.getters.getTotalCart
        }
    },
    methods:{
        removeProduct(product){
            this.cartData.pop(product)
        },
        getCart(){
            if(localStorage.getItem('cart') !== null){
                return JSON.parse(localStorage.getItem('cart'))
            }
            return false;
        },
        addTotal(Data){
            // alert(rray data)
            if(this.totalCart.Data[1]){
                this.totalCart.Data[1] = Data[0];
            }else{
                this.totalCart.Data[1] = Data[0];
            }
        }
    }
}
</script>
