<template>
    <div>
        <div class="slider">
            <div class="slid" v-bind:style="'background-image:url('+thumbnail+')'">
            </div>
            <div class="slider-infos">
                    <div class="category"></div>
                    <div class="title text-light w-50 display-6 mb-3">{{ title }}</div>
                    <div class="price text-white h1">${{ price }}</div>
                    <router-link class="buy btn btn-light btn-lg shadow rounded-pill px-5 my-2" :to="'/product/'+id">More info</router-link>
            </div>
            <div class="navigation">
                <div class="prev" @click="pervSlide()"><i style="transform: translateX(-1px);" class="fas fa-chevron-left"></i></div>
                <div class="dots">
                    <div class="dot" @click="goToslide(0)" :class="(curentSlide == 0)?'active':''"></div>
                    <div class="dot" @click="goToslide(1)" :class="(curentSlide == 1)?'active':''"></div>
                    <div class="dot" @click="goToslide(2)" :class="(curentSlide == 2)?'active':''"></div>
                    <div class="dot" @click="goToslide(3)" :class="(curentSlide == 3)?'active':''"></div>
                    <div class="dot" @click="goToslide(4)" :class="(curentSlide == 4)?'active':''"></div>
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
    background-color: var(--bs-primary);
    position: relative;
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
.slid img{
    height: 100%;
}
.navigation{
    position: absolute;
    right: 13%;
    bottom: 15%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}
.dots{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    margin-inline: 16px;
}
.dot{
    width: 15px;
    height: 5px;
    background-color: var(--bs-dark);
    margin-inline: 2px;
    display: inline-block;
    opacity: .3;
    cursor: pointer;
    user-select: none;
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
    background-color: var(--bs-white);
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
    bottom: 10%;
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
            loop:''
        }
    },
    props:{
        products:Array
    },
    watch:{
        products(){
            this.setSlide(0)
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
            this.thumbnail = this.products[slide].thumbnail
            this.price = this.products[slide].price
        },
        goToslide(slide){
            console.log(slide);
            this.id = this.products[slide].id
            this.title = this.products[slide].name
            this.thumbnail = this.products[slide].thumbnail
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
        }
    }
}
</script>
