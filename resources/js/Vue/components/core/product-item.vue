<template>
    <div class="mx-auto">
        <router-link  :to="/product/+product.id">
            <div class="productItem shadow-sm">
                <span class="title h5 m-3">{{ product.name }}</span>
                <div class="thumbnail my-3" v-bind:style="'background-image:url(/storage/'+product.thumbnail+')'">
                </div>
                <router-link  :to="/product/+product.id" class="more d-block my-3">More info <i class="fas fa-long-arrow-alt-right"></i></router-link>
                <span class="sale" v-if="product.on_sale">Sale</span>
                <div class="w-100 px-3 mt-4 d-flex justify-content-between align-items-center">
                    <span class="price">${{ parseFloat(product.price).toFixed(2) }}</span>
                    <span v-if="(product.categories)" class="category">{{ product.categories.name }}</span>
                </div>
            </div>
        </router-link>
    </div>
</template>

<style lang="css" scoped>
.thumbnail{
    width:100%;
    height: 250px;
    background-position: center center;
    background-size: contain;
    background-repeat: no-repeat;
    margin-bottom: 16px;
}
a{
    text-decoration: none;
    color: inherit;
}
.productItem {
    display: inline-block;
    float: left;
    position: relative;
    border-radius: 10px;
    background: linear-gradient(-45deg, #FBC402 50%, #fbfcd4 100%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: .3s;
    width: 100%;
    height: 450px;
    box-shadow: 0px 8px 16px rgba(122, 95, 0, 0.52);
    margin: 16px;

}
.productItem img{max-width:100%;
    transition: .3s;}
.productItem:hover{
    box-shadow: rgba(0 0 0,0.13) 0px 8px 19px 6px;
}
.productItem:hover img{
    transform: scale(1.05);
}
.title{
    font-weight: bold;
    text-align: left;
/*    position: absolute;
    left: 16px;
    top: 16px;*/
    max-width: 90%;
    text-align:left;
    margin-bottom: 16px;
}
.more{
    color: inherit;
    text-decoration: none;
    position: relative;
    z-index: 1;
    transition: .3s;
    font-family: Raleway;
    font-weight: bold;
    font-size: 15px;
    text-align: left;
    color: #0a0a0a;

}
.more:hover{
    padding-inline-start: 16px;
}
.more:before{
    content: '';
    width: 50px;
    height: 50px;
    border-radius: 50px;
    background-color: #fbfcd4;
    position: absolute;
    left: -20px;
    top:-50%;
    z-index: -1;
}
.price{
    font-family: Nunito;
    font-weight: bold;
    font-style: italic;
    font-size: 30px;
    letter-spacing: 0.02em;
    color: #0a0a0a;
    text-align: left;
}
.category{
    font-family: Raleway;
    font-weight: normal;
    font-size: 16px;
    text-align: right;
    color: #000;
}
.sale{
width: 46px;
height: 46px;
background: #fbfcd4;
border: 5px solid #151515;
position: absolute;
top:-23px;
right: -23px;
border-radius: 68px;
font-family: Nunito;
font-weight: bold;
font-style: italic;
font-size: 14px;
letter-spacing: 0.02em;
text-align: center;
color: #0a0a0a;
display: flex;
justify-content: center;
align-items: center;
}
@media screen and (max-width:800px) {
    .productItem{
        max-width: 350px;
    }
}
</style>

<script>
export default {
    props:{
        product:Object
    },
    created(){
        console.log(this.product);
    }
}
</script>
