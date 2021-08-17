<template>
    <div>
    <Header />
    <div class="holder">
        <div class="title">
            <h2 class="display-2">Contact us</h2>
        </div>
        <div class="form">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <form action="" method="post" class="text-primary" @submit.prevent="sendMessage">
                            <div class="row">
                            <div class="form-group col">
                                <label for="name">Name:</label>
                                <input v-model="name" id="name" type="text" class="form-control" required placeholder="Name...">
                            </div>

                            <div class="form-group col">
                                <label for="email">Email:</label>
                                <input v-model="email" id="email" type="email" class="form-control" required placeholder="Email...">
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <input v-model="subject" id="subject" type="text" class="form-control" required placeholder="Subject...">
                            </div>
                            <div class="form-group">
                                <label for="message">Message:</label>
                                <textarea v-model="message" class="form-control" name="message" id="message" cols="30" rows="5" placeholder="Message..."></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary d-block w-100 my-3">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Footer />
    </div>
</template>

<style scoped>
.holder{
    background-image: url('/img/separator.png');
    background-position: top center;
    background-size: contain;
    background-repeat: no-repeat;
    background-color: var(--bs-dark);
    padding-top: 100px;
    position: relative;
    z-index: 9;
}
.title{
    text-align: center;
    padding: 16px;
    color: var(--bs-primary);
    max-width: 500px;
    margin: auto;

}
form{
    padding: 16px;
    border-radius: 5px;
    border-color:  var(--bs-primary);
}
.form-group{
    margin-bottom: 8px;
}
.form-control{
    background: none;
    padding: 8px 16px;
    border-color: var(--bs-primary);
    color: var(--bs-primary);
}
</style>

<script>
import Header from '../core/header.vue'
import Footer from '../core/footer.vue'
import axios from 'axios'
export default {
    components:{
        Header,
        Footer
    },
    data:()=>{
        return {
            name:'',
            email:'',
            subject:'',
            message:''
        }
    },
    methods:{
        sendMessage(){
            alert('sdfsdf')
            if(this.validate()){
                axios.post('http://127.0.0.1:8000/api/contact',{
                    "name" : this.name,
                    "email" : this.email,
                    "subject" : this.subject,
                    "message" : this.message
                }).then(response => {
                    console.log(response);
                })
            }
        },
        validate(){
            return true
        }
    }
}
</script>
