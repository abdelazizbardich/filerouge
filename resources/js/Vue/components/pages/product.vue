<template>
    <div>
        <MainHeader/>
        <div class="product-panel bg-white">
            <div class="row m-0 h-100">
                <div class="col-12 col-md-8 h-100 px-3 py-2 showcast">
                    <div class="product-path">
                        <router-link to="/">Home</router-link> / <router-link to="/shop">Shop</router-link> / <router-link :to="'/shop/categoruy/'+product.categoryId">{{ product.categoryName }}</router-link> / <strong>{{ product.title }}</strong>
                    </div>
                    <div class="gallery">
                            <div class="navigation">
                                <div class="prev" style="cursor:pointer;" @click="prevSlide()"><i class="fas fa-chevron-up"></i></div>
                                <div class="dots">
                                    <div style="cursor:pointer;" v-for="(photo,index) in product.gallery" :class="(index == currentSlide)?'active':''" :key=index class="dot" @click="goToSlide(index)"></div>
                                </div>
                                <div class="next" style="cursor:pointer;" @click="nextSlide()"><i class="fas fa-chevron-down"></i></div>
                            </div>
                            <div class="slider">
                                <img :src="slide.thumbnail" alt="">
                            </div>
                    </div>
                    <div class="details">
                        <div class="category">
                        <router-link :to="'/shop/categoruy/'+product.categoryId">{{ product.categoryName }}</router-link>
                        </div>
                        <div class="title">
                            <h1 class="display-6"><strong>{{ product.title }}</strong></h1>
                        </div>
                        <div class="price h3 text-danger"><strong>${{ product.price }}</strong></div>
                    </div>
                </div>
                <div class="col-12 col-md-4  bg-light px-5 py-3 infos text-dark">
                    <div class="description">
                        <div><span>Description: </span></div>
                        <p class="small my-3 mb-5">{{ product.description }}</p>
                    </div>
                    <hr>
                    <div class="p-details">
                        <div><span>Product informations: </span></div>
                        <div class="small my-3 d-flex"><strong class="w-25 d-inline-block">Dimentions:</strong><span class="w-75 d-inline-block">Width {{ product.dimentions.w }} × Breadth {{ product.dimentions.b }} × Height {{ product.dimentions.h }} cm</span></div>
                        <hr>
                        <div class="small my-3 d-flex"><strong class="w-25 d-inline-block">Materials:</strong><span class="w-75 d-inline-block">{{ product.materials }}</span></div>
                        <hr>
                        <div class="small my-3 d-flex"><strong class="w-25 d-inline-block">Good to know:</strong><span class="w-75 d-inline-block">{{ product.goodToKnow }}</span></div>
                        <hr>
                    </div>
                    <div class="actions">
                        <div class="add-to-cart shadow cart-btn" @click="addtoCart">
                            <a  class="btn text-light">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                        </div>
                        <div class="buy-now">
                            <a class="btn btn-warning shadow rounded-pill btn-lg px-5 text-dark mx-3"  @click="buyNow">BUY NOW</a>
                        </div>
                        <div class="stock">
                            <span :class="'h4 text-'+product.stockClass">{{ product.stock }}</span> in stock
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-full-description bg-light text-dark py-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div><h2 class="mb-5">Full description:</h2></div>
                        <div v-html="product.full_description"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-products bg-white py-5 text-center text-dark">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div><h2 class="mb-5"><i><strong>Similar</strong></i> <span class="text-primary">Products</span></h2></div>
                        <div class="similar-products-grid text-dark">
                            <productItem v-for="(product,index) in similarProducts"  :key="index" :product=product />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<style lang="css" scoped>
a{
    text-decoration: none;
    color: inherit;
}
.product-panel{
    height: calc(100vh - 85px);
}
.showcast{
    position: relative;
}
.details{
    position: absolute;
    bottom: 5%;
    left: 10%;
}
.product-path{
    position: absolute;
    top: 5%;
    left: 10%;
    font-size: 12px;
}
.slider{
    position: absolute;
    left: 60%;
    top: 50%;
    transform: translateX(-50%) translateY(-50%);
}
.slider img{
    max-width: 350px;
    max-height: 350px;
    width: 100%;
}
.navigation{
    position: absolute;
    left: 10%;
    top: 40%;
    transform: translateY(-50%);
    height: fit-content;
    width: fit-content;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.dots{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.dot{
    width: 5px;
    border-radius: 5px;
    height: 20px;
    background-color: var(--bs-dark);
    margin-block: 5px;
    opacity: .2;
    transition: .3s;
}
.dot:hover{
    transform: scale(1.1);
}
.dot.active{
    opacity: 1;
}
.prev{
    width: 40px;
    height: 40px;
    border-radius: 40px;
    background-color: var(--bg-light);
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.116) 0px 2px 3px;
    margin-block: 5px;
}
.next{
    width: 40px;
    height: 40px;
    border-radius: 40px;
    background-color: var(--bg-light);
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.116) 0px 2px 3px;
    margin-block: 5px;
}
.next.disabled,.prev.disabled{
    box-shadow: none;
}
.next:hover,.prev:hover{
    background-color: var(--bs-primary);
    color:#ffffff;
}
hr{
    opacity: .5;
    background-color: black;
}
.actions{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
}
.add-to-cart{
    border-radius: 150px !important;
    height: 47px;
    width: 47px;
    border:none;
    background-color: rgb(17, 0, 255);
    color: var(--bs-white);
    display: flex;
    justify-content: center;
    align-items: center;
}
.similar-products-grid{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    grid-gap: 16px;
}
@media screen and (max-width:600px){
    .similar-products-grid{
        grid-template-columns:1fr;
    }
    .product-panel,.showcast{
        height: auto;
        min-height: calc(100vh - 85px);
    }
    .actions{
        flex-direction: column;
    }
    .actions > *{
        margin-bottom: 16px;
    }
}
@media screen and (min-width:600px) and (max-width:930px) {
    .similar-products-grid{
        grid-template-columns: 1fr 1fr;
    }
    .product-panel,.showcast{
        height: auto;
        min-height: calc(100vh - 85px);
    }
}
@media screen and (min-width:930px) and (max-width:1020px) {
    .similar-products-grid{
        grid-template-columns: 1fr 1fr 1fr;
    }
}
</style>

