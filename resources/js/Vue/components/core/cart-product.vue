<template>
    <div>
    <strong class="h6 mb-2 d-block mt-5">{{ product.name }}</strong>
        <div class="cart-product mb-3">
            <div class="thumbnail">
                <img :src="'storage/'+product.thumbnail" alt="">
            </div>
            <div class="uniq-price">
                <span>{{ product.price }}$</span>
            </div>
            <div class="qte-manager">
                <div class="plus text-light" style="user-select:none;" @click="addQte()">+</div>
                <div class="qte h4 m-0">{{ pQte }}</div>
                <div class="mins text-light" style="user-select:none;" @click="MinsQte()">-</div>
            </div>
            <div class="total-price">
                <span>{{ totalPrice }}$</span>
            </div>
            <div class="close" @click="removeMe()">
                <span><i class="fas fa-times"></i></span>
            </div>
        </div>
    </div>
</template>

<style lang="css">
.cart-product{
    overflow: hidden;
    border-radius: 5px;
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: stretch;
}
.cart-product:hover{
    background-color: rgba(0,0,0,.05);
}
.thumbnail img{
    width:90px;
    height:100px;
    background-color: var(--bs-primary);
    padding: 8px;
}
.details{
    height:100px;
    padding: 8px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.uniq-price{
    height:100px;
    padding: 8px 16px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex: 1;
}
.qte-manager{
    height:100px;
    padding: 8px 16px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    flex: 1;
}
.plus{
    width: 25px;
    height: 25px;
    border-radius: 5px;
    background-color: var(--bs-primary);
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}
.mins{
    width: 25px;
    height: 25px;
    border-radius: 5px;
    background-color: var(--bs-primary);
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}
.total-price{
    height:100px;
    padding: 8px 16px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex: 1;
}
.close{
    height:100px;
    padding: 8px 16px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex: 1;
    cursor: pointer;
    transition: .3s;
}
.close:hover{
    background-color: var(--bs-primary);
    opacity: 1;
    color: var(--bs-dark);

}
</style>

<script>
    export default {
        data:()=>{
            return {
                price: 0,
                totalPrice: 0.00,
                pQte : 0
            }
        },
        props:{
            qte:Number,
            product:Object
        },
        created(){
            this.pQte = this.qte
            this.price = this.product.price
            this.totalPrice = this.product.price * this.pQte
            this.$store.commit('ADD_TO_TOTAL_CART',this.totalPrice)
        },
        methods:{
            removeMe(){
                    this.$store.commit('REMOVE_FROM_CART',this.product.id)
                    this.$emit('remove')
                    this.$store.commit('CHANGE_CART_TOTAL_PRICE',this.totalPrice,0)
            },
            addQte(){
                this.pQte++
                this.$store.commit('CHANGE_CART_TOTAL_PRICE',{op:'+','price':this.product.price})
                this.calculateTotalPrice()
            },
            MinsQte(){
                if(this.pQte > 0){
                    this.pQte--
                    this.$store.commit('CHANGE_CART_TOTAL_PRICE',{op:'-','price':this.product.price})
                    this.calculateTotalPrice()
                }
            },
            calculateTotalPrice(){
                let oldP = this.totalPrice
                let NewP = this.pQte * parseInt(this.price,10)
                this.totalPrice = NewP
            }
        }
    }
</script>
