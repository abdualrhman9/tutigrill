import Vue from "vue";
import VueRouter from "vue-router";
import HeroSection from './components/HeroSection.vue'
import FeaturesSection from './components/FeaturesSection.vue'
import MenuSection from './components/MenuSection.vue'
import PurchseComponent from './components/PurchseComponent.vue'
import Reservation from './components/Reservation.vue'
import ContactSection from './components/ContactSection.vue'
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
                'reservation': Reservation,
                'contact': ContactSection,
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
            const target = document.getElementById(to.hash.replace('#',''));
            if(target)
                target.scrollIntoView();
            else 
                document.getElementById('app').scrollIntoView();
            
        }
        
    }
});
