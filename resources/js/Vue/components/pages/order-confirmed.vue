<template>
    <div>
        <MainHeader/>
        <div style="height:calc(100vh - 82px)" class="d-flex justify-content-center align-items-center w-100 flex-column">
        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 299.858 297.711">
            <g id="Icon_feather-check-circle" data-name="Icon feather-check-circle" transform="translate(3.028 3.169)">
                <path id="Path_16" data-name="Path 16" d="M288.345,132.626v13.126a142.672,142.672,0,1,1-84.6-130.4" transform="translate(0 0)" fill="none" stroke="#e34693" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/>
                <path id="Path_17" data-name="Path 17" d="M198.974,6,56.3,148.815l-42.8-42.8" transform="translate(89.371 25.614)" fill="none" stroke="#e34693" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/>
            </g>
        </svg>
        <span class="display-3 m-3 mb-5">Order Confirmed</span>
        <router-link to="/" class="btn btn-primary btn-xl rounded-pill mt-3 py-3 px-5">Take me Home</router-link>
        </div>
    </div>
</template>
<style scoped>

</style>

<script>
import MainHeader from '../core/header.vue'
export default {
    components:{
        MainHeader
    }
}
</script>
