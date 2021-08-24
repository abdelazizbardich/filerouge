<template>
    <div>
        <mainHeader/>
        <div class="main-cart">
            <div class="row m-0">
                <div class="col-12 col-md-6 text-info h-100 overflow-hidden">
                    <div class="p-5 h-100">
                        <h3 class="display-6 text-info">Cart</h3> <span>TotalCart: <span>{{ totalCart }}</span></span>
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
                <div class="col-12 col-md-6">
                    <checkout v-if="cartData.length > 0" />
                </div>
            </div>
        </div>
        <Footer/>
    </div>
</template>

<style lang="css" scoped>
.main-cart{
    min-height: calc(100vh - 85px);
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
import Footer from '../core/footer.vue'
export default {
    components:{
        mainHeader,
        checkout,
        product,
        Footer
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
            this.$store.dispatch('showLoader')
            axios.get(this.$store.state.apiUrl+'/product/'+pCart.productId).then(response=>{
                response.data.count = pCart.count
                this.cartData.push(response.data)
                this.$store.dispatch('hideLoader')
            })
        });

    },
    computed:{
        totalCart(){
           return this.$store.getters.getTotalCart
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
