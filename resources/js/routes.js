import Vue from "vue";
import VueRouter from "vue-router";
import HeroSection from './components/HeroSection'
import FeaturesSection from './components/FeaturesSection'
import MenuSection from './components/MenuSection'
import PurchseComponent from './components/PurchseComponent.vue'

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
    mode: 'history'
});
