<template>
    <div>
        <router-link  :to="/product/+product.id">
            <div class="productItem shadow-sm">
                <span class="title h5 text-center">{{ product.name }}</span>
                <div class="thumbnail" v-bind:style="'background-image:url('+product.thumbnail+')'">
                </div>
                <router-link  :to="/product/+product.id" class="more">More info <i class="fas fa-long-arrow-alt-right"></i></router-link>
            </div>
        </router-link>
    </div>
</template>

<style lang="css" scoped>
.thumbnail{
    margin-top: 16px;
    margin-bottom: 32px;
    width:293px;
    height:373px;
    background-position: center center;
    background-size: contain;
    background-repeat: no-repeat;
}
a{
    text-decoration: none;
    color: inherit;
}
.productItem {
    position: relative;
    background-color: var(--bs-white);
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
    box-shadow: rgba(0 0 0,0.13) 0px 8px 19px 6px;
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
    background-color: var(--bs-primary);
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
