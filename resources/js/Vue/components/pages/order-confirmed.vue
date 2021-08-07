<template>
    <div>
        <MainHeader/>
        <div style="height:calc(100vh - 82px);" class="d-flex justify-content-center align-items-center w-100 flex-column order-confirmed">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 299.858 297.711">
            <g id="Icon_feather-check-circle" data-name="Icon feather-check-circle" transform="translate(3.028 3.169)">
                <path id="Path_16" data-name="Path 16" d="M288.345,132.626v13.126a142.672,142.672,0,1,1-84.6-130.4" transform="translate(0 0)" fill="none" stroke="#fbc403" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/>
                <path id="Path_17" data-name="Path 17" d="M198.974,6,56.3,148.815l-42.8-42.8" transform="translate(89.371 25.614)" fill="none" stroke="#fbc403" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/>
            </g>
        </svg>
        <span class="display-5 m-3 mb-2 text-light uppercace">We've received your order!</span>
        <p class="text-light small w-50">Thank for shopping with LUXY-STYLE! You'll find a summary of your recent purchase ballow.
please allow up to 2 business days to prossess and ship your order, we will contact you when your order is ready to be shipped</p>
        <div class="d-flex text-light justift-content-between mb-3">
            <div><strong>Order number: </strong>43667454</div>
            <div><strong>Order Date: </strong>Sep 29 2021</div>
        </div>
        <router-link to="/" class="btn btn-primary" style="position:relative;z-index:9;">Take me Home</router-link>
        </div>
        <Footer/>
    </div>
</template>
<style scoped>
.uppercace{
    text-transform: uppercase;
    font-weight: bold;
}
.order-confirmed{
    background-image: url('/img/hero-bg.png');
    position: relative;
    background-position: center left;
    background-size: contain;
    background-repeat: no-repeat;
    background-blend-mode: exclusion;
    margin-bottom: -200px;
}
</style>

<script>
import Footer from '../core/footer.vue'
import MainHeader from '../core/header.vue'
export default {
    components:{
        MainHeader,
        Footer
    },
}
</script>
