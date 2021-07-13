<template scoped>
        <div class="bg-dark text-light">
        <div class="container header">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand logo" href="#"><img src="img/logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerNavBar" aria-controls="headerNavBar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
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
                                <a class="nav-link text-primary" href="#"><i class="fas fa-shopping-bag"></i></a>
                            </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
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
</style>



<script>
export default {
}
</script>

