import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './components/App'
import router from './router'

Vue.use(VueRouter);


const app = new Vue({
    el: '#app',
    components: { App },
    router,
});

