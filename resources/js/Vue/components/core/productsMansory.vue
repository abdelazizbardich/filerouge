<template>
    <div class="p-5 main-mansory">
        <div class="container">
            <div class="row ">
                <div class="col-auto m-auto my-5">
                    <span class="h3 text-light display-6">Our latested <span class="text-info">products</span></span>
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
                    <a @click="moreProducts()" class="btn btn-info btn-lg px-5 rounded-pill mx-auto">View more</a>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="css" scoped>

.masonry {
   display: grid;
   grid-template-columns: repeat(3,1fr);
   grid-gap: 32px;
    justify-items: stretch;
}
@media screen and (max-width:800px) {
    .masonry {
        grid-template-columns: 1fr;
    }
}
@media screen and (min-width: 800px) and (max-width:1020px) {
    .masonry {
        grid-template-columns: 1fr 1fr;
    }
}
</style>

<script>
import productItem from './product-item.vue'
export default {
    data:()=>{
        return {
            currentPage : 0,
            products:[]
        }
    },
    components:{
        productItem
    },
    props:{
        // products:Array,
        limit:Number,
        loadMore:Boolean,
        last_page:Number
    },
    created(){
        this.moreProducts()
    },
    methods:{
        moreProducts(){
            this.currentPage++
            axios.get('http://127.0.0.1:8000/api/product?page='+this.currentPage)
            .then(response => {
                response.data.data.forEach(element => {
                   this.products.push(element);
                });
            })
        }
    }
}
</script>
