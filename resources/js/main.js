import Vue from 'vue'
import App from './App.vue'
import VueSweetalert2 from 'vue-sweetalert2'
import VueAxios from './plugins/axios'
import VueMeta from 'vue-meta'
import VueLodash from 'vue-lodash'
import lodash from 'lodash'
import ResourceApi from './plugins/api'
import router from './router'
import store from './store'

import './assets/sass/app.scss'
import 'bootstrap'

window.Vue = Vue
window.bus = new Vue
window.JQuery = window.$ = require('jquery')
window.Popper = require('popper.js')

Vue.use(VueSweetalert2)
Vue.use(VueMeta)
Vue.use(VueAxios)
Vue.use(ResourceApi)
Vue.use(VueLodash, { name: 'custom' , lodash: lodash })

new Vue({
  render: h => h(App),
  router,
  store,
}).$mount('#app')
