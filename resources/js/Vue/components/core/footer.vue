<template>
    <div>
        <footer>
        <div class="container h-100">
            <div class="row h-100 d-flex align-items-center">
                <div class="col">
                    <div class="copyrights">
                        <span>Copyright © 2021 <a href="https://luxy-style.com">luxy-style.com</a>. All Rights Reserved.</span>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="social-links">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </footer>
    </div>
</template>

<style scoped>
footer{
    height:50px;
    width:100%;
    padding:8px 16px;
    color:#fbc403;
    background-color:#0a0a0a;
    position: relative;
    margin-top: 150px;
}
footer::before{
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
    top: 0;
    width: 100%;
    transform: translateY(-100%) scaleY(-1);
}
.copyrights{}
.social-links ul{
    padding: 0;
    margin: 0;
}
.social-links ul li{
    display: inline-block;
    margin-block: 0px;
    margin-inline: 5px;
}
</style>

<script>
export default({

})
</script>
