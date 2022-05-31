import Vue from "vue";
import VueRouter from "vue-router";
import HeroSection from './components/HeroSection'
import FeaturesSection from './components/FeaturesSection'
import MenuSection from './components/MenuSection'
import PurchseComponent from './components/PurchseComponent.vue'
import Reservation from './components/Reservation.vue'
Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            name:'home',
            path: '/',
            components: {
                'hero': HeroSection, 
                'features': FeaturesSection,
                'menu': MenuSection,
                'reservation': Reservation
            }
        },
        {
            name:'purchse',
            path: '/purchse',
            components: {
                'default': PurchseComponent
            }
        }
    ],
    mode: 'history',
    scrollBehavior: function(to, from, savedPosition) {
       
        if (to.hash) { 
            try{
                document.getElementById(to.hash.replace('#','')).scrollIntoView();
            } catch(err){
                document.getElementById('app').scrollIntoView();
            }
        }
        
    }
});
