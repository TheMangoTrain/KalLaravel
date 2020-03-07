//require('./bootstrap');

console.log("hello")

import Vue from 'vue'
import App from '@/js/App.vue'
import router from '@/js/router.js'
//import './assets/style.scss'

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')

console.log("hello2")