require('./bootstrap');

// 1. Importation de vue.js
import Vue from "vue"
// 1. Importation de vue-router
import VueRouter from 'vue-router'
// 2. Importation de vue-routes
import routes from './vue-routes'

// Vue Query (reqponsive ui for vue)
import VueMq from 'vue-mq'

import {store} from './store'

// Importation des components
import App from './app.vue'



Vue.use(VueRouter)
Vue.use(VueMq, {
    breakpoints: {mobile: 450,tablet: 900,laptop: 1250,desktop: Infinity}})
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
