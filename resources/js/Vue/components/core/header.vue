<template>
<div>
    <screenLoader v-if="$store.state.loading"/>
    <div class="main-header border-bottom border-info bg-dark text-info">
        <div class="container header">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-lg">
                        <router-link class="navbar-brand logo" to="/"><img src="/img/logo.png" alt=""></router-link>
                        <button @click="showMobileNav()" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerNavBar" aria-controls="headerNavBar" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="headerNavBar">
                            <ul class="navbar-nav mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <router-link class="nav-link" :to="'/'">Home</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" :to="'/shop'">Shop</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="'/cart'" class="cart nav-link">
                                    <i class="fas fa-shopping-bag"></i>
                                    <span class="count">{{ getTotalCart }}</span>
                                </router-link>
                            </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-nav" v-if="MobileNav">
    <button class="close-monu" @click="showMobileNav()"><i class="fas fa-times"></i></button>
        <ul>
            <li class="nav-item active" @click="showMobileNav()" >
                <router-link class="nav-link"  :to="'/'">Home</router-link>
            </li>
            <li class="nav-item" @click="showMobileNav()" >
                <router-link class="nav-link"  :to="'/shop'">Shop</router-link>
            </li>
            <li class="nav-item" @click="showMobileNav()" >
                <router-link :to="'/cart'"  class="cart nav-link">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="count">{{ getTotalCart }}</span>
                </router-link>
            </li>
        </ul>
    </div>
</div>
</template>

<style lang="css" scoped>
header{
    height: 80px;
}
.header a {
    color:  inherit;
}
.logo img{
    width: 60px;
}
.nav-link{
    padding-inline: 16px !important;
    display: inline;
    font-family: Raleway;
    font-weight: normal;
    text-align: left;
    opacity: 0.77;
}
.main-header{
    position: sticky;
    top:0;
    z-index:9;
}
 button.navbar-toggler i {
    font-size: 2rem;
    color: #ffffff;
}
.mobile-nav{
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 10;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #00114b;
    color: #ffffff;
}
.mobile-nav ul{
    list-style: none;
    padding: 0;
}
.mobile-nav ul li{
    padding: 16px;
    font-size: 1.4rem;
}
.mobile-nav ul li a{
    color: inherit;
}
.close-monu{
    width: 25px;
    height: 25px;
    border-radius: 25px;
    border:none;
    position: fixed;
    right: 8px;
    top: 8px;
}
</style>
<script>
import {mapGetters} from 'vuex'
import screenLoader from '../core/screen-loader.vue'
export default {
    components:{
        screenLoader
    },
    computed:{
        cartCount(){
            return this.$store.state.cartCount
        },
        ...mapGetters(['getTotalCart'])
    },
    data:()=>{
        return {
            MobileNav:false
        }
    },
    mounted(){
    },
    methods:{
        showMobileNav(){
            if(this.MobileNav){
                this.MobileNav = false;
            }else{
                this.MobileNav = true;
            }
        }
    }
}
</script>