<script>
import MainHeader from '../core/header.vue'
import productItem from '../core/product-item.vue'
import axios from 'axios'
export default {
    components:{
        MainHeader,
        productItem
    },
    props: ['id'],
    data(){
        return {
            product : {
                inCart:false,
                stockClass : "success",
                stock:103,
                id: 0,
                title:'',
                price:0.00,
                description:'',
                thumbnail:'',
                full_description:'',
                dimentions:{},
                materials:[],
                goodToKnow:'',
                gallery:[],
                categoryName:'',
                categoryId:1
            },
            currentSlide:0,
            slide:[],
            similarProducts:[]
        }
    },
    watch:{
        product: ()=>{
            alert("sdqsd")
        }
    },
    created(){
        this.product.id = this.$route.params.id
        if(this.product.stock >= 100){
            this.product.stockClass = "success"
        }else if(this.product.stock < 100 && this.product.stock > 50){
            this.product.stockClass = "warning"
        }else{
            this.product.stockClass = "danger"
        }
        this.setProductData()
    },
    methods:{
        goToSlide(slide){
            this.currentSlide = slide
            this.setSlide(this.currentSlide)
        },
        prevSlide(){
            if(this.currentSlide > 0){
                this.currentSlide--
            }else{
                this.currentSlide = this.product.gallery.length - 1
            }
            this.setSlide(this.currentSlide)
        },
        nextSlide(){
            if(this.currentSlide < this.product.gallery.length - 1){
                this.currentSlide++
            }else{
                this.currentSlide = 0
            }
            this.setSlide(this.currentSlide)
        },
        setSlide(slide){
            this.slide.thumbnail = this.product.gallery[slide].path
        },
        addtoCart(){
            if(!this.product.inCart){
                this.$store.commit('ADD_TO_CART',this.product.id)
                this.product.inCart = true;
                // this.desableMe()
                this.product.stock--
            }
        },
        buyNow(){
            this.addtoCart()
            this.$router.push('/cart')
        },
        desableMe(ok = true){
            if(ok)
            document.querySelector('.cart-btn').style.opacity = 0.5
            else
            document.querySelector('.cart-btn').style.opacity = 1
        },
        setProductData(id = this.id){
            axios.get('http://127.0.0.1:8000/api/product/'+id).then((response)=>{
                if(response.status == 200){
                    console.log(response.data);
                    this.product.inCart = false
                    this.product.stock = response.data.stock
                    this.product.title = response.data.name
                    this.product.price = response.data.price
                    if(response.data.description.length > 250){this.product.description = response.data.description.substring(0,250)+'...'}else{this.product.description = response.data.description}
                    this.product.thumbnail = response.data.thumbnail
                    this.product.full_description = response.data.full_description
                    this.product.dimentions.w = JSON.parse(response.data.dimentions).w
                    this.product.dimentions.b = JSON.parse(response.data.dimentions).b
                    this.product.dimentions.h = JSON.parse(response.data.dimentions).h
                    response.data.materials.forEach(material => {
                        this.product.materials.push(material.name)
                    });
                    this.product.materials = this.product.materials.join()
                    this.product.goodToKnow = response.data.good_to_know
                    this.product.gallery = response.data.medias
                    this.product.categoryName = response.data.categories.name
                    this.product.categoryId = response.data.categories.id
                    this.setSimilarProducts()
                    this.setSlide(0)
                    this.loopSlide()
                }
            });
        },
        loopSlide(){
            setInterval(() => {
                this.nextSlide()
            }, 5000);
        },
        setSimilarProducts(){
            axios.get('http://127.0.0.1:8000/api/product/catergoy/'+this.product.categoryId+'/3').then(response=>{
                this.similarProducts = response.data
            })
        }
    },
    beforeRouteUpdate(to, from, next){
        next()
        this.desableMe(false)
        this.product.inCart = false;
        this.setProductData(this.$route.params.id)
        this.setSlide(0)
        this.currentSlide = 0
    }
}
</script>
