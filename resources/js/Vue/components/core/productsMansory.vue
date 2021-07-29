<template>
    <div class="bg-white p-5">
        <div class="container">
            <div class="row ">
                <div class="col-auto m-auto my-5">
                    <span class="h3 text-dark display-6">Our latested <span class="text-primary">products</span></span>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row ">
                <div class="col">
                    <div class="products masonry">
                        <productItem v-for="(product,index) in products" :product=product :key="index"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-primary btn-lg px-5 rounded-pill mx-auto">View more</a>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="css" scoped>
.masonry {
   display: grid;
   grid-template-columns: repeat(3,1fr);
   grid-gap: 16px;
}
@media screen and (max-width:600px) {
    .masonry {
        grid-template-columns: 1fr;
    }
}
@media screen and (min-width: 600px) and (max-width:775px) {
    .masonry {
        grid-template-columns: 1fr 1fr;
    }
}
</style>

<script>
import productItem from './product-item.vue'
export default {
    components:{
        productItem
    },
    props:{
        products:Array,
        limit:Number,
        loadMore:Boolean
    }
}
</script>
