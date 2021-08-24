<template>
    <div>
        <div class="bg-dark p-5" style="overflow: auto;max-height: calc(100vh - 80px);">
            <div class="p-2">
                <h3 class="display-6 text-info">Checkout</h3>
                <p class="text-light small">Lorem ipsum dolor sit amet consectetur adipisicing elit. mollitia autem deserunt.</p>
                <p class="form-error" v-if="errors.length">
                    <b>Please correct the following error(s):</b>
                    <ul class="p-0">
                        <li class="small m-1 d-inline-block" v-for="(error,index) in errors" :key="index" >- {{ error }}</li>
                    </ul>
                </p>
            </div>
            <div class="checkout-form" style="position:relative;z-index:9;">
                <form action="#" method="post" v-on:submit.prevent="">
                    <div class="row m-0 mb-3">
                        <div class="col-6">
                            <div class="form-group">
                                <input v-model="firstName" type="text" name="fname" class="form-control" placeholder="First name...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input v-model="lastName" type="text" name="lname" class="form-control" placeholder="Last name...">
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 mb-3">
                        <div class="col-6">
                            <div class="form-group">
                                <input v-model="phone" type="text" name="phone" class="form-control" placeholder="Phone...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input v-model="email" type="text" name="email" class="form-control" placeholder="Email...">
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 mb-3">
                        <div class="col-6">
                            <div class="form-group">
                                <select name="country" class="form-control" id="" v-model="country">
                                    <option value="" disabled><span>Country...</span></option>
                                    <option value="morocco" selected>Morocco</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <select name="city" class="form-control" id="" v-model="city">
                                    <option value="" disabled selected>City...</option>
                                    <option value="marrakech">Marrakech</option>
                                    <option value="Rabet">Rabet</option>
                                    <option value="Asfi">Asfi</option>
                                </select>
                        </div>
                    </div>
                    <div class="row m-0 mb-3">
                        <div class="col">
                            <div class="form-group">
                            <input type="text" v-model="adress" name="adress" class="form-control" placeholder="Adress..">
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 mb-3">
                        <div class="col">
                            <div class="form-group">
                                <select name="paywith" class="form-control" id="" v-model="payWith">
                                    <option value="" disabled selected><span>Pay with...</span></option>
                                    <option value="paypal">COD (cash on delevery)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col">
                            <div class="form-group">
                                <p class="small text-light">By filling this form you're agree with our <a href="#" class="text-warning">Terms & conditions</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 mb-3">
                        <div class="col">
                            <div class="form-group">
                                <button @click="checkout()" type="submit" name="submit" class="btn btn-info btn-lg rounded-0 d-block w-100 confirm-order"><i class="far fa-check-circle"></i> Confirm order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style lang="css" scoped >
.form-control{
    border-radius: 0px;
    padding: 8px 16px;
    background-color: #0a0a0a;
    color: lightyellow;
    border-color: var(--bs-info);
}
.form-error {
    color: white;
    padding: 8px 16px;
    background-color: var(--bs-danger);
    border-radius: 5px;
}
</style>

<script>
import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css"
import axios from 'axios';
export default {
    data:()=>{
        return {
            errors:[],
            firstName:'',
            lastName:'',
            phone:'',
            email:'',
            country:'',
            city:'',
            adress:'',
            payWith:''
        }
    },
    methods:{
        validateForm(){
            let ErrorFound = false;
            this.errors = []
            if(this.firstName == "")
                this.errors.push("First name is emplty"); ErrorFound = true
            if(this.lastName == "")
                this.errors.push("Last name is emplty"); ErrorFound = true
            if(this.phone == "")
                this.errors.push("Phone is emplty"); ErrorFound = true
            if(this.email == "")
                this.errors.push("Email is emplty"); ErrorFound = true
            if(this.country == "")
                this.errors.push("Select a country"); ErrorFound = true
            if(this.city == "")
                this.errors.push("Select a city"); ErrorFound = true
            if(this.adress == "")
                this.errors.push("Adress is emplty"); ErrorFound = true
            if(this.payWith == "")
                this.errors.push("Select a paiement pethod");
                ErrorFound = true
            return ErrorFound
        },
        checkout(){
            if(!this.validateForm()){return false;}
            if(JSON.parse(localStorage.getItem('cart')).length == 0){
                Toastify({
                    text: "You can't checkout on an ampty cart!",
                    backgroundColor: "linear-gradient(to right, #ff0000, #ff5722)",
                    className: "info",
                }).showToast();
                return false;
            }
            let token = document.head.querySelector('meta[name="csrf-token"]');
            this.$store.dispatch('showLoader')
            axios.post('https://alpha.luxy-style.com/api/cart/checkout',{
                'firstName' : this.firstName,
                'lastName' : this.lastName,
                'phone' : this.phone,
                'email' : this.email,
                'country' : this.country,
                'city' : this.city,
                'adress' : this.adress,
                'payWith' : this.payWith,
                'cart' : localStorage.getItem('cart')
            }).then(response => {
                this.$store.dispatch('hideLoader')
                if(response.status == 200){
                    Toastify({
                    text: "We recived you order successfully",
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    className: "info",
                  }).showToast();
                    localStorage.setItem('orderInfos',JSON.stringify(response.data))
                    this.$store.dispatch('clearCart')
                    this.$router.push('/order-confirmed')
                }else{
                    Toastify({
                        text: "unknoun server error!",
                        backgroundColor: "linear-gradient(to right, #ff0000, #ff5722)",
                        className: "info",
                    }).showToast();
                }
            })
        }
    }
}
</script>
