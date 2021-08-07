require('./bootstrap');

// 1. Importation de vue.js
import Vue from "vue"
// 1. Importation de vue-router
import VueRouter from 'vue-router'
// 2. Importation de vue-routes
import routes from './vue-routes'

import {store} from './store'

// Importation des components
import App from './app.vue'

import Authentificate from './middlewares/auth'


Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes
})
router.beforeEach((to, from, next) => {
    window.scrollTo(0, 0)
    next()
})
new Vue({
    render: h => h(App),
    router,
    store
}).$mount('#app')
