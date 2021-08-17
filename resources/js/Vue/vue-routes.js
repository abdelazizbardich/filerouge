import home from './components/pages/home.vue'
import shop from './components/pages/shop.vue'
import product from './components/pages/product.vue'
import cart from './components/pages/cart.vue'
import pageNotFound from './components/pages/404.vue'
import orderConfirmed from './components/pages/order-confirmed.vue'
import contact from './components/pages/contact.vue'

// Authentification
import AuthMiddleware from './middlewares/auth';
const routes = [
    {path : '/',component : home, beforeEnter: (to, from, next) => {AuthMiddleware({to,from,next})}},
    {path : '/shop',component : shop},
    {path : '/product/:id',component : product,  props: true},
    {path : '/cart',component : cart},
    {path : '/order-confirmed',component : orderConfirmed},
    {path : '/contact',component : contact},
    {path : '*',component : pageNotFound}
]


export default routes
