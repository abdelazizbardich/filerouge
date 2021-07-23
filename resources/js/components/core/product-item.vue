<template>
    <div>
        <router-link  :to="/product/+product.id">
            <div class="productItem">
                <span class="title h4">{{ product.name }}</span>
                <img :src="product.thumbnail">
                <router-link  :to="/product/+product.id" class="more">More info <i class="fas fa-long-arrow-alt-right"></i></router-link>
            </div>
        </router-link>
    </div>
</template>

<style lang="css" scoped>
a{
    text-decoration: none;
    color: inherit;
}
.productItem {
    position: relative;
    background-color: var(--bs-info);
    border-radius: 5px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-block: 20%;
    padding-inline: 64px;
    transition: .3s;
    height: 100%;
}
.productItem img{max-width:100%;
    transition: .3s;}
.productItem:hover{
    box-shadow: rgb(0 0 0) 0px 8px 19px 6px;
}
.productItem:hover img{
    transform: scale(1.05);
}
.title{
    font-weight: bold;
}
.more{
    color: inherit;
    text-decoration: none;
    position: relative;
    z-index: 1;
    transition: .3s;
}
.more:hover{
    padding-inline-start: 16px;
}
.more:before{
    content: '';
    width: 50px;
    height: 50px;
    border-radius: 50px;
    background-color: var(--bs-white);
    position: absolute;
    left: -20px;
    top:-50%;
    z-index: -1;
}
</style>

<script>
export default {
    props:{
        product:Object
    },
    created(){

    }
}
</script>
