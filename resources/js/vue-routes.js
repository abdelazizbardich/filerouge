import home from './components/pages/home.vue'
import shop from './components/pages/shop.vue'
import product from './components/pages/product.vue'

const routes = [
    {path : '/',component : home},
    {path : '/shop',component : shop},
    {path : '/product/:id',component : product},
]


export default routes
