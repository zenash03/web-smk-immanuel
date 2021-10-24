import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'

Vue.prototype.API_URL = 'https://smkimmanuel.sch.id/api/'
Vue.config.productionTip = false
axios.defaults.baseURL = 'https://smkimmanuel.sch.id/api/'

new Vue({
  router,
  render: function (h) { return h(App) }
}).$mount('#app')
