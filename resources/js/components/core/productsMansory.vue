<template>
    <div class="bg-dark p-5">
        <div class="container">
            <div class="row ">
                <div class="col-auto m-auto my-5">
                    <span class="h3 text-light display-6">Our latested <span class="text-warning">products</span></span>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row ">
                <div class="col">
                    <div class="products masonry">
                        <productItem v-for="(i,index) in limit" :key="index"  :id=i :path="'/img/mansory/item'+i+'.png'"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-light btn-lg px-5 rounded-pill mx-auto">View more</a>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="css">
.masonry {
   display: grid;
   grid-template-columns: repeat(3,1fr);
   grid-gap: 16px;
}
</style>

<script>
import productItem from './product-item.vue'
export default {
    components:{
        productItem
    },
    props:{
        limit:Number
    }
}
</script>
