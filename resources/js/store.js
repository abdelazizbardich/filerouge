import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
Vue.use(Vuex)

export const store = new Vuex.Store({
    state:{
        cartCount:0,
        products:[]
    },
    getters: {

    },
    mutations:{
        addToCart(state,id){
            if(localStorage.getItem('cart')){
                state.products = JSON.parse(localStorage.getItem('cart'))
            }
            if(state.products.length == 0){
                state.products.push({productId : id,count:1})
                state.cartCount++
            }
            if(state.products.findIndex(x => x.productId == id) == -1){
                state.products.push({productId : id,count:1})
                state.cartCount++
            }else{
                state.products[state.products.findIndex(x => x.productId == id)].count++
                state.cartCount++
            }
            localStorage.setItem('cart', JSON.stringify(state.products))
            console.log(localStorage.getItem('cart'))
        }
    },
    actions:{

    }
})
