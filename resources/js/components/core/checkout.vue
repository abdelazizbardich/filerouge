<template>
    <div>
        <div class="p-5">
                        <div class="p-2">
                            <h3 class="display-6 text-primary">Checkout</h3>
                            <p class="text-light small">Lorem ipsum dolor sit amet consectetur adipisicing elit. mollitia autem deserunt.</p>
                        </div>
                        <div class="checkout-form">
                            <form action="#" method="post" v-on:submit.prevent="onSubmit">
                                <div class="row m-0 mb-3">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="fname" class="form-control" placeholder="First name...">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="lname" class="form-control" placeholder="Last name...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-0 mb-3">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" placeholder="Phone...">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="Email...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-0 mb-3">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <select name="country" class="form-control" id="">
                                                <option class="bg-dark text-light" value="" disabled selected><span>Country...</span></option>
                                                <option value="morocco" class="bg-dark">Morocco</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <select name="city" class="form-control" id="">
                                                <option class="bg-dark text-light" value="" disabled selected>City...</option>
                                                <option class="bg-dark text-light" value="marrakech">Marrakech</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="row m-0 mb-3">
                                    <div class="col">
                                        <div class="form-group">
                                        <input type="text" name="adress" class="form-control" placeholder="Adress..">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-0 mb-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <select name="paywith" class="form-control" id="">
                                                <option class="bg-dark text-light" value="" disabled selected><span>Pay with...</span></option>
                                                <option class="bg-dark text-light" value="paypal">Paypal</option>
                                                <option class="bg-dark text-light" value="visa">Visa</option>
                                                <option class="bg-dark text-light" value="mastercard">MasterCard</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col">
                                        <div class="form-group">
                                            <p class="small text-light">By filling this form you're agree with our <a href="#">Terms & conditions</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-0 mb-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-warning btn-lg rounded-0 d-block w-100 confirm-order"><i class="far fa-check-circle"></i> Confirm order</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
    </div>
</template>

<style lang="css">
.form-control{
    border-radius: 0px;
    background-color: rgba(255,255,255,0.15);
    padding: 8px 16px;
    color: #ffffff;
}
</style>

<script>
export default {

}
</script>
