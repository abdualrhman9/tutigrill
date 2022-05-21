require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './routes';
import App from './components/App';
import eventbus from 'vue-event-bus'



Vue.use(VueRouter);
Vue.use(eventbus);



const app = new Vue({
    el: '#app',
    components: {App},
    router: router,
});
