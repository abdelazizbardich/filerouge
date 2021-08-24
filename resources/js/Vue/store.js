import Vue from 'vue'
import Vuex, { Store } from 'vuex'
import axios from 'axios'
import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css"
Vue.use(Vuex)

export const store = new Vuex.Store({
    state:{
        cartCount:0,
        products:{},
        toatalCart:0,
        cartProducts:[],
        token:'',
        loading:false,
        // make sure to ommit the / from the end of url
        apiUrl:'https://alpha.luxy-style.com/api'
        // apiUrl:'http://127.0.0.1:8000/api'
    },
    getters: {
        getProducts: state => {
            return state.products
        },
        getTotalCart: state => {
            return state.cartProducts.length
        },
        getCart:state => {
            return this.cartProducts
        },
        getToken:state => {
            return this.token
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
                state.cartCount = state.cartProducts.length
            }
        },
        REMOVE_FROM_CART(state,id){
            state.cartProducts = JSON.parse(localStorage.getItem('cart'))
            const newProducts = state.cartProducts.filter(cart=>{
                console.log(cart,cart.id,`${id}`,cart.id != `${id}`)
                return cart.productId != `${id}`
            } );
            state.cartProducts = newProducts
            localStorage.setItem('cart',JSON.stringify(state.cartProducts))
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
            if(data.op == '-' && this.toatalCart < 0){state.toatalCart = parseFloat(state.toatalCart).toFixed(2) - parseFloat(data.price).toFixed(2)}
        },
        SET_TOKEN(state,data){
            if(data != null){
                state.token = data
                localStorage.setItem('token',data)
            }
        },
        CLEAR_CART(state){
            localStorage.removeItem('cart')
            state.cartProducts = [],
            state.toatalCart = 0
        },
        SHOW_LOADER(state){
            state.loading = true
        },
        HIDE_LOADER(state){
            state.loading = false
        }
    },
    actions:{
        getProducts({commit,state}){
            commit('SHOW_LOADER')
            axios.get(state.apiUrl+'/product/')
                .then(response => {
                    commit('HIDE_LOADER')
                    commit('SET_PRODUCTS', response.data.data)
            })
        },
        getToken({commit,state}){
            commit('SHOW_LOADER')
            axios.get(state.apiUrl+'/token/').then(response=>{
                commit('HIDE_LOADER')
                commit('SET_TOKEN', response.data.token)
            })
        },
        removeFromCart({commit},id){
            commit('REMOVE_FROM_CART',id);
        },
        clearCart({commit}){
            commit('CLEAR_CART');
        },
        showLoader({commit}){
            commit('SHOW_LOADER')
        },
        hideLoader({commit}){
            commit('HIDE_LOADER')
        }
    },
})
