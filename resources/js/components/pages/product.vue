<template>
    <div>
        <MainHeader/>
        <div class="product-panel bg-dark">
            <div class="row m-0 h-100">
                <div class="col-8 bg-light h-100 px-3 py-2 showcast">
                    <div class="product-path">
                        <a href="#">Home</a> / <a href="#">Shop</a> / <a href="#">Category</a> / <strong>Product name</strong>
                    </div>
                    <div class="gallery">
                            <div class="navigation">
                                <div class="prev"><i class="fas fa-chevron-up"></i></div>
                                <div class="dots">
                                    <div class="dot"></div>
                                    <div class="dot active"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                </div>
                                <div class="next disabled"><i class="fas fa-chevron-down"></i></div>
                            </div>
                            <div class="slider">
                                <img src="/img/mansory/item4.png" alt="">
                            </div>
                    </div>
                    <div class="details">
                        <div class="category">
                            <a href="#">Dining chair</a>
                        </div>
                        <div class="title">
                            <h1 class="display-4"><strong>Leifarne</strong></h1>
                        </div>
                        <div class="price h3 text-danger">$180</div>
                    </div>
                </div>
                <div class="col-4  px-5 py-3 infos text-light">
                    <div class="description">
                        <div><span>Description</span></div>
                        <p class="small my-3 mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque quasi qui inventore voluptate saepe nemo hic sequi, libero laboriosam nam ut dolorem blanditiis dolores, iusto error aspernatur modi. Earum, similique?</p>
                    </div>
                    <hr>
                    <div class="p-details">
                        <div><span>Product informations</span></div>
                        <div class="small my-3 d-flex"><strong class="w-25 d-inline-block">Dimentions:</strong><span class="w-75 d-inline-block">53 x 50 x 60 cm</span></div>
                        <hr>
                        <div class="small my-3 d-flex"><strong class="w-25 d-inline-block">Materials:</strong><span class="w-75 d-inline-block">Solid brich plastic</span></div>
                        <hr>
                        <div class="small my-3 d-flex"><strong class="w-25 d-inline-block">Good to know:</strong><span class="w-75 d-inline-block">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span></div>
                        <hr>
                    </div>
                    <div class="actions">
                        <div class="add-to-cart shadow">
                            <a href="#" class="btn text-light">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                        </div>
                        <div class="buy-now">
                            <a href="#" class="btn btn-warning shadow rounded-pill btn-lg px-5 text-dark mx-3">BUY NOW</a>
                        </div>
                        <div class="stock">
                            <span :class="'h4 text-'+stockClass">500</span> in stock
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-full-description bg-dark text-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div><h2 class="mb-5">Full description:</h2></div>
                        <div>
                            <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, aperiam cumque veniam vel distinctio dolor, eius voluptatem consequatur voluptas quia quibusdam nisi ducimus recusandae tempora. Necessitatibus id quo nobis quidem?</p>
                            <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, aperiam cumque veniam vel distinctio dolor, eius voluptatem consequatur voluptas quia quibusdam nisi ducimus recusandae tempora. Necessitatibus id quo nobis quidem?</p>
                            <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, aperiam cumque veniam vel distinctio dolor, eius voluptatem consequatur voluptas quia quibusdam nisi ducimus recusandae tempora. Necessitatibus id quo nobis quidem?</p>
                            <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, aperiam cumque veniam vel distinctio dolor, eius voluptatem consequatur voluptas quia quibusdam nisi ducimus recusandae tempora. Necessitatibus id quo nobis quidem?</p>
                            <br><br>
                            <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, aperiam cumque veniam vel distinctio dolor, eius voluptatem consequatur voluptas quia quibusdam nisi ducimus recusandae tempora. Necessitatibus id quo nobis quidem?</p>
                            <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, aperiam cumque veniam vel distinctio dolor, eius voluptatem consequatur voluptas quia quibusdam nisi ducimus recusandae tempora. Necessitatibus id quo nobis quidem?</p>
                            <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, aperiam cumque veniam vel distinctio dolor, eius voluptatem consequatur voluptas quia quibusdam nisi ducimus recusandae tempora. Necessitatibus id quo nobis quidem?</p>
                            <br><br>
                            <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, aperiam cumque veniam vel distinctio dolor, eius voluptatem consequatur voluptas quia quibusdam nisi ducimus recusandae tempora. Necessitatibus id quo nobis quidem?</p>
                            <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, aperiam cumque veniam vel distinctio dolor, eius voluptatem consequatur voluptas quia quibusdam nisi ducimus recusandae tempora. Necessitatibus id quo nobis quidem?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-products bg-dark py-5 text-center text-light">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div><h2 class="mb-5"><i><strong>Similar</strong></i> <span class="text-primary">Products</span>:</h2></div>
                        <div class="similar-products-grid">
                                <productItem v-for="(i,index) in limit" :key="index"  :id=i :path="'/img/mansory/item'+i+'.png'"/>
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
    grid-template-columns: repeat(4,1fr);
    grid-gap: 16px;
}
</style>

<script>
import MainHeader from '../core/header.vue'
import productItem from '../core/product-item.vue'
export default {
    components:{
        MainHeader,
        productItem
    },
    data(){
        return {
            stockClass : "success",
            stock:103,
            limit:4
        }
    },
    created(){
        if(this.stock >= 100){
            this.stockClass = "success"
        }else if(this.stock < 100 && this.stock > 50){
            this.stockClass = "warning"
        }else{
            this.stockClass = "danger"
        }
    }

}
</script>
