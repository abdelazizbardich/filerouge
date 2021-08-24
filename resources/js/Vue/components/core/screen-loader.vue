<template>
    <div>
        <div class="loading"></div>
    </div>
</template>
<script>
export default {

}
</script>
<style lang="css" scoped>
    .loading {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    background: rgba(1, 8, 31, 0.9);
    z-index: 99;
    }
    .loading:after {
    content: "";
    width: 50px;
    height: 50px;
    position: absolute;
    top: -30px;
    right: 0;
    left: 0;
    bottom: 0;
    margin: auto;
    border: 6px solid #f2f2f2;
    border-top: 6px dotted #f2f2f2;
    border-bottom: 6px dotted #f2f2f2;
    border-radius: 50%;
    animation: loading 2s infinite;
    }
    .loading:before {
    font-family: 'Lobster', cursive;
    font-size: 20px;
    letter-spacing: 1px;
    color: white;
    content: "Loading...";
    position: absolute;
    top: 57%;
    text-align: center;
    right: 0;
    left: 0;
    margin: auto;
    }

    @keyframes loading {
    0% {
        transform: rotate(0);
    }
    50% {
        transform: rotate(360deg);
    }
    }
    #AliRanjbar {
    position: absolute;
    bottom: 20px;
    left: 20px;
    font-size: 13px;
    color: #444;
    font-family: 'Acme', sans-serif;
    z-index: 99;
    }
</style>
