<template>
    <div>
        <div class="cart-product text-dark mb-3">
            <div class="thumbnail">
                <img src="/img/mansory/item1.png" alt="">
            </div>
            <div class="details">
                <strong class="h3">Ekebol</strong>
                <span class="small">#QSDCSDGFDF</span>
            </div>
            <div class="uniq-price">
                <span>{{ price }}$</span>
            </div>
            <div class="qte-manager">
                <div class="plus text-light" @click="addQte()">+</div>
                <div class="qte h4 m-0">{{ qte }}</div>
                <div class="mins text-light" @click="MinsQte()">-</div>
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
    background-color: var(--bs-info);
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
    background-color: var(--bs-dark);
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}
.mins{
    width: 25px;
    height: 25px;
    border-radius: 5px;
    background-color: var(--bs-dark);
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
    background-color: var(--bs-info);
    opacity: 0.5;
    color: red;
}
</style>

<script>
    export default {
        data:()=>{
            return {
                // qte:0,
                price: 300.00,
                totalPrice: 0.00,
            }
        },
        props:{
            qte:Number
        },
        created(){
            this.totalPrice = this.price * this.qte
        },
        methods:{
            removeMe(){
                this.$emit('remove')
            },
            addQte(){
                this.qte++
                this.calculateTotalPrice()
            },
            MinsQte(){
                if(this.qte > 0){
                    this.qte--
                    this.calculateTotalPrice()
                }
            },
            calculateTotalPrice(){
                this.totalPrice = this.qte * this.price
            }
        }
    }
</script>
