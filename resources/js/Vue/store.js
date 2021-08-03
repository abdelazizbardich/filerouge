import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css"
Vue.use(Vuex)

export const store = new Vuex.Store({
    state:{
        cartCount:0,
        products:{},
        toatalCart:0,
        cartProducts:[]
    },
    getters: {
        getProducts: state => {
            return state.products
        },
        getTotalCart: state => {
            return state.toatalCart
        },
        getCart:state => {
            return this.cartProducts
        }
    },
    mutations:{
        ADD_TO_CART(state,id){
            if(localStorage.getItem('cart') == null){
                state.cartCount++
                localStorage.setItem('cart',JSON.stringify([{productId : id,count:1}]))
                Toastify({
                    text: "Product added to cart successfully",
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    className: "info",
                  }).showToast();
                  return true;
            }
            if(localStorage.getItem('cart')){
                state.cartProducts = JSON.parse(localStorage.getItem('cart'))
            }
            if(state.cartProducts.length == 0){
                state.cartProducts.push({productId : id,count:1})
                // state.cartCount++
            }
            else if(state.cartProducts.findIndex(x => x.productId == id) == -1){
                state.cartProducts.push({productId : id,count:1})
                // state.cartCount++
            }else{
                Toastify({
                    text: "Product already in cart",
                    backgroundColor: "linear-gradient(to right, #ff0000, #ff5722)",
                    className: "info",
                  }).showToast();

                return false;
            }
            localStorage.setItem('cart', JSON.stringify(state.cartProducts))
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
        },
        ADD_TO_TOTAL_CART(state,totalPrice){
            state.toatalCart += totalPrice
        },
        CHANGE_CART_TOTAL_PRICE(state,data){
            if(data.op == '+'){state.toatalCart = parseFloat(state.toatalCart).toFixed(2) + parseFloat(data.price).toFixed(2)}
            if(data.op == '-'){state.toatalCart = parseFloat(state.toatalCart).toFixed(2) - parseFloat(data.price).toFixed(2)}
        }
    },
    actions:{
        getProducts({commit}){
            axios.get('http://127.0.0.1:8000/api/product/')
                .then(response => {
                    commit('SET_PRODUCTS', response.data.data)
            })
        },
    },
})
