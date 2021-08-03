<template>
    <div>
        <div class="slider" v-if="(slideCount > 0)">
            <div class="slid">
                <div class="slid-inner" v-bind:style="'background-image:url('+thumbnail+')'"></div>
            </div>
            <div class="slider-infos">
                    <div class="category"></div>
                    <div class="title mb-3">{{ title }}</div>
                    <p class="small description">{{ description }}</p>
                    <div class="price">${{ price }}</div>
                    <router-link class="buy btn btn-primary btn-lg shadow rounded-pill px-5 my-2" :to="'/product/'+id">More info</router-link>
            </div>
            <div class="navigation">
                <div class="prev" @click="pervSlide()"><i style="transform: translateX(-1px);" class="fas fa-chevron-left"></i></div>
                <div class="dots">
                    <div class="dot" v-for="(slide,index) in slideCount" :key=index @click="goToslide(0)" :class="(curentSlide == index)?'active':''"></div>
                </div>
                <div class="next" @click="nextSlide()"><i style="transform: translateX(1px);" class="fas fa-chevron-right"></i></div>
            </div>
        </div>
    </div>
</template>

<style lang="css"scoped>
.slider{
    height: calc(100vh - 80px);
    overflow: hidden;
    background-color: var(--bs-dark);
    background-image: url('/img/hero-bg.png');
    position: relative;
    background-position: center left;
    background-size: contain;
    background-repeat: no-repeat;
    background-blend-mode: exclusion;
}
.title{
    max-width: 45vw;
    color: var(--bs-primary);
    font-size: 3rem;
    text-transform: uppercase;
    font-weight: bold;
}
.slid{
    position: absolute;
    right: 10%;
    width: fit-content;
    height: 70%;
    width: 40%;
    top: 40%;
    transform: translateY(-50%);
    text-align: center;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: contain;
}
.slid:before{
    content: '';
    background-image: url('/img/slider-circle.png');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    position: absolute;
    z-index: -3;
}
.slid img{
    height: 100%;
}
.slid-inner{
    position: absolute;
    right: 0%;
    height: 100%;
    width: 100%;
    top: 0%;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: contain;
}
.navigation{
    position: absolute;
    right: 3%;
    bottom: 0%;
    top: 0%;
    margin: auto;
    height: fit-content;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    transform: rotateZ(90deg);
}
.dots{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    margin-inline: 16px;
}
.dot{
    width: 25px;
    height: 5px;
    background-color: var(--bs-primary);
    margin-inline: 2px;
    display: inline-block;
    opacity: .3;
    cursor: pointer;
    user-select: none;
    border-radius: 50px;
}
.price{
    font-size: 3rem;
    color: var(--bs-primary);
    font-weight: lighter;
}
.dot.active{
    opacity: 1;
}
.prev:hover,.next:hover{
    opacity: .7;
}
.prev,.next{
    width: 40px;
    height: 40px;
    border-radius: 40px;
    background-color: var(--bs-primary);
    display: inline-block;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    user-select: none;
}
.prev[disabled],.next[disabled]{
    opacity: .3;
}
.slider-infos{
    position: absolute;
    left: 7%;
    top: 0%;
    bottom: 0%;
    margin: auto;
    height: fit-content;
}

.btn.btn-primary:hover{
    opacity: .7;
}
.description{
    color: #fbfcd4;
    max-width: 50%;
    display: block;
}
</style>

<script>
export default {
    data() {
        return {
            id:0,
            title:'',
            thumbnail:'',
            price:'',
            curentSlide : 0,
            loop:'',
            slideCount:0,
            description:'',
            products:[]
        }
    },
    watch:{
        products(){
            this.setSlide(0)
            this.slideCount = this.products.length
            this.loopSlide()
        },
        curentSlide(){
            document.querySelector('.slid').style.transition = "0s";
            document.querySelector('.slid').style.opacity = "0";
            setTimeout(() => {
                document.querySelector('.slid').style.transition = ".5s";
                document.querySelector('.slid').style.opacity = "1";
            }, 500);
        }
    },
    created(){
        this.getProducts();
    },
    methods:{
        pervSlide(){
            if(this.curentSlide > 0){
                this.curentSlide--
                this.setSlide(this.curentSlide)
            }else{
                this.curentSlide = this.products.length - 1
                this.setSlide(this.curentSlide)
            }
            clearInterval(this.loop)
            this.loopSlide()
        },
        nextSlide(){
            if(this.curentSlide < this.products.length - 1){
                this.curentSlide++
                this.setSlide(this.curentSlide)
            }else{
                this.curentSlide = 0
                this.setSlide(this.curentSlide)
            }
            clearInterval(this.loop)
            this.loopSlide()
        },
        setSlide(slide){
            this.id = this.products[slide].id
            this.title = this.products[slide].name
            this.thumbnail = '/storage/'+this.products[slide].thumbnail
            this.price = this.products[slide].price
            this.description = this.products[slide].description
        },
        goToslide(slide){
            console.log(slide);
            this.id = this.products[slide].id
            this.title = this.products[slide].name
            this.thumbnail = '/storage/'+this.products[slide].thumbnail
            this.price = this.products[slide].price
            this.curentSlide = slide
            clearInterval(this.loop)
            this.loopSlide()
        },
        loopSlide(){
            const self = this
            this.loop = setInterval(
                function(){
                    if(self.curentSlide < self.products.length - 1){
                        self.curentSlide++
                        self.setSlide(self.curentSlide)
                    }else{
                        self.curentSlide = 0
                        self.setSlide(self.curentSlide)
                    }
                },
                5000
            );
        },
        getProducts(){
            axios.get('http://127.0.0.1:8000/api/product/inslide')
                .then(response => {
                    console.log(response);
                    this.products = response.data
            })
        }
    }
}
</script>
