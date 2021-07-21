import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css"
Vue.use(Vuex)

export const store = new Vuex.Store({
    state:{
        cartCount:0,
        products:{}
    },
    getters: {
        getProducts: state => {
            return state.products
        }
    },
    mutations:{
        ADD_TO_CART(state,id){
            if(localStorage.getItem('cart')){
                state.products = JSON.parse(localStorage.getItem('cart'))
            }
            if(state.products.length == 0){
                state.products.push({productId : id,count:1})
                // state.cartCount++
            }
            if(state.products.findIndex(x => x.productId == id) == -1){
                state.products.push({productId : id,count:1})
                // state.cartCount++
            }else{
                Toastify({
                    text: "Product already in cart",
                    backgroundColor: "linear-gradient(to right, #ff0000, #ff5722)",
                    className: "info",
                  }).showToast();

                return false;
                // state.products[state.products.findIndex(x => x.productId == id)].count++
                // state.cartCount++
            }
            localStorage.setItem('cart', JSON.stringify(state.products))
            if(localStorage.getItem('cartCount') !== null){
                state.cartCount = parseInt(localStorage.getItem('cartCount'),10) + 1
            }else{
                state.cartCount++
            }
            localStorage.setItem('cartCount',state.cartCount)

            Toastify({
                text: "Product added to cart successfully",
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                className: "info",
              }).showToast();
        },
        SET_CART_COUNT(state){
            if(localStorage.getItem('cartCount') !== null){
                state.cartCount = parseInt(localStorage.getItem('cartCount'),10)
            }
        },
        REMOVE_FROM_CART(state,id){
            let cart = JSON.parse(localStorage.getItem('cart'))
            cart.forEach(p => {
                if(p.productId == id){
                    cart.pop(p)
                }
            });
            state.products = cart
            localStorage.setItem('cart', JSON.stringify(cart))
            state.cartCount--
            localStorage.setItem('cartCount',state.cartCount)
            Toastify({
                text: "Product removed from cart",
                backgroundColor: "linear-gradient(to right, #ff0000, #ff5722)",
                className: "info",
              }).showToast();
        },
        SET_PRODUCTS(state, products) {
            state.products = products
        }
    },
    actions:{
        getProducts({commit}){
             axios.get('http://127.0.0.1:8000/api/product/')
                .then(response => {
                    commit('SET_PRODUCTS', response.data.data)
            })
        }
    }
})
