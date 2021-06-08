require('./bootstrap');
window.Vue = require('vue').default;

import router from './routes/routers'
import store from './vuex/store'

Vue.component('admin-component',require('./components/admin/AdminComponent'))
Vue.component('preloader-component'),require('./components/layouts/PreloaderComponent')

const app = new Vue({
    router,
    store,
    el: '#app',
});
