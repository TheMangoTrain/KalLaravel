import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/js/views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/products',
    name: 'Products',
    component: () => import(/* webpackChunkName: "products" */ '@/js/views/Products.vue')
  },
  {
    path: '/orders',
    name: 'Orders',
    component: () => import(/* webpackChunkName: "orders" */ '@/js/views/Orders.vue')
  }
]

const router = new VueRouter({
  routes
})

export default router
