import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'

Vue.prototype.API_URL = process.env.NODE_ENV === 'production' ? 'https://smkimmanuel.sch.id/api/' : 'http://localhost:8000/api/'
axios.defaults.baseURL = process.env.NODE_ENV === 'production' ? 'https://smkimmanuel.sch.id/api/' : 'http://localhost:8000/api/'
Vue.config.productionTip = false

new Vue({
  router,
  render: function (h) { return h(App) }
}).$mount('#app')
