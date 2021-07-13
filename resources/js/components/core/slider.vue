<template>
    <div>
        <div class="slider">
            <div class="slid">
                <img src="/img/product.png" alt="">
            </div>
            <div class="slider-infos">
                    <div class="category">Working chair</div>
                    <div class="title text-light display-3">The Mine</div>
                    <div class="prove text-light h1">$180</div>
                    <button class="buy btn btn-light btn-lg shadow rounded-pill px-5 my-2">Buy</button>
            </div>
            <div class="navigation">
                <div class="prev" disabled><i class="fas fa-chevron-left"></i></div>
                <div class="dots">
                    <div class="dot"></div>
                    <div class="dot active"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
                <div class="next"><i class="fas fa-chevron-right"></i></div>
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
    left: 0%;
    right: 0%;
    margin: auto;
    width: fit-content;
    height: 70%;
    width: 40%;
    top: 40%;
    transform: translateY(-50%);
    text-align: center;
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
}
.dot.active{
    opacity: 1;
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

}
</script>
