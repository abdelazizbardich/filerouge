<template>
<div>
    <div class="main-header text-primary">
        <div class="screen-loader"></div>
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
                                <router-link :to="'/cart'" class="cart nav-link text-primary">
                                    <i class="fas fa-shopping-bag"></i>
                                    <span class="count">{{ cartCount }}</span>
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
            <li class="nav-item active">
                <router-link class="nav-link" :to="'/'">Home</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" :to="'/shop'">Shop</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="'/cart'" class="cart nav-link text-primary">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="count">{{ cartCount }}</span>
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
.main-header{
    background-color: var(--bs-dark);
}
.main-header:after{
    content: '';
    background-image: url('/img/separator.png');
    background-position: top center;
    background-size: contain;
    background-repeat: no-repeat;
    width: 100%;
    height: 250px;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    transform: translateY(100%) ;
}
.header a {
    color:  inherit;
}
.logo img{
    width: 60px;
}
li.active .nav-link{
    opacity: .5;
    color: var(--bs-primary);
}
.nav-link{
    padding-inline: 16px !important;
    display: inline;
    font-family: Raleway;
    font-weight: normal;
    text-align: left;
    color: #fff;
    opacity: 0.77;
}
.main-header{
    position: sticky;
    top:0;
    z-index:9;
}
.screen-loader{
    position:fixed;
    top:0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 99;
    background-color: rgba(0, 0, 0, 0.281);
}
 button.navbar-toggler i {
    color: var(--bs-primary);
    font-size: 2rem;
}
.mobile-nav{
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    background-color: #000000;
    z-index: 10;
    display: flex;
    justify-content: center;
    align-items: center;
    color: var(--bs-primary);
}
.mobile-nav ul{
    list-style: none;
    padding: 0;
}
.mobile-nav ul li{
    padding: 16px;
    font-size: 1.4rem;
}
.close-monu{
    width: 25px;
    height: 25px;
    border-radius: 25px;
    border:none;
    background-color: var(--bs-primary);
    color: #000000;
    position: fixed;
    right: 8px;
    top: 8px;
}
</style>
<script>
export default {
    computed:{
        cartCount(){
            return this.$store.state.cartCount
        }
    },
    data:()=>{
        return {
            MobileNav:false
        }
    },
    mounted(){
      document.querySelector('.screen-loader').style.display = 'none'
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

