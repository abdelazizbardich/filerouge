import home from './components/pages/home.vue'
import shop from './components/pages/shop.vue'
import product from './components/pages/product.vue'
import  cart from './components/pages/cart.vue'

const routes = [
    {path : '/',component : home},
    {path : '/shop',component : shop},
    {path : '/product/:id',component : product},
    {path : '/cart',component : cart},
    {path : '/add-to-cart/:id', component: cart}
]


export default routes
