require('./bootstrap');

// 1. Importation de vue.js
import Vue from "vue"
// 1. Importation de vue-router
import VueRouter from 'vue-router'

// 2. Importation de vue-routes
import routes from './vue-routes'

// Importation des components
import App from './app.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    routes
})

new Vue({
    render: h => h(App),
    router
  }).$mount('#app')
