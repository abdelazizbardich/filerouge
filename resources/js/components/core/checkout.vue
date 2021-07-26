<template>
    <div>
        <div style="overflow: auto;max-height: calc(100vh - 80px);" class="p-5">
            <div class="p-2">
                <h3 class="display-6 text-dark">Checkout</h3>
                <p class="text-light small">Lorem ipsum dolor sit amet consectetur adipisicing elit. mollitia autem deserunt.</p>
                <p class="form-error" v-if="errors.length">
                    <b>Please correct the following error(s):</b>
                    <ul class="p-0">
                        <li class="small m-1 d-inline-block" v-for="(error,index) in errors" :key="index" >- {{ error }}</li>
                    </ul>
                </p>
            </div>
            <div class="checkout-form">
                <form action="#" method="post" v-on:submit.prevent="onSubmit">
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
                                    <option value="paypal">Paypal</option>
                                    <option value="visa">Visa</option>
                                    <option value="mastercard">MasterCard</option>
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
                                <button @click="checkout()" type="submit" name="submit" class="btn btn-warning btn-lg rounded-0 d-block w-100 confirm-order"><i class="far fa-check-circle"></i> Confirm order</button>
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
}
.form-error {
    color: white;
    padding: 8px 16px;
    background-color: #ff9800;
    border-radius: 5px;
}
</style>

<script>
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
            if(!this.validateForm())
                console.log(this.validateForm());
        }
    }
}
</script>
